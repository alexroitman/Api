<?php
$con=mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b0f137b65248c5","3f713dcb","u241352082_bdfin");
if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL" . mysqli_connect_error());
}
$Sub=$_GET["Sub"];

$query = "DELETE FROM `subidas` WHERE IdSubida='$Sub'";
$stmt = $con->prepare($query);
$stmt->execute();
mysqli_close($con);
?>

