<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$keyword = utf8_encode($_POST['hos']);
$sql = "SELECT * FROM vasegurobd.cat_hospitales WHERE nombreClinicaHospital = ''$keyword' Limit 0,1 ";
$query = $pdo->prepare($sql);
$query->execute();
$lista = $query->fetchAll();
  echo $sql;
foreach ($lista as $milista) {
	echo "<label>DETALLES </label>";
    echo "<br>Direccion: ".$milista['calleHospital'];
    echo "<br>Telefono:".$milista['telefonoHospital'];
     echo "<br><a href='https://www.google.com/maps/place/".$milista['delegacionHospiptal']." ".$milista['calleHospital']."' target='maps'>¿COMO LLEGAR?</a>"; 
    
}
 
?>