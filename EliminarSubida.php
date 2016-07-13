<?php
$con=mysqli_connect("localhost","u241352082_alexr","123456","u241352082_bdfin");
if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL" . mysqli_connect_error());
}
$Sub=$_GET["Sub"];

$query = "DELETE FROM `Subidas` WHERE IdSubida='$Sub'";
$stmt = $con->prepare($query);
$stmt->execute();
mysqli_close($con);
?>

