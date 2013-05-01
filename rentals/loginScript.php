<?php
	session_start();

	$link = mysql_connect('localhost', 'ijharley', 'ct406');
	$db = mysql_select_db('ct406s13');

	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$hashpass = md5($passwd);
	$select = "SELECT * FROM ih_proj4User WHERE email='$email' AND pswd='$hashpass' AND validate=1;";

	$result = mysql_query($select);
	$exist = mysql_num_rows($result);

	if (!$exist) {
		header('Location: pass.php?head=Incorrect+Login&sub=Please+try+again');
	}
	if ($exist) {
		while ($row = mysql_fetch_array($result)) {
 			$_SESSION['email'] = $row{'email'};
 			$_SESSION['age'] = $row{'age'};
 			$_SESSION['id'] = $row{'id'};
		}
		header('Location: rentals.html');
	}
?>