<?php

$link = mysql_connect('localhost', 'ijhurley', 'ct406');
$db = mysql_select_db('ct406s13');

$email = $_GET['email'];
$hash = $_GET['hash'];
$select = "SELECT * FROM ih_proj4User WHERE email='$email' AND hash='$hash';";
$update = "UPDATE ih_proj4User SET validate=1 WHERE email='$email';";

$result = mysql_query($select);
$exist = mysql_num_rows($result);

if (!$exist) {
header('Location: pass.php?head=Not+Verified&sub=There+was+a+problem+verifying+your+email');
}
if ($exist) {
$result = mysql_query($update);
header('Location: pass.php&head=Account+Verified&sub=You+should+now+be+able+to+log+in');
}
?>