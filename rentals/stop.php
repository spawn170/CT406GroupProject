<?
<<<<<<< HEAD
session_start();
?>
=======
	session_start();
?>

>>>>>>> e81c869e15be0030383006b3c5870b23e14bdbd4
<!DOCTYPE html>

<html>

<head>
<<<<<<< HEAD
    <meta charset="utf-8">
    <title>By Mass Transit - Find Rentals Near D.C.'s Metro Rail Stops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link href="styles/rentals.css" rel="stylesheet">
  </head>
<body>
<div id="wrapper">
=======
	<link href="styles/rentals.css" rel="stylesheet">
	
	<title>By Mass Transit - Find Rentals Near D.C.'s Metro Rail Stops</title>
</head>

<body>
<div id = "wrapper">
>>>>>>> e81c869e15be0030383006b3c5870b23e14bdbd4
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
<<<<<<< HEAD
<h3>You chose to look for rental housing near the following Metro stop:</h3>
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
<center>
<a href="main.php">Go Back</a>
</center>
</div>

<div id="footer">
	<div id="footerWrapper">
    	<p>&copy;2013. All rights reserved.</p>
    </div>
=======
	
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
	
	<center>
		<a href="main.php">Go Back</a>
	</center>
</div>
<div id="footer">
	<div id="footerWrapper">
		<p>&copy;2013. All rights reserved.</p>
	</div>
>>>>>>> e81c869e15be0030383006b3c5870b23e14bdbd4
</div>
</body>

</html>