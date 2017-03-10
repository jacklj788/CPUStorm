<?php
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

$sql = "SELECT * FROM products WHERE Category_ID = 1 OR Category_ID = 2 OR Category_ID = 3 OR Category_ID = 4 OR Category_ID = 5 OR Category_ID = 6";

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
  <option value="1">GPU</option>
  <option value="2">Motherboard</option>
  <option value="3">CPU</option>
  <option value="4">RAM</option>
  <option value="5">Storage</option>
  <option value="6">Peripherals</option>
  </select>
</form>
</nav>

<article id="parts">
<!--  contents within the div changes on fliter click -->
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