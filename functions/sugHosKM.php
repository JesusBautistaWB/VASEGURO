<?php
  
function conexion() { 
     return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}


$pdo = conexion();
$id= $_POST['id'];

$sql = "SELECT distancia, nombreClinicaHospital, telefonoHospital, calleHospital, 
horarioAtencion, delegacionesAledanasHospital, referenciasHospital
FROM vasegurobd.tb_geo_distancia GD, vasegurobd.cat_hospitales HO
WHERE HO.tipoDeServicio = 'H' AND GD.idEscuela = '$id' 
AND HO.idHospital = GD.idHospital
ORDER BY distancia 
ASC LIMIT 0,10 ";

$query = $pdo->prepare($sql); 

$query->execute();
$lista = $query->fetchAll();

echo '
<table> 
<tr >
<thead >
<td>DISTANCIA (KM)</td>
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
    <td ><b>'.$milista['distancia'].'</b> Km</td>
    <td ><b>'.$milista['nombreClinicaHospital'].'</b></td>
    <td >'.$milista['telefonoHospital'].'</td> 
    <td> '.$milista['calleHospital'].' </td>
    <td> '.$milista['horarioAtencion'].' </td>
    <td> '.$milista['delegacionesAledanasHospital'].' </td>
    <td> '.$milista['referenciasHospital'].' </td>
    

    <td><a href="https://www.google.com/maps/place/'.$milista['calleHospital'].' '.$milista['delegacionHospital'].'" target="maps" > IR </a></td>
    
    </tr></table>';
   

}
 ?>