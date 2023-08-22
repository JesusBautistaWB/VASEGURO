<?php
include("phpfunctions.php");
$pdo = conexion();
$alcaldia= $_POST['alcaldia'];

$sql = "SELECT *  FROM vasegurobd.cat_hospitales WHERE delegacionHospital = '$alcaldia' AND tipodeServicio in('H','C') ORDER by nombreClinicaHospital ASC";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '
<table> 
<tr>
<thead>
<td>HOSPITAL</td>
<td>TELEFONO</td>
<td>DIRECCION</td>
<td>HORARIO</td>
<td>DELEGACIONES CERCANAS</td>
<td>REFERENCIAS</td>
<td></td>
</thead>
</tr><table>';


foreach ($lista as $milista) {

    echo '<tr>
    <td ><b>'.$milista['nombreClinicaHospital'].'</b></td>
    <td >'.$milista['telefonoHospital'].'</td> 
    <td> '.$milista['calleHospital'].' </td>
    <td> '.$milista['horarioAtencion'].' </td>
    <td> '.$milista['delegacionesAledanasHospital'].' </td>
    <td> '.$milista['referenciasHospital'].' </td>
    

    <td><a href="https://www.google.com/maps/place/'.$milista['calleHospital'].' '.$milista['delegacionHospiptal'].'" target="maps" > IR </a></td>
    
    </tr></table>';
   

}

mysqli_close($pdo);
 ?>