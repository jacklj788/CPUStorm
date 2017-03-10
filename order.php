<?php
session_start();

if ($_SESSION['userid'] < 1)
{
header('Location: Login.php' ) ;
}


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
$id = $_SESSION['s_id'];
$price = $_SESSION['s_price'];
$user = $_SESSION['userid'];

//echo $price;
//echo $user;
//echo $id;

if (isset ($_GET['confirmOrder']))
{
	
$quan = $_GET['quantity'];
$priceNew = $price * $quan;

$sqlORDER="INSERT INTO orders (product_ID, price, quantity, user_ID) VALUES ($id, '$priceNew', $quan, '$user')";
	
if ($conn->query($sqlORDER) === TRUE)
{
    echo "Successfully placed your order. Thank you for shopping with us.";
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}	

}
?>
<!DOCTYPE html>
<html>
<head>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">
</head>
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

<article id="homeArticle">
<h1>Confirm Order</h1>
<form name="placeOrder" action="order.php" onsubmit="return validteForm()" method="get">
<table>
Are you sure you would like to order one ?
<tr><td align="right">Quantity:</td><td align="left"><input type="number" name="quantity" required></td></tr>
<tr><td align="right"><input type="submit" name="confirmOrder"></td></tr>
</table>
</form>

</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>
</body>
</html>