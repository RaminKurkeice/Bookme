<!DOCTYPE HTML>
<html>
<head>
<title>AdminPage</title>
<style>
 .error {color:#FF0000;}
</style>
</head>
<body>
<h2>Add Book</h2>
<?php
	//define variables and set to empty values
	$BookConditionErr = $OwnerErr = $BookErr = $AuthorErr = $PriceErr = $loginErr = $bookDescriptionError = $keywordsError = $publisherError = $datePublishedError = "";
	 

$BookCondition = $Owner = $Book = $Author = $Price = $bookDescription = $keywords = $author = $publisher = $datePublished = "";

	if ($_SERVER["REQUEST_METHOD"] == "POST") {


		 if (empty($_POST["Book"])) {
			$BookErr = "Book is required";
		  } else {
			$Book = test_input($_POST["Book"]);  
		  }

		  if (empty($_POST["Author"])) {
			$AuthorErr = "Author is required";
		  } else {
			$Author = test_input($_POST["Author"]); 
		  }
		  
		  if (empty($_POST["Price"])) {
			$PriceErr = "Price is required";
		  } else {
			$Price = test_input($_POST["Price"]); 
		  }
		  
		  if (empty($_POST["bookDescription"])) {
			 $bookDescriptionError = "Description is required";
		  } else {
			$bookDescription = test_input($_POST["bookDescription"]); 
		  }
		  
		  if (empty($_POST["keywords"])) {
			$keywordsError = "keywords is required";
		  } else {
			$keywords = test_input($_POST["keywords"]); 
		  }
		  
		  if (empty($_POST["publisher"])) {
			$publisherError = "publisher is required";
		  } else {
			$publisher = test_input($_POST["publisher"]); 
		  }
		  
		  if (empty($_POST["Owner"])) {
			$OwnerErr = "Owner is required";
		  } else {
			$Owner = test_input($_POST["Owner"]); 
		  }
		  
		  if (empty($_POST["BookCondition"])) {
			$BookConditionErr = "BookCondition is required";
		  } else {
			$BookCondition = test_input($_POST["BookCondition"]); 
		  }



		//continues to target page if all validation is passed
		if ( $BookErr =="" && $AuthorErr =="" ){
			// check if exists in database
			$dbc=mysqli_connect('localhost','web','Password1','bookme') or die("Could not Connect!\n");
			
		$sql="INSERT INTO Listing (owner, price, book_condition, book_title, book_author, book_publisher, book_published, description)
				VALUES ('$Owner', $price, '$BookCondition', '$Book', '$Author', '$publisher', '$datePublished', '$bookDescription');";	
$result =mysqli_Query($dbc,$sql) or die (" Error querying database");

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
if(isset($_POST['Delete'])){
$DBook=$_POST['DeleteBook'];
$dbc=mysqli_connect('localhost','Admin','Admin!23','Bookme') or die("Could not Connect!\n");
			
			$sql3= "delete from Listing where Book_Title='$DBook'";

			$result =mysqli_Query($dbc,$sql3) or die ("Error querying database");

			$a=mysqli_num_rows($result);
}

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
	Owner: <input type="text" name="Owner" value="<?php echo $Owner;?>"/>
	<span class="error">* <?php echo $OwnerErr;?></span>
	<br/><br/>
	Price:
	<input type="text" name="Price" value="<?php echo $Price;?>"/>
	<span class="error">* <?php echo $PriceErr;?></span>
	<br/><br/>
	Book Condition:
	<input type="text" name="BookCondition" value="<?php echo $BookCondition;?>"/>
	<span class="error">* <?php echo $BookConditionErr;?></span>
	<br/><br/>
	Book Title: <input type="text" name="Book" value="<?php echo $Book;?>"/>
	<span class="error">* <?php echo $BookErr;?></span>
	<br/><br/>
	Author: <input type="text" name="Author" value="<?php echo $Author;?>"/>
	<span class="error">* <?php echo $AuthorErr;?></span>
	<br/><br/>
Publisher: <input type="text" name="publisher" value="<?php echo $publisher;?>"/>
	<span class="error">* <?php echo $publisherError;?></span>
	<br/><br/>
	Date of Publiscation: <input type="date" name="datePublished" value="<?php echo $datePublished ;?>"/>
	<span class="error">* <?php echo $datePublished;?></span>
	<br/><br/>
	Description: <input type="text" name="bookDescription" value="<?php echo $bookDescription;?>"/>
	<span class="error">* <?php echo $bookDescriptionError;?></span>
	<br/><br/>
	
	
	
	<span class="error">* <?php echo $loginErr;?></span>

	<input type="submit" name="submit" value="Add Book"/>
<br/><br/>
<h1>Delete Book</h1>
Delete Book title: <input type="text" name="DeleteBook" value="<?php echo $DBook;?>"/>
	
	<br/><br/>
	

	<input type="submit" name="Delete" value="Delete"/> 

</form>


</html>
