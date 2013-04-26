<?php
	$link = mysql_connect('localhost', 'apmaricich', 'ct406');
	$db = mysql_select_db('ct406s13');

	$email = $_POST['email'];
	$newPass = $_POST['passwd'];
	$encrypted_newPass = md5($newPass);
	$update = "UPDATE table_name SET password='$encrypted_newPass' WHERE email='$email';";

	// Update the database with this new information

	header('Location: pass.php?head=Password+Successfully+Reset&sub=Try+logging+in+again');
?>