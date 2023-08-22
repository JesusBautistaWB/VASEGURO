<?php
 include("phpfunctions.php");
$estatus = $_POST['estatus'];
$fo = $_POST['fo'];

$A= "";

if($estatus == "TODOS"){

} else {
$A="AND SA.estadoSolicitud = '$estatus'";

}

$conexion = con();
		$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes ACC 
        WHERE SA.folioAccidenteServicio = ACC.FolioAccidente 
        AND SA.folioAccidenteServicio = '$fo'
        '$A'";
        
       echo " <table>
       <tr>
        <thead>
       <td>Folio Accidente</td>
       <td>Concepto</td>
       <td>Costo</td>
       <td>Comentario de Solicitante</td>
       <td>Estatus</td>
       <td>Hospital </td>
       <td>Medico Revisor</td>
       <td>FECHA SOLICITUD</td>
       <td>FECHA RESPUESTA</td>
       <td>REVISAR SOLICITUD</td>
       <td>DATOS</td>
       </thead>
   </tr>
       </table>";

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
           <td><b><?php echo $mostrar['folioAccidenteServicio'] ?></b></td> 
           <td><?php echo $mostrar['conceptoServicio'] ?></td>
          


           <td class=<?php
           
       if ($mostrar['costoServicio'] < 50000 ){
           echo 'pen';
       }

       elseif ($mostrar['costoServicio'] >= 50000 AND $mostrar['costoServicio'] < 100000){
           echo 'enhos';
       }
       
       elseif ($mostrar['costoServicio'] >= 100000){
           echo 'rec';
       }
       
           
           
           ?>
           
           
           ><b><?php echo "$".$mostrar['costoServicio'] ?></b></td>






           <td><?php echo $mostrar['comentarioAcc'] ?></td>


           <td class=<?php
           
           if ($mostrar['estadoSolicitud'] == 'APROBADA' ){
               echo 'ace';
           }
   
           else {
               echo 'rec';
           }
           
          
               
               
               ?>><?php echo $mostrar['estadoSolicitud'] ?></td>
          
           
           <td><b><?php echo $mostrar['hospitalOrigen'] ?></b></td>
           <td><b><?php echo $mostrar['medicoRevisor'] ?></b></td>


          <td> <b> <?php echo $mostrar['fechaSolicitud'] ?> </b> </td> 


<?php
if ($mostrar['fechaRespuesta'] == ''){
   echo '<td class="dup"> <b> EN ESPERA </b> </td>';
}else{
   echo '<td> <b>'.$mostrar['fechaRespuesta'].'</b> </td>';  
}
?>


          
           
           <td><a href ="revisarSolicitud.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">

           <button style="width: 75; font-size: 10px; background: darkblue;">REVISAR</button></a></td>
           <?php
                        
                        if ($mostrar['estadoSolicitud'] == 'APROBADA'){
                            if ($mostrar['estadoDatos'] == 'NO'){
                            ?>
                        
                            <td><a href ="revisarSolicitudDatosMed.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
                                    <button style="width: 75; font-size: 10px; background: darkred;">COMPLETAR</button></a></td>
                                    <?php
                            }else {
                                ?>
                        
                                <td><a href ="revisarSolicitudDatosMed.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
                                        <button style="width: 75; font-size: 10px; background: darkblue;">EDITAR</button></a></td>
                                        <?php
                        
                        
                                
                            }
                        }else{
                            ?>
                        
                        <td>EN ESPERA DE AUTORIZACION</td>
                        <?php
                        }
                        ?>

               

</tr>

 <?php
     

}


?>  

 