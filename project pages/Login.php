
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


	 $usernameErr = $PErr = $loginErr = "";
	 $unserame = $pass= "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
 		 if (empty($_POST["pass"])) {
			$PErr = "Enter Password";
		  } else {
			$password = test_input($_POST["password"]); }
		 if (empty($_POST["username"])) {
			$unameErr = "Enter Username";
		  } else {
			$uname = test_input($_POST["uname"]);    }
		if ( $unameErr ==""&& $PErr ==""){
			$database=mysqli_connect('localhost','testuser','pass');
			$hashp=hash('*****',$pass);
			$sql="SELECT * from account WHERE username ='$username' AND password='$hashp';";
			$record =mysqli_Query($database,$sql) or die (" Cannot fine account");
			$a=mysqli_num_rows($record);
			if ($a===0){
				$loginErr="Invalid username or password! ";
			}else{ 
				header('Location: Bookme MainPage.html');}
		}}?></html>

