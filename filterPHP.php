<!DOCTYPE html>
<html>
<head>

<link href="Styles/StyleSheet.css" rel="stylesheet" type="text/css">

</head>
<body>

<?php
$q = intval($_GET['q']);

$con = mysqli_connect('localhost','jackjohnston','12345678','jackjohnston');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

mysqli_select_db($con,"jackjohnston");
$sql="SELECT * FROM products WHERE Category_ID = '".$q."'";
// OR cat_id 9 just there for debgging something

$result = $con->query($sql);


if ($result->num_rows > 0)
{
    // output data of each row
while($row = $result->fetch_assoc())
{
print "<section class='sideWays'>" . $row['product_name'] . " " . $row['description'] . " " . "<div class='colHeaderImageRight'>" . '<img src="'.$row['image'].'">' . "<div class='rightSection'><a href='productView.php?link=$row[product_ID]'>In Stock</a></div></div></section>";
}
}
else
{
    echo "0 results";
}


mysqli_close($con);
?>

</body>
</html>