<?
	session_start();

	$link = mysql_connect('localhost', 'ijharley', 'ct406');
	$db = mysql_select_db('ct406s13');

	$query = "SELECT * FROM ih_proj4User;";

	function average($arr) {
	   if (!is_array($arr)) return false;
	   return array_sum($arr)/count($arr);
	}

?>

<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset = "utf-8" />
	<title>Login</title>
	<link rel="stylesheet" href="styles/rentals.css" />
	
 
</head>

<body>
 
	<header>
	 
	<nav>
	
	</nav>
	</header>
	
	<section>
		<article id="SignUp">
			<form action="registration.php" method="POST">
				email:<input type="text" name="email" />
				<br />
				password:<input type="password" name="passwd" />
				<br />
				age:<input type="number" name="age" />
				<br>
				color:<input type="radio" name="color" value="red" />red
				<input type="radio" name="color" value="green" />green
				<input type="radio" name="color" value="blue" />blue
				<br />
				<input type="submit" name="register" value="Register" />
			</form>
			<hr />
		</article>
		<article id="LogIn">
			<form action="loginScript.php" method="POST">
				email:<input type="text" name="email" />
				<br />
				password:<input type="password" name="passwd" />
				<br />
				<input type="submit" value="Forgot Password?" formaction="forgotPassword.php" />
				<br />
				<input type="submit" value="Login" />
			</form>
		</article>
		<article id="counteravg">
			<p>
				Number of users:
				<?
					$users = 0;

					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result)) {
						$users += 1;
					}
					echo($users);
				?>
			</p>
			<p>
				Average age:
				<?
					$ages = array();

					$result = mysql_query($query);
					while ($row = mysql_fetch_array($result)) {
						$ages[] = $row['age'] + 0;
					}
					echo(average($ages));
				?>
			</p>
		</article>
	</section>
	
	<footer>
	</footer>
	
	
</body>
</html>