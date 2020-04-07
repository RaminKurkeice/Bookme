
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


	 $usernameErr = $PErr = $loginErr = "" $FnameErr = "" $LnameErr = "" $emailErr = "";
	 $unserame = $pass = $Fname = $Lname = $email = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
 		 if (empty($_POST["pass"])) {
			$PErr = "Enter Password";
		  } else {
			$password = test_input($_POST["password"]); }
			
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
			$database=mysqli_connect('localhost','testuser','pass','lastName','firstName','email');
			$hashp=hash('*****',$pass);
			$sql="SELECT * from account WHERE username ='$username' AND password='$hashp'AND FirstName='$firstName'AND LastName='$lastName',AND email='$em';";
			$record =mysqli_Query($database,$sql) or die (" Cannot fine account");
			$a=mysqli_num_rows($record);
			if ($a===0){
				$loginErr="Invalid username or password! ";
			}else{ 
				header('Location: Bookme MainPage.html');}
		}}?></html>

