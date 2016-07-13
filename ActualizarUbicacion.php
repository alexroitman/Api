<?php
$con=mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b0f137b65248c5","3f713dcb","u241352082_bdfin");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$string = file_get_contents('php://input'); 
$objeto = json_decode($string, true);
$UltimaUbicacion=$objeto["UltimaUbicacion"];
$IdSubida=$objeto["IdSubida"];
$Hora=$objeto["Hora"];
$Calle=$objeto["Calle"];

$query ="UPDATE subidas SET UltimaUbicacion='$UltimaUbicacion',Horasubida='$Hora',Calle='$Calle' WHERE IdSubida='$IdSubida'";

//$result = mysqli_query($con, $query);
$stmt = $con->prepare($query);

$stmt->execute();
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
?>