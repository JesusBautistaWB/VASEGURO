<?php
  
  include("phpfunctions.php");
$pdo = conexion();

$sql = "SELECT *  FROM vasegurobd.cat_hospitales WHERE tipodeServicio in('H','C') ORDER BY nombreClinicaHospital ASC";
$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();

echo "<option value=''>Seleccione Hospital</option>";
foreach ($lista as $milista) {
	
echo "<option>".$milista['nombreClinicaHospital']."</option>";
}
 
mysqli_close($pdo);

?>
