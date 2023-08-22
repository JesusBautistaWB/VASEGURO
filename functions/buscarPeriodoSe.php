<?php
include("phpfunctions.php");
$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
$nivel = $_REQUEST['nivel'];

$date2 = "";
if($fechaFin != ''){
    $date2 = date("Y-m-d", strtotime($fechaFin.'+ 1 days'));
    }

$conexion = con();
$sql="SELECT idAcc, ACCT.FolioAccidente,appPaRepor, appMaRepor, nombreRepor,telefonoReportante, descRepor, fechaRepor, 
PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, FechaNacimientoA, poblacionAccidentado, EdadA, SexoA, 
ACT.Colonia,ACT.AlcaldiaMunicipio, ACT.idCP, idLugarAccidente, lugarAccIn, GradoEscolarA, regionPrincipal, 
nombreEscuela, calleEscuela, alcaldiaEscuela, ESC.colonia, cpescuela, CalleA, ACT.idCP, apRes, amRes, nombreRes, 
telFiRes,telCelRes, tipoDeEventoInicial, idHospital ,FechaNacimientoA, ACCT.idEstatus, diagnosticosAcc, procedimientosAcc, 
diagnosticosLista, fechaHoraAccidente, correoReportante, enunciadoLes, montosErogados, resultadosEncuesta, documentosFaltantes, 
observacionesQueja, reservaTecnica, montosErogadosRT, tiempoGenerandoSiniestro, tipoDeAtencion, tipoDeCobertura, tipoDeTramite,
 quejaAccidente, comentarioAccidente, honorariosMedicos, fechaEgreso, montosErogadosHM, folioSiniestro, dirEscRepor, notasAcc,
 estatusInterno, envioAcc, indigenaAcc,estadoCivil, dialectoAcc, dialectoAccEs, curpAcc, ACCT.correoEscuela, ACCT.tipoLlamada, 
 paqueteHosAcc, idTipoDeAccidente, paquetePrecio, paquetePrecioIVA 
 FROM vasegurobd.tb_accidentado ACT, vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC 
 WHERE ACCT.idEstatus = ES.idEstatus AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela 
 AND fechaRepor BETWEEN '$fechaIn' AND '$date2' ORDER By fechaRepor DESC";

// echo $sql;

$result=mysqli_query($conexion,$sql);
$row_cnt = mysqli_num_rows($result);
?>
<table border="1">
    <tr>
        <td colspan="15" style = "background-color: #96c3d8; color: darkblue;" id="adminTable">
<?php echo "<b>".$row_cnt."</b> Accidentes registrados entre el periodo: <b>".$fechaIn." a ".$fechaFin."</b>"; ?>
</td>
</tr>
</table>
<?php

        
        echo "<table id='adminTable' border='1'>
        <tr>
        <thead style = 'background-color: darkblue; font-size: 9px;'>
            <td>FOLIO DE APROBACION </td>
            <td>FECHA ACCIDENTE</td>
            <td>FECHA REPORTE</td>
            <td>ESTATUS</td>
			<td>APELLIDO PATERNO ACCIDENTADO/A</td>
			<td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			<td>ESCUELA DE PROCEDENCIA</td>
            <td>HOSPITAL</td>
            <td>EXPORTAR</td>
            <td> SERVICIO ADICIONAL</td>
       </thead>
   </tr>";

/// INICIO DE LOOP
while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr> 
        <td><?php  echo "<a href='detallesAccidente.php?idAcc=".$mostrar['idAcc']."&&n=".$nivel."' method= 'GET'>".$mostrar['FolioAccidente']."</a>";  ?></td>
            <td><?php echo $mostrar['fechaHoraAccidente'] ?></td> 
            <td><?php echo $mostrar['fechaRepor'] ?></td>
             <td class='<?php 
              if ($mostrar['idEstatus'] =="12"){ echo "rec"; }
              if ($mostrar['idEstatus'] =="11"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="2"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="4"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="5"){ echo "enhos"; } 
              if ($mostrar['idEstatus'] =="3"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="1"){ echo "nuevo"; } 
              if ($mostrar['idEstatus'] =="9"){ echo "pen"; }
              if ($mostrar['idEstatus'] =="6"){ echo "egr"; }
              if ($mostrar['idEstatus'] =="13"){ echo "penrev"; }
              if ($mostrar['idEstatus'] =="7"){ echo "fin"; }
                ?>'> 
            
            <?php echo $mostrar['nombreEstatus'] ?></td>

            <td><b><?php echo $mostrar['PrimerApellidoA'] ?></b></td>
            <td><b><?php echo $mostrar['SegundoApellidoA'] ?></b></td>
            <td><b><?php 
                    
                    if($mostrar['NombreA'] == ""){
                        echo $mostrar['nombreUrgAmb'];
                    }else{
                     echo $mostrar['NombreA'];   
                    }
                    
                
                ?></b></td>
			
			<td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['idHospital'] ?></td>
            <td> 
               <?php if(($mostrar['FolioAccidente']) == "" 
               OR $mostrar['idEstatus'] =="9" 
               OR $mostrar['idEstatus'] =="4"
               OR $mostrar['idEstatus'] =="2"
               OR $mostrar['idEstatus'] =="12"
               ){
                  echo "NO DISPONIBLE";
            }else{
                if(($mostrar['envioAcc']) == "ENVIADO" ){
                 echo "<b>DESCARGA NO DISPONIBLE PARA ACCIDENTES YA ENVIADOS</b>" ;  

                }else{


                  echo "<a href='pdfdetailsAcc.php?idAcc=".$mostrar['idAcc']."' method='get' target='_blank'>Generar PDF</a>";
                }
            }
                
                ?> 

            </td>	

            <?php
            
            if($nivel == "4" || $nivel == "5"){ ?>
            
            <td><a href='solicitarServicioAdicionalMed.php?idAcc=<?php echo $mostrar['idAcc']; ?>'>
            <button class='submitbtn' class='submitbtn' style='font-size: 10px; width:120; background: #38A456'  >NUEVO SERVICIO <b>+</b></button></a></td>

            <?php 
            } elseif($nivel == "1"){ 
            ?>
            <td>NO DISPONIBLE</td>

            <?php } ?>
            </tr>


  <?php
      

}

echo "</table>";

////FIN DE LOOP
      

?>
 