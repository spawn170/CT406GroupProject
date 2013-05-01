<?php
<<<<<<< HEAD
$link = mysql_connect('localhost', 'ijharley', 'ct406');
$db = mysql_select_db('ct406s13');
=======
	$link = mysql_connect('localhost', 'ijharley', 'ct406');
	$db = mysql_select_db('ct406s13');
>>>>>>> e81c869e15be0030383006b3c5870b23e14bdbd4

$email = $_POST['email'];
$newPass = $_POST['passwd'];
$encrypted_newPass = md5($newPass);
$update = "UPDATE ih_proj4User SET pswd='$encrypted_newPass' WHERE email='$email';";

// Update the database with this new information
$result = mysql_query($update);

header('Location: pass.php?head=Password+Successfully+Reset&sub=Try+logging+in+again');
?>