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
$linkID = $_GET['link'];


$sql = "SELECT * FROM products WHERE product_ID = ".$linkID . " ";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<!-- declares the site as HTML5 -->
<html>

<head>
<title>Product View</title>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">
<!-- links the CSS to the page -->
</head>

<body>

<header><img src="Images/CPUstorm.png" alt="CPU storm banner"></header>
<!-- header image banner -->
<menu>
	<ul>
		<li><a href="Home.php">Home</a></li>
		<li><a href="Computer.php">Computer</a></li>
		<li><a href="Parts.php">Parts</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="Login.php">Login</a></li>
	</ul>
</menu>
<!-- gives the article the homeArticle css -->
<article id="homeArticle">

<?php
if ($result->num_rows > 0)
{
    // output data of each row
    while($row = $result->fetch_assoc())
{
echo '<img src="'.$row['image'].'" width=500>';
echo "<section id='productView'><ul><li> Price: " . $row['price'] . "</li><li>" . $row['product_name'] . "</li><li> " . $row['description'] . "</li><li>" .$row['quantity'] . " left in stock</li>";
echo "<a href='order.php?link=$row[product_ID]'>Order</a></section>";
// set session here
$_SESSION['s_price'] = $row['price'];
$_SESSION['s_id'] = $row['product_ID'];

}
}
else
{
    echo "0 results";
}

?>
</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>
<!-- site footer for external and copyright information -->
</body>

</html>