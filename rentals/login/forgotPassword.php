<?php
	// Connect to the database
	$link = mysql_connect('localhost', 'apmaricich', 'ct406');
	$db = mysql_select_db('ct406s13');

	// Get form input as well as data we will need for registration
	$email = $_POST['email'];
	$query = "SELECT * FROM table_name WHERE email='$email'";
	


	// Validate input
	if (!isValidEmail($email)) {
		header('Location: pass.php?head=SQL+Injection+Prevented&sub=Dont+do+that+again');
	}


	// Check to see if user already exsists in the database. $exist
	$result = mysql_query($query);
	$exist = mysql_num_rows($result);

	if (!$exist) {
		header('Location: pass.php?head=User+does+not+exist&sub=Try+again+with+a+different+email');
	}
	else if ($exist) {
		//create the new user in the database
		$to      = $email; 
		$subject = 'Metro Listings Email Verification';
		$message = ' 
		You forgot your password?
		Click the link in order to reset your password. 
		------------------------ 
		http://leda.capitol-college.edu/npharrell/resetPass.php?email='.$email.'';
		$headers = 'From:noreply@metrolistings.com' . "\r\n";
		mail($to, $subject, $message, $headers);
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