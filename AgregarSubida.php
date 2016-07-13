<?php
$con=mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b0f137b65248c5","3f713dcb","u241352082_bdfin");
if (mysqli_connect_errno()) {
	die("Failed to connect to MySQL" . mysqli_connect_error());
}
$string = file_get_contents('php://input'); 
$objeto = json_decode($string, true);

$query = "INSERT INTO Subidas (LatLong,IdLinea,Horasubida,Calle) VALUES (?, ? , ?, ?)";
$stmt = $con->prepare($query);
$stmt->bind_param(
	'ssss',
	
	$objeto["LatLong"],
	$objeto["IdLinea"],
	$objeto["Horasubida"],
        $objeto["Calle"]
);
$stmt->execute();


$query2 = "SELECT MAX(IdSubida) AS ultimo FROM Subidas";
$result = mysqli_query($con, $query2);
$objetos = array();
while($row = mysqli_fetch_array($result)) 
{ 
	$Id=$row['ultimo'];
    	echo $Id;
	
}
mysqli_close($con);
header("Content-Type: application/json");
$json_string = json_encode($objetos);



?>

