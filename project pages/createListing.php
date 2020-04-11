<?php
	//define variables and set to empty values
	$BookCondition = $Owner = $Book = $Author = $Price = $bookDescription = $keywords = $author = $publisher = $datePublished = "";
	$BookConditionErr = $OwnerErr = $BookErr = $PriceErr = $loginErr = $bookDescriptionError = $keywordsError = $datePublishedError = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		if (empty($_POST["Owner"])) {
			$OwnerErr = "Owner is required";
		} else {
			$Owner = test_input($_POST["Owner"]); 
		}
		
		if (empty($_POST["Price"])) {
			$PriceErr = "Price is required";
		} else {
			$Price = test_input($_POST["Price"]); 
		}
		
		if (empty($_POST["BookCondition"])) {
			$BookConditionErr = "BookCondition is required";
		} else {
			$BookCondition = test_input($_POST["BookCondition"]); 
		}
		
		if (empty($_POST["Book"])) {
			$BookErr = "Book is required";
		} else {
			$Book = test_input($_POST["Book"]);  
		}
		
		if (empty($_POST["bookDescription"])) {
			$bookDescriptionError = "Description is required";
		} else {
			$bookDescription = test_input($_POST["bookDescription"]); 
		}
		
		$author = test_input($_POST["author"]);
		$publisher = test_input($_POST["publisher"]);
		
		if (empty($_POST["datePublished"])) {
			$datePublishedError = "Description is required";
		} else {
			$datePublished = test_input($_POST["datePublished"]); 
		}
		
		
		//continues to target page if all validation is passed
		if ( $BookErr =="" && $AuthorErr =="" ){
			// check if exists in database
			$dbc=mysqli_connect('localhost','web','Password1','bookme') or die("Could not Connect!\n");
			$sql="INSERT INTO Listing (owner, price, book_condition, book_title, book_author, book_publisher, book_published, description)
				VALUES ('$Owner', $price, '$BookCondition', '$Book', '$Author', '$publisher', '$datePublished', '$bookDescription');";	
			$result =mysqli_Query($dbc,$sql) or die(" Error querying database");
			
			$a=mysqli_num_rows($result);
		}
	}
	
    // clears spaces etc to prep data for testing
	function test_input($data){
		$data=trim ($data); // gets rid of extra spaces befor and after
		$data=stripslashes($data); //gets rid of any slashes
		$data=htmlspecialchars($data); //converts any symbols usch as < and > to special characters
		return $data;
	}
	
?>
