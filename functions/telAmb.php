<?php
  
  include("phpfunctions.php");
  $pdo = conexion();

$ambulancia = $_POST['ambulancia'];
$sql = "SELECT * FROM vasegurobd.cat_hospitales WHERE nombreClinicaHospital = '$ambulancia'";

$query = $pdo->prepare($sql); 
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {
	
    echo "CONTACTO AMBULANCIA: <label style='color: black;'>".$milista['telefonoHospital']."</label>";
}

mysqli_close($pdo);
?>
 