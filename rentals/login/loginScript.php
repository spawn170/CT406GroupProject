<?php
	session_start();

	$link = mysql_connect('localhost', 'apmaricich', 'ct406');
	$db = mysql_select_db('ct406s13');

	$email = $_POST['email'];
	$passwd = $_POST['passwd'];
	$select = "SELECT * FROM table_name WHERE email='$email' AND password='$passwd' AND verified=1;";

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
		header('Location: index.php');
	}
?>