<?php
// Connect to the database
$link = mysql_connect('localhost', 'ijharley', 'ct406');
$db = mysql_select_db('ct406s13');

// Get form input as well as data we will need for registration
$email = $_POST['email'];
$passwd = $_POST['passwd'];
$age = $_POST['age']+0;
$color = $_POST['color'];
$hash = md5(rand(0,1000));
$encrypted_passwd = md5($passwd);
$get = "SELECT * FROM ih_proj4User";

$result = mysql_query($get);
$num = mysql_num_rows($result) + 10;
// $query = "SELECT * FROM ih_proj4User WHERE email='$email'";
$query = sprintf("SELECT * FROM ih_proj4User WHERE email='%s'", mysql_real_escape_string($email));
// $insert = "INSERT INTO ih_proj4User (email, pswd, hash, age, color, validate) VALUES ('$email', '$encrypted_passwd', '$hash', $age, '$color', 1);";
$insert = sprintf("INSERT INTO ih_proj4User VALUES ($num, '%s', '%s', '%s', $age, '%s', 1);", mysql_real_escape_string($email), mysql_real_escape_string($encrypted_passwd), mysql_real_escape_string($hash), mysql_real_escape_string($color));


// Validate input
// $valid = isValidEmail($email);
// if (!$valid) {
// header('Location: pass.php?head=SQL+Injection+Prevented&sub=Dont+do+that+again');
// }


// Check to see if user already exsists in the database. $exist
$result = mysql_query($query);
$exist = mysql_num_rows($result);

if ($exist) {
header('Location: pass.php?head=User+Already+Exists&sub=Try+again+with+a+different+email');
}
else if (!$exist) {
$result = mysql_query($insert);
//create the new user in the database
$to = $email;
$subject = 'Metro Listings Email Verification';
$message = '
Welcome to Metro Listings!
Thank you for joining our community! In order to accessyour account, please click the activation link below.
------------------------
Email: ' . $email . '
Password: '. $passwd . '
------------------------
Please click this link to activate your account:
http://leda.capitol-college.edu/~apmaricich/rentals/login/verification.php&email='.$email.'&hash='.$hash.'';
$headers = 'From:noreply@metrolistings.com' . "\r\n";
//mail($to, $subject, $message, $headers);
//header('Location: pass.php?head=Email+Sent&sub=Check+your+email');
header('Location: doneRegistered.php');
}









function isValidEmail($addr)
{
//Checks whether a string is a valid email address.
//Called by validateInput().

//Only one at-sign
$atSplit = explode("@",$addr);
if(count($atSplit) != 2)
return false;

$domain = $atSplit[1];

//Only one period
$pdSplit = explode('.',$domain);
if(count($pdSplit) < 2)
return false;

$suffix = $pdSplit[count($pdSplit) - 1];

//Valid suffix
switch($suffix)
{
case "com":
case "net":
case "org":
case "gov":
case "co":
break;
default:
return false;
}

//Valid domain name
if(preg_match('/[^\-\d\w\.]/',$domain))
return false;

//Valid username
if(preg_match('/[^\-\d\w]/',$atSplit[0]))
return false;

//First character is a letter
if(preg_match('/[^A-Za-z]/',substr($atSplit[0],0,1)))
return false;

return true;
}


?>