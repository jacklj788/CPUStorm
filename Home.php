<?php
session_start();
$servername = "localhost";
$username = "jackjohnston";
$password = "12345678";
$database = "jackjohnston";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

$sql = "SELECT * FROM products WHERE product_ID = 1 OR product_ID = 3 OR product_ID = 4";

$result = $conn->query($sql);
?>

<!DOCTYPE html>

<html>
<head>
<title>Home</title>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">
</head>
<!-- the CSS is linked to the site within the head -->

<body>

<header><img src="Images/CPUstorm.png" alt="CPU storm banner"></header>

<menu>
	<ul>
		<li><a href="Home.php">Home</a></li>
		<li><a href="Computer.php">Computer</a></li>
		<li><a href="Parts.php">Parts</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="Login.php">Login</a></li>
	</ul>
</menu>
<!-- Site navigation along the top -->
<article id="homeArticle">
<!-- <table border="1">
<tr> <th>User_id</th> <th>Username</th> <th>Password</th> </tr> -->

<?php
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
{
echo "<section>" . $row['product_name'] . " " . $row['description'] . " " . "<div class='colHeaderImageRight'>" . '<img src="'.$row['image'].'"">' . "</div>" . "</section>";
}
}
else
{
    echo "0 results";
}


?>

<!-- </table> -->

<!-- The sections divide the page up into three products -->
</article>
<!-- the article wraps the sections together -->
<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>

</body>

</html>