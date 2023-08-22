<?php

$estatus = $_POST['estatus'];
$fo = $_POST['fo'];

$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT * FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes ACC 
        WHERE SA.folioAccidenteServicio = ACC.FolioAccidente 
        AND SA.folioAccidenteServicio = '$fo'
        AND SA.estadoSolicitud = '$estatus'";

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
         
           
        <td> ESTADO DATOS </td>
           <td><b>COMPLETAR DATOS</b></td>
         
           
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
            <td><b><?php echo $mostrar['estadoSolicitud'] ?></b></td>
           
			
			<td><?php echo $mostrar['hospitalOrigen'] ?></td>
            <td><?php echo $mostrar['medicoRevisor'] ?></td>


           <td> <b> <?php echo $mostrar['fechaSolicitud'] ?> </b> </td> 


<?php
if ($mostrar['fechaRespuesta'] == ''){
    echo '<td class="rec">  EN ESPERA  </td>';
}else{
    echo '<td class="ace"> '.$mostrar['fechaRespuesta'].'</td>';  
}

if ($mostrar['estadoDatos'] == 'SI'){
    echo '<td class="ace">  COMPLETOS </td>';
}else{
    echo '<td class="rec">PENDIENTES</td>';  
}



            
if ($mostrar['estadoSolicitud'] == 'APROBADA'){
    if ($mostrar['estadoDatos'] == 'NO'){
    ?>

    <td><a href ="revisarSolicitudDatosAux.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
            <button style="width: 75; font-size: 10px; background: darkred;">COMPLETAR</button></a></td>
            <?php
    }else {
        ?>

        <td><a href ="revisarSolicitudDatosAux.php?idAcc=<?php echo $mostrar['idAcc']."&&idSA=".$mostrar['id_servicio']; ?>">
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


 