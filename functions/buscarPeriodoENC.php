<?php      
include("phpfunctions.php");
$usu = $_REQUEST['usu'];
$fechaIn = $_REQUEST['fechaIn'];
$fechaFin = $_REQUEST['fechaFin'];
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
     
    echo "

<table border='1' id='adminTable'>

<tr>
     <thead>
    
     <td><b>AGREGAR ARCHIVOS</b></td>
     <td>ESTATUS</td>
  <td>FOLIO</td>
    <td>APELLIDO PATERNO</td>
    <td>APELLIDO MATERNO</td>
    <td>NOMBRE(S)</td>
    <td>FECHA</td>
    
    
    </thead>
</tr>";

       
		while($mostrar=mysqli_fetch_array($result)){
         
		 ?>

		<tr >
      <td><a href="modificarENC.php?idAcc=<?php echo $mostrar['idAcc'] ?>" ><img src='../images/upload.png' height='40'  width='40' ></a></td>
     

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
                
                
                ?>'><?php 
                
                    echo $mostrar['nombreEstatus'];

                ?></td>
        
       
        <td class="ace"><?php echo $mostrar['FolioAccidente'] ?></td>
            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
            <td><?php echo $mostrar['SegundoApellidoA'] ?></td>
            <td><?php echo $mostrar['NombreA'] ?></td>
            <td><?php echo $mostrar['FechaNacimientoA'] ?></td>
            
            
		</tr>
        
	<?php 

	}
    echo "</table>";
	 ?>
   