<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$sql="SELECT distinct idHos, nombreClinicaHospital FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.cat_hospitales HO
WHERE SA.idHos = HO.idHospital";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSolEsPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td>
<td>NUEVA</td>
<td>APROBADA</td>
<td>MAS INFORMACION</td>
<td>RECHAZADA</td>
<td>APROBADA PARCIALMENTE</td>
</tr>
<tr><td colspan='6'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td>";
        accSAHosP($row['idHos'],'NUEVA',$fechaIn,$fechaFin);
        accSAHosP($row['idHos'],'APROBADA',$fechaIn,$fechaFin);
        accSAHosP($row['idHos'],'SE NECESITA MAS INFORMACION',$fechaIn,$fechaFin);
        accSAHosP($row['idHos'],'RECHAZADA',$fechaIn,$fechaFin);
        accSAHosP($row['idHos'],'APROBADA PARCIALMENTE',$fechaIn,$fechaFin);
        echo "</tr>";
      }

echo "</table>";

mysqli_close($conexion);
?>