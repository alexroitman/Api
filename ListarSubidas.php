<?php
$con=mysqli_connect("us-cdbr-azure-central-a.cloudapp.net","b0f137b65248c5","3f713dcb","u241352082_bdfin");
if (mysqli_connect_errno()) {
   echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$id=$_GET["IdLinea"];
$query ="SELECT * FROM Subidas WHERE IdLinea='$id' ORDER BY IdSubida DESC";

$objetos = array();
$result = mysqli_query($con, $query);

while($row = mysqli_fetch_array($result)) 
{ 
	$IdSubida=$row['IdSubida'];
	$LatLong=$row['LatLong'];
	$IdLinea=$row['IdLinea'];	
	$Horasubida=$row['Horasubida'];	
        $UltimaUbicacion=$row['UltimaUbicacion'];
$Calle=$row['Calle'];	
	$objeto = array('IdSubida'=> $IdSubida, 'LatLong'=> $LatLong, 'IdLinea'=> $IdLinea, 'Horasubida'=> $Horasubida,'UltimaUbicacion'=>$UltimaUbicacion,'Calle'=>$Calle);	
    	$objetos[] = $objeto;
	
}
$close = mysqli_close($con) 
or die("Ha sucedido un error inesperado en la desconexion de la base de datos");
header("Content-Type: application/json");
$json_string = json_encode($objetos,JSON_PRETTY_PRINT);
echo $json_string;
?>	