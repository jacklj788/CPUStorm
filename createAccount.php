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



if (isset ($_GET['createAccount']))
{
	$newName = $_GET['createName'];
	$newPass = $_GET['createPass'];
	$user = "user";
	
	$sqlCAccount = "INSERT INTO users (Username, Password, User_Role) VALUES ('$newName', '$newPass', '$user')";
	
	if ($conn->query($sqlCAccount) === TRUE)
{
    echo "Successfully signed up <a href='Login.php'>Login </a>" ;
}
else
{
    echo "Error: " . $sqlCAccount . "<br>" . $conn->error;
}
	
}

?>

<!DOCTYPE html>
<html>
<head>
<title>Create Account</title>
<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">
<!--
<script>
    function validateForm() {
        var un = document.loginform.usr.value;
        var pw = document.loginform.pword.value;
        var username = "username"; 
        var password = "password";
        if ((un == username) && (pw == password)) {
            alert ("Login was successful, thank you");
            return true;
        }
        else {
            alert ("Login was unsuccessful, please check your username and password");
            return false;
        }
  }
</script>
-->
<!-- login validator -->
</head>
<body>

<header><img src="Images/CPUstorm.png" alt="CPU storm banner"></header>

<menu>
	<ul>
		<li><a href="Home.php">Home</a></li>
		<li><a href="Computer.html">Computer</a></li>
		<li><a href="Parts.php">Parts</a></li>
                <li><a href="Contact.html">Contact</a></li>
                <li><a href="Login.php">Login</a></li>
	</ul>
</menu>

<article id="homeArticle">
<!-- homeArticle to expand accross the whole screen -->
<h1>Create an account</h1>

<form method="get"> 
<table>
<tr><td align="right">New Username:</td><td align="left"><input type="text" name="createName" required></td></tr>
<tr><td align="right">New Password:</td><td align="left"><input type="password" name="createPass" required></td></tr>
<tr><td align="right"><input type="submit" name="createAccount"></td></tr>
</table>
</form>

<!-- login forms -->
</article>

<footer>&copy; 2015 CPU Storm | Follow us on twitter @CPUstorm | Like us on facebook /CPUstorm </footer>

</body>

</html>