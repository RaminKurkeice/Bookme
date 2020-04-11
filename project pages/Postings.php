<html>


 <head>
<meta charsset="utf-8">
<title>Postings</title>

<link rel="stylesheet" type="text/css" href="styles.css">

<link rel="stylesheet" type="text/css" href="styles.css" />


</head>

</html>
<?php
$servername = "localhost";
$username = "web";
$database = "bookme";
$password="Password1";
define('newline',"<br>\n"); 

$conn = mysqli_connect($servername, $username, $password, $database) or die("Connection failed: " . mysqli_connect_error());

$owner = $_POST['owner'];
$book_title = $_POST['title'];
$book_author = $_POST['author'];
$date = $_POST['date'];
$decription = $_POST['des'];
$price = $_POST['price'];
$condition = $_POST['Condition'];

$sql="INSERT INTO Listings (Owner, Price, Condition, Book_Title, Book_Author, Date, Description) 
VALUES ('$owner','$price', '$condition', '$book_title', '$book_author', '$date', '$decription');";

echo "Book Posting complete";

newline

$sql="SELECT * FROM Listings";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    echo "<h1>Postings</h1>" . newline; 
    echo "<table border=1>" . newline;
	
    $headings="<tr><th>OWNER</th><th>BOOK_TITLE</th><th>BOOK_AUTHOR</th><th>PUBLISHED_DATE</th><th>DESCRIPTION</th><th>PRICE</th><th>CONDITION</th></tr>";
	
    echo $headings.newline; 
    
    while($row = mysqli_fetch_assoc($result))
    {
       $Postings=sprintf("<tr><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%s</td><td>%d</td><td>%s</td></tr>\n", 
               $row["OWNER"], $row["BOOK_TITLE"], $row["BOOK_AUTHOR"], $row["PUBLISHED_DATE"],$row["DESCRIPTION"],$row[PRICE],$row["CONDITION"]); 
       echo $Postings;
    }

    echo "</table>" . newline;
} else {
    echo "No rows retreived";
}


echo newline;
mysqli_close($conn); 

?>