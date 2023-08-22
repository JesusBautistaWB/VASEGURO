<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$sql="SELECT distinct  subsecuencia FROM vasegurobd.tab_serviciosadicionales WHERE subsecuencia != ''";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='subPe' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>SUBSECUENCIA</td>
<td>#</td>
</tr>
<tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['subsecuencia']."</td>";
        subConPe($row['subsecuencia'], $fechaIn, $fechaFin);
        echo "</tr>";
      }

echo "</table>";

mysqli_close($conexion);
?>