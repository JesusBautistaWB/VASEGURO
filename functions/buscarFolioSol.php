<?php      
include("phpfunctions.php");
$palabra = $_REQUEST['palabra'];
$A ="";

if($palabra == ""){
    $A="";
}else{
    $A=" AND folioAccidenteServicio LIKE '$palabra%' "; 
}


		$conexion = con();
		$sql="SELECT DISTINCT SA.folioAccidenteServicio, AC.montoAuSol, AC.ultimaFechaSolicitud,
        ACCI.PrimerApellidoA, ACCI.SegundoApellidoA, ACCI.NombreA, AC.idHospital, AC.idAcc, folioSiniestro
        FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes AC, vasegurobd.tb_accidentado ACCI  
        WHERE AC.FolioAccidente = SA.folioAccidenteServicio
        AND AC.FolioAccidentado = ACCI.FolioAccidentado $A
        ORDER BY fechaSolicitud DESC";
    
		$result=mysqli_query($conexion,$sql);




        
       $result=mysqli_query($conexion,$sql);
       $row_cnt = mysqli_num_rows($result);

    ?>


<table border="1" >

<tr>
        <thead>
       <td colspan="9"><b> ACCIDENTES CON SOLICITUDES REGISTRADAS </b></td>
       
       
       </thead>
   </tr>
        <tr>
        <thead>
       <td>Folio </td>
       <td> Accidentado/a</td>
       <td>Hospital</td>
       <td>Monto Autorizado</td>
    <td>Fecha de Ultima Solicitud</td>
       <td><b>COMPLETAR DATOS</b></td>
       
       <td># Solicitudes</td>
       <td>Detalles Accidente</td>
     
       
       </thead>
   </tr>





    <?php
		


		while($mostrar=mysqli_fetch_array($result)){
		 ?>
<tr>
<td class="ace"><?php echo $mostrar['folioAccidenteServicio'] ?></td> 
            <td  ><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ?></td></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td></td>
            

            <?php montoAprobado($mostrar['folioAccidenteServicio']); ?>

<?php ultimaFecha($mostrar['folioAccidenteServicio']); ?>


    <td><a href ="adminAuxMed.php?idAcc=<?php echo $mostrar['folioAccidenteServicio']; ?>"> 
    
            <button style="width: 115; font-size: 10px; background: darkblue;">1 REVISAR SOLICITUDES</button></a></td>
            <td><?php 
            $fa = $mostrar['folioAccidenteServicio'];
            numeroSolicitudes($fa); ?></td>
            <td><a href ="detallesAccidenteMedAux.php?idAcc=<?php echo $mostrar['idAcc']?>">
            VER
            </a></td>
            
   
       </tr>

	<?php 
	}
	 ?>
    </table>