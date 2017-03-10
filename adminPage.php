<?php
session_start();

if ($_SESSION['userid'] < 1 OR $_SESSION['userid'] > 1)
{
header('Location: Home.php' ) ;
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

if (isset ($_GET['submitForms']))
{
$title = $_GET['p_name'];
$desc = $_GET['form_description'];
$imag = $_GET['p_image'];
$price = $_GET['p_price'];
$quan = $_GET['p_quantity'];
$catID = $_GET['p_catID'];
echo "<br>" . $title . " " . $desc . " " . $imag . " " . $price . " " . $quan . " " . $catID;


$sql = "INSERT INTO  products (product_name, description, image, price, quantity, Category_ID) VALUES ('$title', '$desc', '$imag', '$price', '$quan', '$catID')";
echo "<br>the sql command is: " . $sql;

if ($conn->query($sql) === TRUE)
{
    echo "New record created successfully";
}
else
{
    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

if (isset ($_GET['editPrice']))
{
	$newID = $_GET['new_ID'];
	$newprice = $_GET['new_price'];
	$sqlEdit = "UPDATE products SET price = '$newprice' WHERE product_ID = '$newID'";
	echo "<br> the sl command is: " . $sqlEdit;
	
	
	if ($conn->query($sqlEdit) === TRUE)
	{
		echo "Edited price successfully";
	}
	else
	{
		echo "Error: " . $sqlEdit . "<br>" .$conn->error;
	}
}

if (isset ($_GET['deleteProduct']))
{
	$deleteID = $_GET['delete_ID'];
	$sqlDelete = "DELETE FROM products WHERE product_ID = '$deleteID'";
	echo "<br> the sl command is: " . $sqlDelete;
	
	
	if ($conn->query($sqlDelete) === TRUE)
	{
		echo "Edited price successfully";
	}
	else
	{
		echo "Error: " . $sqlDelete . "<br>" .$conn->error;
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
<h1>ADD a product: </h1>
<form action="adminPage.php" method="get">
<table>
<tr><td align="right">Product Name:</td><td align="left"><input type="text" name="p_name"></td></tr>
<tr><td align="right">Description:</td><td align="left"><input type="text" name="form_description"></td></tr>
<tr><td align="right">Image (File path):</td><td align="left"><input type="text" name="p_image"></td></tr>
<tr><td align="right">Price:</td><td align="left"><input type="text" name="p_price"></td></tr>
<tr><td align="right">Quantity:</td><td align="left"><input type="text" name="p_quantity"></td></tr>
<tr><td align="right">Category:</td><td align="left"><input type="text" name="p_catID"></td></tr>
<tr><td align="right"><input type="submit" name="submitForms"></td></tr>
</table>
</form>

<h1>EDIT a product price: </h1>
<form action="adminPage.php" method="get"> 
<table>
<tr><td align="right">Product ID to update:</td><td align="left"><input type="number" name="new_ID"></td></tr>
<tr><td align="right">New price:</td><td align="left"><input type="text" name="new_price"></td></tr>
<tr><td align="right"><input type="submit" name="editPrice"></td></tr>
</table>
</form>

<h1>DELETE a product: </h1>
<form action="adminPage.php" method="get"> 
<table>
<tr><td align="right">Product ID to delete:</td><td align="left"><input type="number" name="delete_ID"></td></tr>
<tr><td align="right"><input type="submit" name="deleteProduct"></td></tr>
</table>
</form>




</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>
</body>
</html>