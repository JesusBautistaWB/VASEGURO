<?php
  
  include("phpfunctions.php");
  $pdo = conexion();
$palabra= $_POST['palabra'];

$sql = "SELECT * FROM vasegurobd.cat_regiondelcuerpoafectada WHERE nombreRDCA = '$palabra' ";

$query = $pdo->prepare($sql); 
$reg="";
$query->execute();
$lista = $query->fetchAll();
foreach ($lista as $milista) {

$reg=$milista['regiones']; 

}

$regiones = explode(",",$reg);

foreach ($regiones as $row){
echo '<option>'.$row.'</option>';
}

 ?>