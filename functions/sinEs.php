<?php   
include("phpfunctions.php");   
 $conexion = con();
 ini_set('display_errors', 1);


 $fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}


 $sql="SELECT DISTINCT usuarioQueCambia FROM vasegurobd.tb_historialfoliosiniestro";
 $result=mysqli_query($conexion,$sql);    
 

 echo "
 <table id='sinEs' style='border-collapse: separate; margin: 15px;
 padding: 5px;'><thead><tr>
 <td>USUARIO</td>
 <td>SINIESTROS</td>
 <tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
 </thead>";

 while($row=mysqli_fetch_array($result)){
         echo "<tr><td>".$row['usuarioQueCambia']."</td>";
         esPeSi($row['usuarioQueCambia'], $fechaIn, $fechaFin);
         //esSi($row['usuarioQueCambia']);
         echo "</tr>";
       }

 echo "</table>";

 mysqli_close($conexion);
 
	 ?>
    