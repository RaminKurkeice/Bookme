<!DOCTYPE HTML
<html>
<head>
<title>Contacts</title>
<style>
 .error {color:#FF0000;}
</style>
</head>
<body>
<h2>login</h2>
<?php

	function test_input($data){
		$data=trim ($data); 
		$data=stripslashes($data); 
		$data=htmlspecialchars($data); 
		return $data;
	}


	 $usernameErr = $PErr = $loginErr = $FnameErr = $LnameErr = $emailErr = "";
	 $unserame = $pass = $salt = $hash = $Fname = $Lname = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
 		 if (empty($_POST["pass"])) {
			$PErr = "Enter Password";
		  } else {
			$password = test_input($_POST["password"]);
		  }
			
		 if (empty($_POST["username"])) {
			$unameErr = "Enter Username";
		  } else {
			$uname = test_input($_POST["uname"]);    }
			
 		 if (empty($_POST["Fname"])) {
			$FnameErr = "Enter Password";
		  } else {
			$firstName = test_input($_POST["Fname"]); }
			
			
			if (empty($_POST["Lname"])) {
			$LnameErr = "Enter Last Name";
		  } else {
			$lastName = test_input($_POST["Lname"]); }
			
			
			if (empty($_POST["email"])) {
			$emailErr = "Enter email";
		  } else {
			$em = test_input($_POST["email"]); }
			 
			
		if ( $unameErr ==""&& $PErr =="" && $FnameErr == ""&& LnameErr==""&& emailErr == ""){
			$database=mysqli_connect('localhost', 'web', 'Password1', 'bookme');
			$salt=random_bytes(128)
			$hashp=hash('sha512',$pass.$salt);
			$sql="INSERT INTO account (username, salted_hash, salt) VALUES ($uname,$hashp,$salt);";
			$record =mysqli_Query($database,$sql) or die("Cannot create account");
			$sql="INSERT INTO account (username, photo_url, first_name, last_name, email) 
					VALUES ($uname,$photoURL,$firstName,$lastName,$em);";
			$record =mysqli_Query($database,$sql) or die("Cannot create account");
			$a=mysqli_num_rows($record);
			if ($a===0){
				$loginErr="Invalid username or password! ";
			}else{ 
				header('Location: Bookme MainPage.html');}
		}
	}
		
	echo "welcome"+ $username."<br/>";
	mysqli_close($conn); 

?></html>

