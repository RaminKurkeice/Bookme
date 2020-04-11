<!DOCTYPE HTML>
<html>

<head>
<meta charsset="utf-8">
<title>Bookme - Create Listing</title>
<link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
<div class="header">
	<div class="container">
		<div class="logo">
			<img src="BookmeLogo.png" style="width:25%">	
		</div>
		
		<div class="nav">
			<ul>
				<li><a href="Postings.html">Postings</a></li>
				<li><a href="Bookme-MainPage.html">Home</a></li>
				<li><a href="AboutUs.html">About Us</a></li>
				<li><a href="feedback.html">Contact</a></li>
				<li><a href="info.html">Information</a></li>
				<li><a href="signin.html">Login</a></li>
			</ul>
		</div>
	</div>
</div>

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
	
	
	// delete listing from database
	if(isset($_POST['Delete'])){
	$DBook=$_POST['DeleteBook'];
	$dbc=mysqli_connect('localhost','web','Password1','bookme') or die("Could not Connect!\n");
	
	$sql3= "delete from Listing where Book_Title='$DBook'";
	
	$result =mysqli_Query($dbc,$sql3) or die("Error querying database");
	
	$a=mysqli_num_rows($result);
}
?>

<div class="container">
<h2 class="img1">Add Book</h2>
<form method="post" action="createListings.php"> 
	<font size="+2">Owner:</font>  <input type="text" name="Owner" value="Owner"/>
	<span class="error">* <?php echo $OwnerErr;?></span>
	<br/><br/>
	<font size="+2">Price:</font>
	<input type="text" name="Price" value="Price"/>
	<span class="error">* <?php echo $PriceErr;?></span>
	<br/><br/>
	<font size="+2">Book Condition:</font>
	<input type="text" name="BookCondition" value="Book Condition"/>
	<span class="error">* <?php echo $BookConditionErr;?></span>
	<br/><br/>
	<font size="+2">Book Title:</font> <input type="text" name="Book" value="Book Title"/>
	<span class="error">* <?php echo $BookErr;?></span>
	<br/><br/>
	<font size="+2">Author::</font> <input type="text" name="Author" value="Author"/>
	<span class="error">* <?php echo $AuthorErr;?></span>
	<br/><br/>
    <font size="+2">Publisher:</font> <input type="text" name="publisher" value="Publisher"/>
	<span class="error">* <?php echo $publisherError;?></span>
	<br/><br/>
	<font size="+2">Date of Publiscation:</font> <input type="date" name="datePublished" value="Date of Publiscation"/>
	<span class="error">* <?php echo $datePublished;?></span>
	<br/><br/>
	<font size="+2">Description::</font> <input type="text" name="bookDescription" value="Description"/>
	<span class="error">* <?php echo $bookDescriptionError;?></span>
	<br/><br/>
	
	
	<span class="error"> <?php echo $loginErr;?></span>

	<input type="submit" name="submit" value="Add Book"/>
<br/><br/>
</form>
<form method="post" action="deleteListings.php">
<h1>Delete Book</h1>
<font size="+2">Book title to delete:</font> <input type="text" name="DeleteBook" value="Book title"/>
	<br/><br/>
	
	<input type="submit" name="Delete" value="Delete"/>
</form>

</div>
</html>
