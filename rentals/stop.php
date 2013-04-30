<!DOCTYPE html>

<html>

<head>
</head>

<body>
<?
	// gets the name of the stop the user clicked on
	$stopName = $_REQUEST['stop'];
	// $lineColor = $_GET['color'];
	
	echo "<h3> Listings for ".$stopName."</h3>";
	
	$link = mysql_connect('localhost', 'ijharley', 'ct406');
    $db = mysql_select_db("ct406s13", $link);
	
    // selects the listings for the stop selected
	$sql = "SELECT ih_proj4Listing.name FROM ih_proj4Listing ";
	// uses an inner join to return only the values where the ids match in both tables
	$sql .= "INNER JOIN ih_proj4Stop ON ih_proj4Listing.stopId = ih_proj4Stop.id ";
	$sql .= "WHERE ih_proj4Stop.name = '$stopName' ";
	$sql .= "ORDER BY ih_proj4Listing.name";
	
	$result = mysql_query($sql);
	
	echo "<ol>";
	while ($row = mysql_fetch_array($result))
    {
     echo "<li><a href>".$row['name']."</a></li>";
     echo "<br>";
    }
	echo "</ol>";
	
    mysql_close($link);
?>
</body>

</html>