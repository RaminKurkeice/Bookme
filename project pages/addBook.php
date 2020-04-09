<!DOCTYPE html>
<html>
<head>
	<title>Bookme-Add Book</title>
</head>
<body>
	<h1>Add Book</h1>
	
	<?php
		$bookTitle = $bookDescription = $keywords = $author = $publisher = $datePublished = "";
		$bookTitleError = $bookDescriptionError = $keywordsError = $authorError = $publisherError = $datePublishedError = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			if (empty($_POST["bookTitle"])) {
				$bookTitleError = "Title is required";
			}
			else if (strlen($_POST["bookTitle"]) > 160) {
				$bookTitleError = "Title must not be longer than 160 characters";
			}
			else {
				$bookTitle = CleanInput($_POST["bookTitle"]);
			}
			
			if (strlen($_POST["bookDescription"]) > 4000) {
				$bookDescriptionError = "Description must not be longer than 4000 characters";
			}
			else {
				$bookDescription = CleanInput($_POST["bookDescription"]);
			}
			
			if (strlen($_POST["keywords"]) > 200) {
				$keywordsError = "list of keywords must not be longer than 200 characters";
			}
			else {
				$keywords = CleanInput($_POST["keywords"]);
			}
			
			if (empty($_POST["author"])) {
				$authorError = "Author is required";
			}
			if else (strlen($_POST["author"]) > 160) {
				$authorError = "List of authors must not be longer than 160 characters";
			}
			else {
				$author = CleanInput($_POST["author"]);
			}
			
			if (empty($_POST["publisher"])) {
				$publisherError = "Publisher is required";
			}
			if else (strlen($_POST["publisher"]) > 60) {
				$publisherError = "Publisher must not be longer than 60 characters";
			}
			else {
				$publisher = CleanInput($_POST["publisher"]);
			}
			
			if (empty($_POST["datePublished"])) {
				$datePublishedError = "Date of Publication is required";
			}
			else {
				$datePublished = CleanInput($_POST["datePublished"]);
			}
			
			
			if ($bookTitleError = "" && $authorError = "" && $publisherError = "" && $datePublishedError = "") {
				$dbConnect = mysqli_connect('localhost', 'webEdit', 'Password1', 'database')
				or die("Failed to connect to server!\n");
				$dbQuery = "insert into books(title, description, keywords, author, publisher, date_published) values($bookTitle, $bookDescription, $keywords, $author, $publisher, $datePublished);";
				$dbResult = mysqli_query($dbConnect, $dbQuery)
				or die("Failed to update book in database!\n");
			}
			
		}
		
		function CleanInput($input) {
			$input = trim($input);
			$input = htmlspecialchars($data);
			
			return $input;
		}
	?>
	
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Title: <input type="text" name="bookTitle"/>
		<p class="error"> <?php echo $bookTitleError; ?></p>
		<br><br>
		Description: <br><textarea name="bookDescription"><br>
		<p class="error"> <?php echo $bookDescriptionError; ?></p>
		<br><br>
		Keywords: <input type="text" name="keywords"/>
		<p class="error"> <?php echo $keywordsError; ?></p>
		<br><br>
		Author: <input type="text" name="author"/>
		<p class="error"> <?php echo $authorError; ?></p>
		<br><br>
		Publisher: <input type="text" name="publisher"/>
		<p class="error"> <?php echo $publisherError; ?></p>
		<br><br>
		Date of Publication: <input type="date" name="datePublished"/>
		<p class="error"> <?php echo $datePublishedError; ?></p>
		<br><br>
		<input type="submit" name="submit" value="Save"/>
	</form>
</body>
</html>
