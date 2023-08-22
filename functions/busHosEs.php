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


 $sql="SELECT idHospital, nombreClinicaHospital FROM vasegurobd.cat_hospitales";
 $result=mysqli_query($conexion,$sql);    
 

 echo "
 <table id='hosEs' style='border-collapse: separate; margin: 15px;
 padding: 5px;'><thead>
 <tr>
 <td>HOSPITAL</td>
 <td>ACCIDENTES</td>
 </tr>
 <tr><td colspan='2'> PERIODO <b>$fechaIn - $fechaFin</b> </td></tr>
 </thead>";

 while($row=mysqli_fetch_array($result)){
         echo "<tr><td>".$row['nombreClinicaHospital']."</td>";
         esPeHos($row['idHospital'], $fechaIn, $fechaFin);
         //esHos($row['idHospital']);
         echo "</tr>";
       }

 echo "</table>";

 mysqli_close($conexion);
	 ?>
    