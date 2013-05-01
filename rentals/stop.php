<!DOCTYPE html>

<html>

<head>
	<link href="styles/rentals.css" rel="stylesheet">
	
	<title>By Mass Transit - Find Rentals Near D.C.'s Metro Rail Stops</title>
</head>

<body>
<div id = "wrapper">
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
	
	<?
		// gets the name of the stop the user clicked on
		$stopName = $_REQUEST['stopName'];
		$stopID = $_REQUEST['stop'];
		// $lineColor = $_GET['color'];
		
		echo "<h3> Listings for ".$stopName."</h3>";
		
		$link = mysql_connect('localhost', 'ijharley', 'ct406');
		$db = mysql_select_db("ct406s13", $link);
		
		// selects the listings for the stop selected
		$sql = "SELECT ih_proj4Listing.name,ih_proj4Listing.id FROM ih_proj4Listing ";
		// uses an inner join to return only the values where the ids match in both tables
		$sql .= "INNER JOIN ih_proj4Stop ON ih_proj4Listing.stopId = ih_proj4Stop.id ";
		$sql .= "WHERE ih_proj4Stop.id = $stopID ";
		$sql .= "ORDER BY ih_proj4Listing.name";
		
		$result = mysql_query($sql);
		
		echo "<ol>";
		while ($row = mysql_fetch_array($result))
		{
		 echo '<li><a href="http://leda.capitol-college.edu/~ijharley/project4/rentals/listing.php?stop='.$stopID.'&listing='.$row['id'].'">'.$row['name']."</a></li>";
		 echo "<br>";
		}
		echo "</ol>";
		
		mysql_close($link);
	?>
	
	<div id="footer">
		<div id="footerWrapper">
			<p>&copy;2013. All rights reserved.</p>
		</div>
	</div>
</div>
</body>

</html>