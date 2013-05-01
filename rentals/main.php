<!DOCTYPE html>

<?

	$link = mysql_connect('localhost', 'ijharley', 'ct406');
    $db = mysql_select_db("ct406s13", $link);
	
	$sql = "SELECT * FROM ih_proj4Stop ORDER BY name";
	
	$result = mysql_query($sql);
	
	while ($row = mysql_fetch_array($result))
    {
		if(strpos($row['line'],"Green") !== false)
		{
			$gstops[] = $row['name'];
			$gids[] = $row['id'];
		}
		if(strpos($row['line'],"Red") !== false)
		{
			$rstops[] = $row['name'];
			$rids[] = $row['id'];
		}
		if(strpos($row['line'],"Blue") !== false)
		{
			$bstops[] = $row['name'];
			$bids[] = $row['id'];
		}
		if(strpos($row['line'],"Orange") !== false)
		{
			$ostops[] = $row['name'];
			$oids[] = $row['id'];
		}
		if(strpos($row['line'],"Yellow") !== false)
		{
			$ystops[] = $row['name'];
			$yids[] = $row['id'];
		}
	}
	
    mysql_close($link);
	
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>By Mass Transit - Find Rentals Near D.C.'s Metro Rail Stops</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0" />
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
    <link href="styles/rentals.css" rel="stylesheet">
    <script>
	$(function() {
	  $( "#accordion" ).accordion();
	});
	</script>
  </head>

<body>

<div id="wrapper">
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
    <div id="leftBox">
    <h1>No apartment?<span><br /></span>No car?<br />No problem.</h1>	
    </div>
    <div id="rightBox">
    <img src="images/dcmap.png"/>
    </div>
    <h2>Finding housing in a new city is hard.</h2>
    <p>Especially in the Washington, D.C. metro area where housing is spread out from the city center. Luckily, D.C. has one of the best 
    public transportation systems in the country. The key is trying to find housing that is within a close enough radius to each Metro stop.</p>
    <p>By Mass Transit attempts to ease the search for good rental housing in the city by only showing the listings you want to see by 
    the Metro Stop you want to live near. That means if you want to live within a ten minute walk to the Chinatown/Gallery Place Metro station (great location, BTW!), then you'll only see listings
    for that particular area. It's that simple.</p>
    <h2>Give it a try:</h2> 
   <img src="images/metromap.png"> 
     <div id="landing">
                    <h3>Click on a station to see available rentals near it:</h3>

                    <div id="map-container">
                        <img src="img/map.png">
                          <!-- Red Line -->
                    <div id="accordion">
                       <h3><img src="images/redlinebar.png"></h3>
                        <div>
						<?
							for($i = 0; $i < count($rstops); $i ++)
								echo '<a href="stop.php?stop='.$rids[$i].'">'.$rstops[$i].'</a><br />'."\n";
						?>
                        </div>
                        <!-- Orange Line -->
                        <h3><img src="images/orangelinebar.png"></h3>
                        <div>
                        <?
							for($i = 0; $i < count($ostops); $i ++)
								echo '<a href="stop.php?stop='.$oids[$i].'">'.$ostops[$i].'</a><br />'."\n";
						?>
						</div>
                        <!--Yellow Line-->
                        <h3><img src="images/yellowlinebar.png"></h3>
                        <div>
                        <?
							for($i = 0; $i < count($ystops); $i ++)
								echo '<a href="stop.php?stop='.$yids[$i].'">'.$ystops[$i].'</a><br />'."\n";
						?>
						</div>
                        <!-- Green Line -->
                        <h3><img src="images/greenlinebar.png"> </h3>
                        <div>
                        <?
							for($i = 0; $i < count($gstops); $i ++)
								echo '<a href="stop.php?stop='.$gids[$i].'">'.$gstops[$i].'</a><br />'."\n";
						?>
						</div>
                        <!-- Blue Line -->
						<h3><img src="images/bluelinebar.png"></h3>
						<div>   
						<?
							for($i = 0; $i < count($bstops); $i ++)
								echo '<a href="stop.php?stop='.$bids[$i].'">'.$bstops[$i].'</a><br />'."\n";
						?>
						</div>
	   </div>
	</div>
</div>
<div id="footer">
	<div id="footerWrapper">
    	<p>&copy;2013. All rights reserved.</p>
    </div>
</div>
</body>
</html>