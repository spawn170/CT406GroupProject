import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.FileNotFoundException;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;
import java.io.Writer;

public class Listings_SQLgen {

	final static int NUM_ENTRIES = 900;
	final static int NUM_STOPS = 90;
	
	public static void main(String[] args) throws IOException
	{		
		String whole = readin("Places.txt");
		String[] places = whole.split("\n");
		
		//Assign random stop ID's
		int sid[] = new int[NUM_ENTRIES];
		for(int i = 0; i < NUM_ENTRIES; i ++)
		{
			sid[i] = (int)(Math.random() * (NUM_STOPS - 1));
			System.out.println(sid[i]);
		}
		
		//Generate random place names
		String suffixes[] = {"Towers","Condominiums","Flats","Terrace","Plaza","Fountain","Garden","Falls","Apartments","Homes","Shire","Villas","Village","Hermitage","Estates"};
		String names[] = new String[NUM_ENTRIES];
		for(int i = 0; i < NUM_ENTRIES; i ++)
		{
			int s = (int)(Math.random() * (suffixes.length - 1));
			int p = (int)(Math.random() * (places.length - 1));
			
			names[i] = places[p] + " " + suffixes[s];
		}
		
		//Generate random addresses
		int zips[] = {20001, 20002, 20003, 20004, 20005, 20006, 20007, 20008, 20009, 20010, 20011, 20012, 20015, 20016, 20017, 20018, 20019, 20020, 20024, 20032, 20036, 20037, 20045, 20052, 20053, 20057, 20064, 20202, 20204, 20228, 20230, 20240, 20245, 20260, 20307, 20317, 20319, 20373, 20390, 20405, 20418, 20427, 20506, 20510, 20520, 20535, 20540, 20551, 20553, 20560, 20565, 20566, 20593};
		String addresses[] = new String[NUM_ENTRIES];
		for(int i = 0; i < NUM_ENTRIES; i ++)
		{
			int box = (int)(1000 + (Math.random() * 4000));
			int z = (int)(Math.random() * (zips.length - 1));
			
			addresses[i] = "P.O. BOX " + box + " Washington, DC " + zips[z];
		}
		
		//Generate random prices
		double prices[] = new double[NUM_ENTRIES];
		for(int i = 0; i < NUM_ENTRIES; i ++)
			prices[i] = truncate((300 + Math.random() * 1000));
		
		//Generate queries
		int id = 0;
		for(int i = 0; i < NUM_ENTRIES; i ++)
		{
			String query = "INSERT INTO ih_proj4Listing VALUES(";
			query += (id ++) + "," + sid[i] + ",'" + names[i] + "',";
			query += "'" + addresses[i] + "'," + prices[i];
			query += ");";
			
			System.out.println(query);
		}
	}
	
	//Truncate a double to two decimal places
	public static double truncate (double x)
	{
		String z = "" + x;
		String s[] = z.split("\\.");
		z = s[0] + "." + s[1].substring(0,2);
		return Double.parseDouble(z);
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