<?php
  

$fecha = $_POST['fecha'];


$from = new DateTime($fecha);
$to   = new DateTime('today');
$edad= $from->diff($to)->y;

echo $edad;
 
?>