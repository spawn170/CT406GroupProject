<?
	session_start();

	$stop = $_REQUEST['stop'];
	$listing = $_REQUEST['listing'];
	
	$sql = "SELECT * FROM ih_proj4Listing WHERE id = $listing;";
	$link = mysql_connect('localhost','ijharley','ct406');
	if(!$link)
		die('Failure to connect to database.');
	mysql_select_db("ct406s13",$link);
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	$name = $row[2];
	$addr = $row[3];
	$price = $row[4];
	
	$sql = "SELECT line,name FROM ih_proj4Stop WHERE id = $stop;";
	$result = mysql_query($sql);
	$row = mysql_fetch_row($result);
	
	$lines = $row[0];
	$stopname = $row[1];
	
	mysql_close($link);	

	$colors = explode(",",$lines);
	
	//Format the asking price with commas
	for($i = strlen($price) - 4; $i >= 0; $i -= 3)
		$price = substr($price, 0, $i + 1).','.substr($price,$i + 1);
?>

<!DOCTYPE html>

<html>

<head>
	<link href="styles/rentals.css" rel="stylesheet" />
	<link href="styles/listing.css" rel="stylesheet" />
	<title>Listing near <?=$stopname?></title>
</head>

<body>
<div id = "wrapper">
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
	
	<center>
<?
	for($i = 0; $i < count($colors); $i ++)
		echo '<image src="images/'.strtolower($colors[$i]).'linebar.png"></image>';
?>
		<h2>Listing near <?=$stopname?>: <?=$name?></h2>
		<br>
		<table><tbody>
			<tr>
				<td class="left">Name of Residence:</td>
				<td class="right"><?=$name?></td>
			<tr></td>
				<td class="left">Address:</td>
				<td class="right"><?=$addr?></td>
			</tr><tr>
				<td class="left">Asking Price:</td>
				<td class="right">$<?=$price?>.00</td>
			</tr>
		</tbody></table>
		<br>
		<br>
		<br>
		<a href="stop.php?stop=<?=$stop?>">Go Back</a>
	</center>
</div>
<div id="footer">
	<div id="footerWrapper">
		<p>&copy;2013. All rights reserved.</p>
	</div>
</div>
</body>
</html>