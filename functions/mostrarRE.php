<?php
include("phpfunctions.php");
$pdo = conexion();
$sql = "SELECT *  FROM vasegurobd.cat_riesgosexcluidos";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
echo "<option>".$milista['detallesRiesgoEx']."</option>";

}
 
mysqli_close($pdo);
?>