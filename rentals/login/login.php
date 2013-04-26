<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset = "utf-8" />
	<title>Login</title>
	<link rel="stylesheet" 
		href="style.css" />
	
 
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
	</section>
	
	<footer>
	</footer>
	
	
</body>
</html>