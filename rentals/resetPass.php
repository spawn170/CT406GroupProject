<?php
	$email = $_POST['email'];
?>
<!DOCTYPE HTML>
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
  </head>

<div id="wrapper">
	<img src="images/bptlogo.jpg" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<img src="images/dcapartment.jpg" />
	<img src="images/dcloft.jpg" />
	<img src="images/dcrowhouses.jpg" />
<h3>Please reset your password:</h3>
		<article>
			<form action="resetPassScript.php" method="POST">
				new password:<input name="passwd" type="text" />
				<input type="hidden" name="email" value="<?=$email?>" />
				<input type="submit" value="Submit" />
			</form>
		</article>
		</div>
<div id="footer">
	<div id="footerWrapper">
    	<p>&copy;2013. All rights reserved.</p>
    </div>
</div>
	
</body>
</html>