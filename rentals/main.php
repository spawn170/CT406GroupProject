<?
session_start();

$age = $_SESSION['age'];

$username = $_SESSION['email'];
$ucol = $_SESSION['color'];

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
<!DOCTYPE html>
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
	<p style="color:<?=$ucol?>">Hello, <?=$username?>.</p>
	<br>
	<br>
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
	<br>
	<center>
		<?
		echo '<image src="images/';
		if($age >= 60)
		echo 'retirement';
		else
		echo 'wintervacation';
		echo '.gif"></image>';
		?>
	</center>
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
	<div id="landing">
		<h3>Click on a station on the map to view it on the WMATA site:</h3>
		<div id="map-container">
			<div style="text-align:center; width:750px; margin-left:auto; margin-right:auto;">
				<img id="Image-Maps_9201304282340034" src="http://www.image-maps.com/uploaded_files/9201304282340034_metromap.gif" usemap="#Image-Maps_9201304282340034" border="0" width="750" height="717" alt="" />
				<map id="_Image-Maps_9201304282340034" name="Image-Maps_9201304282340034">
					<area shape="rect" coords="410,2,428,20" href="http://www.wmata.com/rail/station_detail.cfm?station_id=34" alt="" title=""    />
					<area shape="rect" coords="411,30,429,48" href="http://www.wmata.com/rail/station_detail.cfm?station_id=33" alt="" title=""    />
					<area shape="rect" coords="412,59,430,77" href="http://www.wmata.com/rail/station_detail.cfm?station_id=32" alt="" title=""    />
					<area shape="rect" coords="409,90,427,108" href="http://www.wmata.com/rail/station_detail.cfm?station_id=31" alt="" title=""    />
					<area shape="rect" coords="421,135,439,153" href="http://www.wmata.com/rail/station_detail.cfm?station_id=29" alt="" title=""    />
					<area shape="rect" coords="480,194,498,212" href="http://www.wmata.com/rail/station_detail.cfm?station_id=28" alt="" title=""    />
					<area shape="rect" coords="518,232,536,250" href="http://www.wmata.com/rail/station_detail.cfm?station_id=27" alt="" title=""    />
					<area shape="rect" coords="517,266,535,284" href="http://www.wmata.com/rail/station_detail.cfm?station_id=26" alt="" title=""    />
					<area shape="rect" coords="517,294,535,312" href="http://www.wmata.com/rail/station_detail.cfm?station_id=108" alt="" title=""    />
					<area shape="rect" coords="517,329,535,347" href="http://www.wmata.com/rail/station_detail.cfm?station_id=25" alt="" title=""    />
					<area shape="rect" coords="487,342,505,360" href="http://www.wmata.com/rail/station_detail.cfm?station_id=23" alt="" title=""    />
					<area shape="rect" coords="458,342,476,360" href="http://www.wmata.com/rail/station_detail.cfm?station_id=21" alt="" title=""    />
					<area shape="rect" coords="404,342,422,360" href="http://www.wmata.com/rail/station_detail.cfm?station_id=1" alt="" title=""    />
					<area shape="rect" coords="366,268,384,286" href="http://www.wmata.com/rail/station_detail.cfm?station_id=4" alt="" title=""    />
					<area shape="rect" coords="353,251,371,269" href="http://www.wmata.com/rail/station_detail.cfm?station_id=6" alt="" title=""    />
					<area shape="rect" coords="339,238,357,256" href="http://www.wmata.com/rail/station_detail.cfm?station_id=7" alt="" title=""    />
					<area shape="rect" coords="325,223,343,241" href="http://www.wmata.com/rail/station_detail.cfm?station_id=8" alt="" title=""    />
					<area shape="rect" coords="307,209,325,227" href="http://www.wmata.com/rail/station_detail.cfm?station_id=9" alt="" title=""    />
					<area shape="rect" coords="281,208,299,226" href="http://www.wmata.com/rail/station_detail.cfm?station_id=10" alt="" title=""    />
					<area shape="rect" coords="262,196,280,214" href="http://www.wmata.com/rail/station_detail.cfm?station_id=11" alt="" title=""    />
					<area shape="rect" coords="240,176,258,194" href="http://www.wmata.com/rail/station_detail.cfm?station_id=12" alt="" title=""    />
					<area shape="rect" coords="221,156,239,174" href="http://www.wmata.com/rail/station_detail.cfm?station_id=13" alt="" title=""    />
					<area shape="rect" coords="193,128,211,146" href="http://www.wmata.com/rail/station_detail.cfm?station_id=14" alt="" title=""    />
					<area shape="rect" coords="166,100,184,118" href="http://www.wmata.com/rail/station_detail.cfm?station_id=15" alt="" title=""    />
					<area shape="rect" coords="140,74,158,92" href="http://www.wmata.com/rail/station_detail.cfm?station_id=16" alt="" title=""    />
					<area shape="rect" coords="115,51,133,69" href="http://www.wmata.com/rail/station_detail.cfm?station_id=17" alt="" title=""    />
					<area shape="rect" coords="91,24,109,42" href="http://www.wmata.com/rail/station_detail.cfm?station_id=18" alt="" title=""    />
					<area shape="rect" coords="566,122,584,140" href="http://www.wmata.com/rail/station_detail.cfm?station_id=80" alt="" title=""    />
					<area shape="rect" coords="549,141,567,159" href="http://www.wmata.com/rail/station_detail.cfm?station_id=79" alt="" title=""    />
					<area shape="rect" coords="529,160,547,178" href="http://www.wmata.com/rail/station_detail.cfm?station_id=78" alt="" title=""    />
					<area shape="rect" coords="509,180,527,198" href="http://www.wmata.com/rail/station_detail.cfm?station_id=77" alt="" title=""    />
					<area shape="rect" coords="429,210,447,228" href="http://www.wmata.com/rail/station_detail.cfm?station_id=76" alt="" title=""    />
					<area shape="rect" coords="404,241,422,259" href="http://www.wmata.com/rail/station_detail.cfm?station_id=75" alt="" title=""    />
					<area shape="rect" coords="428,267,446,285" href="http://www.wmata.com/rail/station_detail.cfm?station_id=73" alt="" title=""    />
					<area shape="rect" coords="455,278,473,296" href="http://www.wmata.com/rail/station_detail.cfm?station_id=72" alt="" title=""    />
					<area shape="rect" coords="457,310,475,328" href="http://www.wmata.com/rail/station_detail.cfm?station_id=70" alt="" title=""    />
					<area shape="rect" coords="458,370,476,388" href="http://www.wmata.com/rail/station_detail.cfm?station_id=81" alt="" title=""    />
					<area shape="rect" coords="458,401,476,419" href="http://www.wmata.com/rail/station_detail.cfm?station_id=82" alt="" title=""    />
					<area shape="rect" coords="489,462,507,480" href="http://www.wmata.com/rail/station_detail.cfm?station_id=83" alt="" title=""    />
					<area shape="rect" coords="509,464,527,482" href="http://www.wmata.com/rail/station_detail.cfm?station_id=84" alt="" title=""    />
					<area shape="rect" coords="542,475,560,493" href="http://www.wmata.com/rail/station_detail.cfm?station_id=85" alt="" title=""    />
					<area shape="rect" coords="557,490,575,508" href="http://www.wmata.com/rail/station_detail.cfm?station_id=86" alt="" title=""    />
					<area shape="rect" coords="582,511,600,529" href="http://www.wmata.com/rail/station_detail.cfm?station_id=107" alt="" title=""    />
					<area shape="rect" coords="608,514,626,532" href="http://www.wmata.com/rail/station_detail.cfm?station_id=87" alt="" title=""    />
					<area shape="rect" coords="629,526,647,544" href="http://www.wmata.com/rail/station_detail.cfm?station_id=88" alt="" title=""    />
					<area shape="rect" coords="651,544,669,562" href="http://www.wmata.com/rail/station_detail.cfm?station_id=89" alt="" title=""    />
					<area shape="rect" coords="328,490,346,508" href="http://www.wmata.com/rail/station_detail.cfm?station_id=43" alt="" title=""    />
					<area shape="rect" coords="326,528,344,546" href="http://www.wmata.com/rail/station_detail.cfm?station_id=44" alt="" title=""    />
					<area shape="rect" coords="337,550,355,568" href="http://www.wmata.com/rail/station_detail.cfm?station_id=45" alt="" title=""    />
					<area shape="rect" coords="368,568,386,586" href="http://www.wmata.com/rail/station_detail.cfm?station_id=93" alt="" title=""    />
					<area shape="rect" coords="368,602,386,620" href="http://www.wmata.com/rail/station_detail.cfm?station_id=47" alt="" title=""    />
					<area shape="rect" coords="369,628,387,646" href="http://www.wmata.com/rail/station_detail.cfm?station_id=48" alt="" title=""    />
					<area shape="rect" coords="378,654,396,672" href="http://www.wmata.com/rail/station_detail.cfm?station_id=49" alt="" title=""    />
					<area shape="rect" coords="377,684,395,702" href="http://www.wmata.com/rail/station_detail.cfm?station_id=50" alt="" title=""    />
					<area shape="rect" coords="256,646,274,664" href="http://www.wmata.com/rail/station_detail.cfm?station_id=94" alt="" title=""    />
					<area shape="rect" coords="225,694,243,712" href="http://www.wmata.com/rail/station_detail.cfm?station_id=95" alt="" title=""    />
					<area shape="rect" coords="284,428,302,446" href="http://www.wmata.com/rail/station_detail.cfm?station_id=42" alt="" title=""    />
					<area shape="rect" coords="231,337,249,355" href="http://www.wmata.com/rail/station_detail.cfm?station_id=41" alt="" title=""    />
					<area shape="rect" coords="295,307,313,325" href="http://www.wmata.com/rail/station_detail.cfm?station_id=40" alt="" title=""    />
					<area shape="rect" coords="328,305,346,323" href="http://www.wmata.com/rail/station_detail.cfm?station_id=38" alt="" title=""    />
					<area shape="rect" coords="386,306,404,324" href="http://www.wmata.com/rail/station_detail.cfm?station_id=36" alt="" title=""    />
					<area shape="rect" coords="404,365,422,383" href="http://www.wmata.com/rail/station_detail.cfm?station_id=53" alt="" title=""    />
					<area shape="rect" coords="403,386,421,404" href="http://www.wmata.com/rail/station_detail.cfm?station_id=54" alt="" title=""    />
					<area shape="rect" coords="490,402,508,420" href="http://www.wmata.com/rail/station_detail.cfm?station_id=58" alt="" title=""    />
					<area shape="rect" coords="513,402,531,420" href="http://www.wmata.com/rail/station_detail.cfm?station_id=59" alt="" title=""    />
					<area shape="rect" coords="532,394,550,412" href="http://www.wmata.com/rail/station_detail.cfm?station_id=60" alt="" title=""    />
					<area shape="rect" coords="547,379,565,397" href="http://www.wmata.com/rail/station_detail.cfm?station_id=61" alt="" title=""    />
					<area shape="rect" coords="577,372,595,390" href="http://www.wmata.com/rail/station_detail.cfm?station_id=63" alt="" title=""    />
					<area shape="rect" coords="623,386,641,404" href="http://www.wmata.com/rail/station_detail.cfm?station_id=90" alt="" title=""    />
					<area shape="rect" coords="660,385,678,403" href="http://www.wmata.com/rail/station_detail.cfm?station_id=91" alt="" title=""    />
					<area shape="rect" coords="683,382,701,400" href="http://www.wmata.com/rail/station_detail.cfm?station_id=92" alt="" title=""    />
					<area shape="rect" coords="704,384,722,402" href="http://www.wmata.com/rail/station_detail.cfm?station_id=110" alt="" title=""    />
					<area shape="rect" coords="727,385,745,403" href="http://www.wmata.com/rail/station_detail.cfm?station_id=109" alt="" title=""    />
					<area shape="rect" coords="619,347,637,365" href="http://www.wmata.com/rail/station_detail.cfm?station_id=64" alt="" title=""    />
					<area shape="rect" coords="635,329,653,347" href="http://www.wmata.com/rail/station_detail.cfm?station_id=65" alt="" title=""    />
					<area shape="rect" coords="656,307,674,325" href="http://www.wmata.com/rail/station_detail.cfm?station_id=66" alt="" title=""    />
					<area shape="rect" coords="676,288,694,306" href="http://www.wmata.com/rail/station_detail.cfm?station_id=67" alt="" title=""    />
					<area shape="rect" coords="694,269,712,287" href="http://www.wmata.com/rail/station_detail.cfm?station_id=68" alt="" title=""    />
					<area shape="rect" coords="208,366,226,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=96" alt="" title=""    />
					<area shape="rect" coords="186,367,204,385" href="http://www.wmata.com/rail/station_detail.cfm?station_id=97" alt="" title=""    />
					<area shape="rect" coords="164,366,182,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=98" alt="" title=""    />
					<area shape="rect" coords="143,366,161,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=99" alt="" title=""    />
					<area shape="rect" coords="121,366,139,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=100" alt="" title=""    />
					<area shape="rect" coords="98,367,116,385" href="http://www.wmata.com/rail/station_detail.cfm?station_id=101" alt="" title=""    />
					<area shape="rect" coords="77,366,95,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=102" alt="" title=""    />
					<area shape="rect" coords="55,366,73,384" href="http://www.wmata.com/rail/station_detail.cfm?station_id=103" alt="" title=""    />
					<area shape="rect" coords="748,715,750,717" href="http://www.image-maps.com/index.php?aff=mapped_users_9201304282340034" alt="Image Map" title="Image Map" />
				</map>
			</div>
		</div>
	</div>
	<h3>Click on a station from these lists to view rentals near it:</h3>
	<!-- Red Line -->
	<div id="accordion">
		<h3><img src="images/redlinebar.png"></h3>
		<div>
			<?
			for($i = 0; $i < count($rstops); $i ++)
				echo '<a href="stop.php?stopName='.$rstops[$i].'&stop='.$rids[$i].'">'.$rstops[$i].'</a><br />';
			?>
		</div>
		<!-- Orange Line -->
		<h3><img src="images/orangelinebar.png"></h3>
		<div>
			<?
			for($i = 0; $i < count($ostops); $i ++)
				echo '<a href="stop.php?stopName='.$ostops[$i].'&stop='.$oids[$i].'">'.$ostops[$i].'</a><br />';
			?>
		</div>
		<!--Yellow Line-->
		<h3><img src="images/yellowlinebar.png"></h3>
		<div>
			<?
			for($i = 0; $i < count($ystops); $i ++)
				echo '<a href="stop.php?stopName='.$ystops[$i].'&stop='.$yids[$i].'">'.$ystops[$i].'</a><br />';
			?>
		</div>
		<!-- Green Line -->
		<h3><img src="images/greenlinebar.png"> </h3>
		<div>
			<?
			for($i = 0; $i < count($gstops); $i ++)
				echo '<a href="stop.php?stopName='.$gstops[$i].'&stop='.$gids[$i].'">'.$gstops[$i].'</a><br />';
			?>
		</div>
		<!-- Blue Line -->
		<h3><img src="images/bluelinebar.png"></h3>
		<div>
			<?
			for($i = 0; $i < count($bstops); $i ++)
				echo '<a href="stop.php?stopName='.$bstops[$i].'&stop='.$bids[$i].'">'.$bstops[$i].'</a><br />';
			?>
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