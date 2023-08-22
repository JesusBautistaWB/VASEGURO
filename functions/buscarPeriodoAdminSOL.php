<?php      
include("phpfunctions.php");
$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$folio = $_REQUEST['folio'];
$date2 = "";
if($fechaFin != ''){
$date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
}


		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql=" SELECT * FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes ACC 
        WHERE SA.folioAccidenteServicio = ACC.FolioAccidente
        AND SA.folioAccidenteServicio = '$folio'
        AND ACC.FolioAccidente = '$folio'
        AND fechaSolicitud BETWEEN '$fechaIn' AND '$date2' 
        ORDER BY fechaSolicitud DESC
        ;";
       
        

       $result=mysqli_query($conexion,$sql);
       $row_cnt = mysqli_num_rows($result);

    ?>


<table border="1" >



<tr>
<thead style = "background-color: darkblue; font-size: 9px;">
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



    <?php
		


		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
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
    </table>