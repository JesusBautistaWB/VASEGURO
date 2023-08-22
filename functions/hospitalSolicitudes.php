<?php
include("phpfunctions.php");
$conexion = con();  

$idHos = $_POST['idHos'];



echo "
<table>
<tr>
<thead>
<td colspan='9'><b> ACCIDENTES CON SOLICITUDES REGISTRADAS </b></td>


</thead>
</tr>
<tr>
<thead>
<td>Folio </td>
<td> Accidentado/a</td>
<td>Hospital</td>
<td>Monto Autorizado</td>
<td>TIEMPO DESDE ULTIMA SOLICITUD</td>
<td># de Solicitudes</td>
<td></td>



</thead>
</tr>";





$sql="SELECT DISTINCT SA.folioAccidenteServicio, AC.montoAuSol, AC.ultimaFechaSolicitud,
ACCI.PrimerApellidoA, ACCI.SegundoApellidoA, ACCI.NombreA, AC.idHospital, AC.idAcc
FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes AC, vasegurobd.tb_accidentado ACCI  
WHERE AC.FolioAccidente = SA.folioAccidenteServicio
AND AC.numHospital = '$idHos'
AND AC.FolioAccidentado = ACCI.FolioAccidentado
ORDER BY fechaSolicitud DESC";


$result=mysqli_query($conexion,$sql);





while($mostrar=mysqli_fetch_array($result)){
?>
<tr>
   
    <td><b><?php echo $mostrar['folioAccidenteServicio'] ?></b></td> 
    <td  ><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ?></td></td>
    <td><b><?php echo $mostrar['idHospital'] ?></b></td></td>

   <?php montoAprobado($mostrar['folioAccidenteServicio']); ?>

   <?php 
   
   ultimaFecha($mostrar['folioAccidenteServicio']);
  
   
   ?>

    

    <td><?php 
    $fa = $mostrar['folioAccidenteServicio'];
    numeroSolicitudes($fa); ?></td>
    
    <td><a href ="adminHosIn.php?foAcc=<?php echo $mostrar['folioAccidenteServicio']; ?>"> 
            <button style="width: 115; font-size: 10px; background: darkblue;">1 REVISAR SOLICITUDES</button></a></td> 
            
</tr>

<?php


}
echo "</table>";
mysqli_close($conexion);


?>  
 
 