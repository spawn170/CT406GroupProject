<?php
$link = mysql_connect('localhost', 'ijharley', 'ct406');
$db = mysql_select_db('ct406s13');

$email = $_POST['email'];
$newPass = $_POST['passwd'];
$encrypted_newPass = md5($newPass);
$update = "UPDATE ih_proj4User SET pswd='$encrypted_newPass' WHERE email='$email';";

// Update the database with this new information
$result = mysql_query($update);
?>