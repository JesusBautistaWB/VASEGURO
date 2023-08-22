<?php
  

  include("phpfunctions.php");   
  $conexion = con();


$sql ="SELECT id_servicio, TIMEDIFF(fechaRespuesta,fechaSolicitud) AS DateDiff FROM vasegurobd.tab_serviciosadicionales WHERE TIMEDIFF(fechaRespuesta,fechaSolicitud) != ''";

$result=mysqli_query($conexion,$sql);

while($row=mysqli_fetch_array($result)){
        $tiempoAte = $row['DateDiff'];
        $id = $row['id_servicio'];
        
        $nues= "UPDATE vasegurobd.tab_serviciosadicionales SET tiempoAte = '$tiempoAte'  WHERE id_servicio ='$id'";
    
        $nue=mysqli_query($conexion,$nues); 
        

      }  
mysqli_close($conexion);

  ?>
