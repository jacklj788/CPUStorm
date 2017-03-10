<?php
$servername = "localhost";
$username = "jackjohnston";
$password = "12345678";
$database = "jackjohnston";


$_SESSION['product_id'] = "";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
// echo "Connected successfully";

$sql = "SELECT * FROM products WHERE Category_ID = 7 OR Category_ID = 8 OR Category_ID = 9 OR Category_ID = 10 OR Category_ID = 11";
// FILTERS TO DISPLAY ONLY THE IN STOCK PRODUCTS
$sqlOutOfStock = "SELECT * FROM products WHERE quantity = 0 AND Category_ID = 7 OR quantity = 0  AND Category_ID = 8 OR quantity = 0  AND Category_ID = 9 OR quantity = 0  AND Category_ID = 10 OR quantity = 0  AND Category_ID = 11";
// FILTERS TO DISPLAY ONLY THE OUT OF STOCK PRODUCTS

$result = $conn->query($sql);

$test = mysqli_query($conn, "SELECT * FROM products WHERE Category_ID = 2");

?>

<html>
<head>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">

<script>
function showUser(str) {
    if (str == "") {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","filterPHP.php?q="+str,true);
        xmlhttp.send();
    }
}
</script>
</head>
<body>
<header><img src="Images/CPUstorm.png" alt="CPU storm banner"></header>
<!-- site image banner -->
<menu>
	<ul>
		<li><a href="Home.php">Home</a></li>
		<li><a href="Computer.php">Computer</a></li>
		<li><a href="Parts.php">Parts</a></li>
        <li><a href="Contact.html">Contact</a></li>
        <li><a href="Login.php">Login</a></li>
	</ul>
</menu>
<!-- top bar navigation -->
<nav>Filter
<form>
<select name="users" onchange="showUser(this.value)">
  <option value="">Select a category:</option>
  <option value="7">Gaming</option>
  <option value="8">Office</option>
  <option value="9">All-in-one</option>
  <option value="10">Apple</option>
  <option value="11">Laptop</option>
  </select>
</form>
</nav>

<article id="parts">

<div id="txtHint">
<?php
if ($result->num_rows > 0)
{
    // output data of each row
while($row = $result->fetch_assoc())
{
echo "<section class='sideWays'>" . $row['product_name'] . " " . $row['description'] . " " . "<div class='colHeaderImageRight'>" . '<img src="'.$row['image'].'">' . "<div class='rightSection'><a href='productView.php?link=$row[product_ID]'>In Stock</a></div></div></section>";
}
}
else
{
    echo "0 results";
}


?>
</div>

</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>
</body>
</html>