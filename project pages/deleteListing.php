<?php
if(isset($_POST['Delete'])){
	$DBook=$_POST['DeleteBook'];
	$dbc=mysqli_connect('localhost','web','Password1','bookme') or die("Could not Connect!\n");
	
	$sql3= "delete from Listing where Book_Title='$DBook'";
	
	$result =mysqli_Query($dbc,$sql3) or die("Error querying database");
	
	$a=mysqli_num_rows($result);
	}
?>