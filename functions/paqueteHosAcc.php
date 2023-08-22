<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
  
$hospital= $_POST['palabra'];

$sql = "SELECT paqueteCosto, totalCosto, costo FROM vasegurobd.cat_costohospital WHERE nombreHospitalCosto = '$hospital' ORDER BY paqueteCosto ASC";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();
echo "<option value= '' ><b>SELECCIONE UN PAQUETE</b></option>";

foreach ($lista as $milista) {

    echo "
    
    <option><b>PAQUETE".$milista['paqueteCosto']." $(".$milista['costo'].")</b></option>";
   
}
echo "<option ><b>FUERA DE PAQUETE</b></option>";

 ?>
