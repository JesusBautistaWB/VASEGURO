<?php      
include("phpfunctions.php");

?>
<table border="1" id="adminTable" name="adminTable">
    <tr>
        <thead>
       <td colspan="9"><b> ACCIDENTES CON SOLICITUDES PENDIENTES </b></td>
       
       
       </thead>
   </tr>
        <tr>
        <thead>
       <td>Folio </td>
       <td> Accidentado/a</td>
       <td>Hospital</td>
       <td>Monto Autorizado</td>
       <td>TIEMPO DESDE ULTIMA SOLICITUD</td>
       <td><b>COMPLETAR DATOS</b></td>
       <td>SOLICITAR</td>
       <td># Solicitudes</td>
       <td>Detalles Accidente</td>
     
       
       </thead>
   </tr>

    <?php

        $conexion = con();




		$sql="SELECT DISTINCT SA.folioAccidenteServicio, AC.montoAuSol, AC.ultimaFechaSolicitud,
        ACCI.PrimerApellidoA, ACCI.SegundoApellidoA, ACCI.NombreA, AC.idHospital, AC.idAcc, folioSiniestro
        FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes AC, vasegurobd.tb_accidentado ACCI  
        WHERE AC.FolioAccidente = SA.folioAccidenteServicio
        AND AC.FolioAccidentado = ACCI.FolioAccidentado
        AND SA.estadoSolicitud = 'NUEVA'
        ORDER BY fechaSolicitud DESC";
        
		$result=mysqli_query($conexion,$sql);





  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td><b><?php echo $mostrar['folioAccidenteServicio'] ?></b></td> 
            <td  ><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ?></td></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td></td>

           <?php montoAprobado($mostrar['folioAccidenteServicio']); ?>

           <?php 
           
           ultimaFecha($mostrar['folioAccidenteServicio']);
          
           
           ?>

            
    <td><a href ="adminMedicos.php?foAcc=<?php echo $mostrar['folioAccidenteServicio']; ?>"> 
            <button style="width: 115; font-size: 10px; background: darkblue;">1 REVISAR SOLICITUDES</button></a></td>
         <td><a href='solicitarServicioAdicionalMed.php?idAcc=<?php echo $mostrar['idAcc']; ?>'><button class='submitbtn' style='font-size: 10px'>2 SOLICITAR SERVICIO</button></a></td>
            
            <td><?php 
            $fa = $mostrar['folioAccidenteServicio'];
            numeroSolicitudesP($fa); ?></td>
            <td><a href ="detallesAccidenteMed.php?idAcc=<?php echo $mostrar['idAcc']?>">
            VER
            </a></td>
            	
		</tr>

  <?php
      

}
mysqli_close($conexion);


?>  
		
           </table>