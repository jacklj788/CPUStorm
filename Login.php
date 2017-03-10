<?php
session_start();

if ( isset($_POST['button']) )
{
$_SESSION['userid'] = "";
$_SESSION['username'] = "";

$username = $_POST['username'];
$password = $_POST['password'];

$servername = "localhost";
$dbusername = "jackjohnston";
$dbpassword = "12345678";
$database = "jackjohnston";
$conn = new mysqli($servername, $dbusername, $dbpassword, $database);
if ($conn->connect_error) {
die("<br>Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM users WHERE Username='" . $username . "' AND Password='" . $password . "';";

$result = $conn->query($sql);
if ($result->num_rows > 0)
{
$row = $result->fetch_assoc();
$_SESSION['userid'] = $row['User_ID'];
$_SESSION['username'] = $username;
}
else
{
echo ("<br> The user does not appear to exist");

}

}
else
{

}

?>

<html>
<head>
<title> Login </title>
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
<!-- Site navigation along the top -->
<article id="homeArticle">

<h1>Login</h1>
<form action="Login.php" method="post">
<table>
<tr><td align="right">username:</td><td align="left"><input type="text" name="username"></td></tr>
<tr><td align="right">password:</td><td align="left"><input type="password" name="password"></td></tr>
<tr><td align="right"><input type="submit" name="button"></td></tr>
</table>
</form>
<?php 

if ($_SESSION['userid'] == 1)
{
echo "welcome " . $_SESSION['username'];
echo "<br><a href='adminPage.php'>link to admin control page</a>";
echo "<br><a href='Logout.php'>Logout</a>";
}

else if ($_SESSION['userid'] > 1)
{
	echo "welcome " . $_SESSION['username'];
	echo "<br><a href='Logout.php'>Logout</a>";
}
else
{
	echo "Don't have an account? <a href='createAccount.php'> Click Here </a> to sign up";
}


?> 
</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>
</body>
</html>