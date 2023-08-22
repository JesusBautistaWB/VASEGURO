<?php
  
include("phpfunctions.php");
  
$conexion = con();
$sql = $_POST['sql'];
$accidentado = $_POST['accidentado'];

$result=mysqli_query($conexion,$sql);
$result=mysqli_query($conexion,$accidentado);

mysqli_close($conexion);


 
?>