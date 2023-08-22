<?php      
include("phpfunctions.php");
$palabra = $_REQUEST['palabra'];
$A ="";

if($palabra == ""){
    $A="";
}else{
    $A=" AND ACCT.idHospital = '$palabra' "; 
}


		$conexion = con();
		$sql="SELECT idAcc, ACCT.FolioAccidente,appPaRepor, appMaRepor, nombreRepor,telefonoReportante, descRepor, 
        fechaRepor, PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, FechaNacimientoA,
        poblacionAccidentado, EdadA, SexoA, ACT.Colonia,ACT.AlcaldiaMunicipio, ACT.idCP, idLugarAccidente, lugarAccIn,
        GradoEscolarA, regionPrincipal,
         nombreEscuela, calleEscuela, alcaldiaEscuela, ESC.colonia, cpescuela, CalleA,
         ACT.idCP, apRes, amRes, nombreRes, telFiRes,telCelRes, tipoDeEventoInicial,
         idHospital ,FechaNacimientoA, ACCT.idEstatus, diagnosticosAcc, procedimientosAcc,
         diagnosticosLista, fechaHoraAccidente, correoReportante, enunciadoLes, montosErogados,
         resultadosEncuesta, documentosFaltantes, observacionesQueja, reservaTecnica, montosErogadosRT,
         tipoDeAtencion, tipoDeCobertura, tipoDeTramite, quejaAccidente, comentarioAccidente, honorariosMedicos,
         montosErogadosHM, ACCT.folioSiniestro, dirEscRepor, notasAcc, estatusInterno, envioAcc, indigenaAcc, estadoCivil,
          dialectoAcc, dialectoAccEs, curpAcc, ACCT.correoEscuela, tipollamada, paqueteHosAcc, idTipoDeAccidente, tiempoGenerandoSiniestro
        FROM vasegurobd.tb_accidentado ACT , 
        vasegurobd.tb_accidentes ACCT, 
        vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC 
        WHERE ACCT.idEstatus = ES.idEstatus
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado 
        AND ACCT.idEscuela = ESC.idEscuela 
        AND fechaRepor BETWEEN CURDATE() - INTERVAL 30 DAY AND CURDATE()
        $A
        ORDER BY fechaRepor DESC;";
        
       $result=mysqli_query($conexion,$sql);
       $row_cnt = mysqli_num_rows($result);
  

        echo "<table>
        <tr>
        <thead>
       
           

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

		

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr >
            <td>
            <?php 
            if ($mostrar['idEstatus'] == "3" OR $mostrar['idEstatus'] == "11" OR $mostrar['idEstatus'] == "5" 
            OR $mostrar['idEstatus'] == "13" OR $mostrar['idEstatus'] == "6"  OR $mostrar['idEstatus'] == "7"  ){
               echo "<a href='detallesAccidente.php?idAcc=".$mostrar['idAcc']."' method= 'GET'>".$mostrar['FolioAccidente']."</a>";
            }  
            
            if ($mostrar['idEstatus'] == "4" OR $mostrar['idEstatus'] == "12"){
               echo "<a href='detallesAccidenteRE.php?idAcc=".$mostrar['idAcc']."' method= 'POST'>".$mostrar['FolioAccidente']."</a>";
            }  
            if ( $mostrar['idEstatus'] == "2" ){
                echo "<a href='detallesAccidenteRE.php?idAcc=".$mostrar['idAcc']."' method= 'POST'>".$mostrar['idAcc']."</a>";
             }  



            if ($mostrar['idEstatus'] == "1" ){
               echo "<a href='accHosAp.php?idAcc=".$mostrar['idAcc']."' method= 'POST'>".$mostrar['idAcc']."</a>";
            }
             if ($mostrar['idEstatus'] == "9" ){
               echo "<a href='llenarDatosPendientes.php?idAcc=".$mostrar['idAcc']."' method= 'GET'>".$mostrar['FolioAccidente']."</a>";
            }
            
            
                
               
        ?>
            
            </td>
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
                
                
                ?>'> <?php echo $mostrar['nombreEstatus'] ?></td>
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
            $nivel = $_REQUEST['nivel'];
            if($nivel == "4"){ ?>
            
            <td><a href='solicitarServicioAdicionalMed.php?idAcc=<?php echo $mostrar['idAcc']; ?>'>
            <button class='submitbtn' class='submitbtn' style='font-size: 10px; width:120; background: #38A456'  >NUEVO SERVICIO <b>+</b></button></a></td>

            <?php 
            } 
            if($nivel == "1"){ 
            ?>
<td>NO DISPONIBLE</td>

<?php } ?>
		</tr>






  <?php
      

}
echo "</table>";

?>
 