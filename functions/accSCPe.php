<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_POST['fechaIn'];
$fechaFin = $_POST['fechaFin'];


$sql="SELECT distinct idHos, nombreClinicaHospital FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.cat_hospitales HO
WHERE SA.idHos = HO.idHospital" ;
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSCPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td>
<td># De Solicitudes sin Carta</td>
</tr>
<tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td>";
        accSCHosPE($row['idHos'], $fechaIn, $fechaFin);
        echo "</tr>";
      }

echo "</table>";

mysqli_close($conexion);
?>