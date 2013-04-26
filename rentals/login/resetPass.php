<?php
	$email = $_GET['email'];
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset = "utf-8" />
	<title>Reset Password</title>
	<link rel="stylesheet" 
		href="style.css" />
	
 
</head>

<body>
 
	<header>
	 
	<nav>
	
	</nav>
	</header>
	
	<section>
		<article>
			<form action="resetPassScript.php" method="POST">
				new password:<input name="passwd" type="text" />
				<input type="hidden" name="email" value="<?=$email?>" />
				<input type="submit" value="Submit" />
			</form>
		</article>
	</section>
	
	<footer>
	</footer>
	
	
</body>
</html>