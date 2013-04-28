<?

	$stop = $_REQUEST['stop'];
	$listing = $_REQUEST['listing'];
	
	$sql = "SELECT * FROM ih_proj4Listing WHERE id = $listing;";
	$link = mysql_connect('localhost','npharrell','ct406');
	if(!$link)
		die('Failure to connect to database.');
	mysql_select_db("ct406s13",$link);
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	mysql_close($link);
	
	$name = $row['name'];
	$addr = $row['address'];
	$price = $row['price'];
	
?>

<html>
Name: <?=$name?><br>
Address: <?=$addr?><br>
Price: <?=$price?><br>
</html>