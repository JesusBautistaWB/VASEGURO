<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$hospital= $_POST['hospital'];

$sql = "SELECT *  FROM vasegurobd.cat_hospitales WHERE nombreClinicaHospital = '$hospital' ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {

echo '<frame  src="https://www.google.com/maps/place/'.$milista['calleHospital'].' '.$milista['delegacionHospiptal'].'" height="300" width="900" frameborder="0" style="border:0" allowfullscreen></frame>';
   

}
mysqli_close($pdo);
 ?>