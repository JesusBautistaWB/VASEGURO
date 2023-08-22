<?php      
include("phpfunctions.php");
$conexion = con();

$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];

$sql="SELECT DISTINCT usuarioQueModifica, nombre FROM vasegurobd.tb_historialcambios C, vasegurobd.tb_usuarios U
WHERE C.usuarioQueModifica = U.login";
$result=mysqli_query($conexion,$sql);    


echo "
<table id='camUs' style='border-collapse: separate; margin: 15px;
padding: 5px;'><thead><tr>
<td>USUARIO</td>
<td># DE CAMBIOS</td>
</tr>
<tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
</thead>";

while($row=mysqli_fetch_array($result)){
        echo "<tr><td>".$row['nombre']."</td>";
       camUsPE($row['usuarioQueModifica'], $fechaIn, $fechaFin);
        echo "</tr>";
      }

echo "</table>";

mysqli_close($conexion);
?>