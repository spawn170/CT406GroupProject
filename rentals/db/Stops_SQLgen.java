import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.Writer;

public class Stops_SQLgen {

	public static void main(String[] args) throws IOException
	{
		String whole = readin("Stops.txt");
		String[] rows = whole.split("\n");
		
		int id = 0;
		
		//Parse line name indicators
		for(String row : rows)
		{
			String line = "";
			
			String lines = row.split("\t")[0];
			for(char letter : lines.toCharArray())
				switch(letter)
				{
					case 'R':
						line += "Red,";
						break;
					case 'G':
						line += "Green,";
						break;
					case 'B':
						line += "Blue,";
						break;
					case 'Y':
						line += "Yellow,";
						break;
					case 'O':
						line += "Orange,";
						break;
				}
			line = line.substring(0,line.length() - 1);
			
			String name = row.split("\t")[1].replace("'","\\'");
			
			//Print query
			System.out.println("INSERT INTO ih_proj4Stop VALUES(" + (id ++) + ",'" + name + "','" + line + "');");
		}
	}

	//Write to a file
	public static String readOut(String aFile, String Contents) throws FileNotFoundException, IOException
	{
		String comp = "Failed to write file.\nTranslation:\n" + Contents;
		Writer output = new BufferedWriter(new FileWriter(aFile));
		try
		{
			output.write(Contents);
		}
		finally
		{
			output.close();
			comp = "File complete.";
		}
		return comp;
	}
	
	//Read from a file
	public static String readin(String aFile) throws FileNotFoundException
	{
		StringBuilder contents = new StringBuilder();
		try
		{
			BufferedReader input = new BufferedReader(new FileReader(aFile));
			try
			{
				String line = "";
				while ((line = input.readLine()) != null)
				{
					contents.append(line + "\n");

				}
			}
			catch(FileNotFoundException ex)
			{
				System.out.println("File not found.");
			}
			finally
			{
				input.close();
			}
		}
		catch (IOException ex)
		{
			ex.printStackTrace();
			
		}
		return contents.toString();
	}	
}