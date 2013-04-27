import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.Writer;

public class HTMLstrip {

	final static int NUM_NAMES = 500;
	
	public static void main(String[] args) throws IOException
	{
		String whole = readin("Names.txt");
		String types[] = whole.split("\n#\n");
		
		String last[] = types[0].split("\n");
		String first[] = types[1].split("\n");
		
		//Generate random names
		String names[] = new String[NUM_NAMES];
		for(int i = 0; i < NUM_NAMES; i ++)
		{
			int f = (int)(Math.random() * first.length);
			int l = (int)(Math.random() * last.length);
			
			names[i] = first[f] + " " + last[l];
		}
		
	
		//Generate random email domain assignments
		String email_poss[] = {"gmail.com","hotmail.com","comcast.net","verizon.net","aol.com","yahoo.com"};
		String emails[] = new String[NUM_NAMES];
		for(int i = 0; i < NUM_NAMES; i ++)
		{
			int e = (int)(Math.random() * email_poss.length);
			
			String username = names[i].replace(" ","");
			emails[i] = username + "@" + email_poss[e];
		}
		
		//Generate random ages
		int ages[] = new int[NUM_NAMES];
		for(int i = 0; i < NUM_NAMES; i ++)
		{
			ages[i] = (int)(1 + (Math.random() * 90));
			
			//Skew the distribution so that an unusually
			//	high number of persons are 5 years old
			if(ages[i] % 9 == 0 || ages[i] % 8 == 0)
				ages[i] = 5;
		}
		
		//Assign random colors
		String color_poss[] = {"Red","Green","Blue"};
		String colors[] = new String[NUM_NAMES];
		for(int i = 0; i < NUM_NAMES; i ++)
		{
			int c = (int)(Math.random() * 3);
			colors[i] = color_poss[c];
		}
		
		//Build queries
		int id = 0;
		for(int i = 0; i < NUM_NAMES; i ++)
		{
			String query = "INSERT INTO ih_proj4User VALUES(";
			query += (id ++) + ",'" + emails[i] + "',";
			query += "'" + randomString(10) + "','" + randomString(10) + "',";
			query += ages[i] + ",'" + colors[i] + "',1";
			query += ");";
			
			System.out.println(query);
		}
	}
	
	//Generate a string of random characters
	public static String randomString (int len)
	{
		String res = "";
	
		for(int i = 0; i < len; i ++)
		{
			int n = (int)(65 + (Math.random() * 25));
			res += (char)n;
		}
		
		return res;
	}

	//Write to a files
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
