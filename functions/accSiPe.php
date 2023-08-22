<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$sql="SELECT idHospital, nombreClinicaHospital FROM vasegurobd.cat_hospitales";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='accSiPE' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>HOSPITAL</td><td>ACCIDENTES</td></thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombreClinicaHospital']."</td><td>";
        accSiHosPE($row['idHospital'], $fechaIn, $fechaFin);
        echo "</td></tr>";
      }

echo "</table>";

mysqli_close($conexion);
?>