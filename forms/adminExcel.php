<html >
<head>
<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
<script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>


    <script type="text/javascript">     
          if((localStorage.getItem('sessionValue') == ""  || localStorage.getItem('nivel') != "4" )){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        } if(localStorage.getItem('nivel') == "4" ) {
            alert("DESCARGANDO");  
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        }
    </script>      
</head>
  
                
 
      
       <div id="div1">
       <?php 

$time = time();
$fechaHoy = date('Y-m-d', $time);
$hora = date("H-i-s", $time);
$fechaID = $fechaHoy." ".$hora;
$fechaName = str_replace("-", "", $fechaHoy);
header("Pragma: public");
header("Expires: 0");
$filename = "tablaAdmin$fechaName.xls";
header("Content-type: application/x-msdownload");
header("Content-Disposition: attachment; filename=$filename");
header("Pragma: no-cache");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");


?>
	<table border="1">

		<tr>
        <thead style = "background-color: darkblue; font-size: 9px;">
        
        <td style = "background-color: #32275a;" colspan = "5"></td>
        <td colspan = "3"><b>NOMBRE DE QUIEN REPORTA</b></td>
        <td colspan = "2"><b>DEL CONTACTO DE LA PERSONA  QUE REPORTA</b></td>
        <td style = "background-color: #32275a;" colspan = "9"></td>
        <td colspan = "3"><b>NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</b></td>
        <td colspan = "4"></td>
        <td style = "background-color: #32275a;" colspan = "5"><b>DATOS ESCUELA</b></td>
        <td colspan = "4"></td>
        <td style = "background-color: #32275a;" colspan = "5"><b>DATOS DE QUIEN REPORTA</b></td>
        <td colspan = "25"></td>
    
    
    </thead>
		</tr>
		<tr>
		     <thead>
            
             <td>NO. DE REPORTE</td>
            <td>NO. DE SINIESTRO</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
            <td>NOMBRE(S)</td>
			<td>CORREO ELECTRONICO</td>
			<td>TELEFONO</td>
            <td></td>
             <td></td>
             <td></td>
			<td>DESCRIPCION DEL SINIESTRO</td>
            <td></td>
             <td></td>
             <td></td>
			<td>FECHA REPORTE</td>
            <td>HORA  REPORTE</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
            <td>TIPO DE POBLACION</td>
            <td>EDAD</td>
            <td>SEXO</td>
            <td>GRADO ESCOLAR</td>
            <td>NOMBRE DE LA ESCUELA</td>
            <td>CALLE Y NUMERO</td>
            <td>ALCALDIA</td>
            <td>COLONIA</td>
            <td>C.P.</td>
            <td>CALLE Y NUMERO</td>
            <td>COLONIA</td>
            <td>ALCALDIA</td>
            <td>C.P.</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			<td>TELEFONO(FIJO)</td>
            <td>TELEFONO (CEL)</td>
            <td>REGION DEL CUERPO</td>
            <td>HOSPITAL</td>
            <td>DIAGNOSTICO</td>
            <td>TIPO DE ACCIDENTE</td>
            <td>MONTOS EROGADOS</td>
            <td>RESULTADO ENCUENTA</td>
            <td>DOCUMENTOS FALTANTES</td>
            <td>OBSERVACIONES</td>
            <td>FECHA DE NACIMIENTO</td>
            <td>CIE 10</td>
            <td>CPT</td>
            <td>FECHA DE EGRESO</td>
            <td>FECHA DE ACCIDENTE</td>
            <td>HORA ACCIDENTE</td>
            <td style = "font-size: 9px;">LUGAR DONDE OCURRIO EL ACCIDENTE</td>
            <td>RESERVA TECNICA</td>
            <td>MONTO EROGADOS</td>
            <td>HONORARIOS MEDICOS</td>
            <td>MONTO EROGADO</td>
            <td>TIPO DE ATENCION</td>
            <td>TIPO DE COBERTURA </td>
            <td>TIPO DE TRAMITE</td>
            <td>QUEJA</td>
            <td>COMENTARIO</td>
            <td>SINIESTRO</td>
           
                
			
			</thead>
		</tr>
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT idAcc, ACCT.FolioAccidente,appPaRepor, appMaRepor, nombreRepor,telefonoReportante, descRepor, 
        fechaRepor, PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus,
        poblacionAccidentado, EdadA, SexoA, 
        GradoEscolarA,
         nombreEscuela, calleEscuela, alcaldiaEscuela, ESC.colonia, cpescuela, CalleA,
         ACT.idCP, apRes, amRes, nombreRes, telFiRes,telCelRes,
         idHospital ,FechaNacimientoA, ACCT.idEstatus,
         
        fechaHoraAccidente, correoReportante, enunciadoLes
        FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, 
        vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
         
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela  ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
      
        <td></td>
         
        <?php 
              if ($mostrar['FolioAccidente'] ==""){ echo "<td class='rec'><b>NO DISPONIBLE</b> </td>";
             }else{ echo "<td  class='ace' ><b>".$mostrar['FolioAccidente']."</b> </td>";
             }
              
                
                
                ?>
        
        
        
        <td><?php echo $mostrar['appPaRepor'] ?></td>
        <td><?php echo $mostrar['appMaRepor'] ?></td>
        <td><?php echo $mostrar['nombreRepor'] ?></td>
        <td><b><?php echo $mostrar['correoReportante'] ?></b></td>
        <td><?php echo $mostrar['telefonoReportante'] ?></td>
        <td colspan = "7"><?php echo $mostrar['enunciadoLes'] ?></td>
            <td><?php 
            $times = explode(" ",  $mostrar['fechaRepor'] );
            echo $times[0];
           ?></td> 
            <td><?php echo $times[1]; ?></td>

            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
            <td><?php echo $mostrar['SegundoApellidoA'] ?></td>
            <td><?php echo $mostrar['NombreA'] ?></td>
            <td><?php echo $mostrar['poblacionAccidentado'] ?></td>
            <td><?php echo $mostrar['EdadA'] ?></td>
            <td><?php echo $mostrar['SexoA'] ?></td>
            <td><?php echo $mostrar['GradoEscolarA'] ?></td>
            <td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['calleEscuela'] ?></td>
            <td><?php echo $mostrar['alcaldiaEscuela'] ?></td>
            <td><?php echo $mostrar['colonia'] ?></td>
            <td><?php echo $mostrar['cpescuela'] ?></td>
            <td><?php echo $mostrar['CalleA'] ?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $mostrar['apRes'] ?></td>
            <td><?php echo $mostrar['amRes'] ?></td>
            <td><?php echo $mostrar['nombreRes'] ?></td>
            <td><?php echo $mostrar['telFiRes'] ?></td>
            <td><?php echo $mostrar['telCelRes'] ?></td>
            <td><b>......</b></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b><?php echo $mostrar['FechaNacimientoA'] ?></b></td>
            <td><b><a href= ''>VER DIAGNOSTICOS</a></b></td>
            <td><b><a href= ''>VER PROCEDIMIENTOS</a></b></td>
            <td><b><?php echo $mostrar['fechaEgreso'] ?></b></td>
            <td><b><?php 
            $time = explode(" ",  $mostrar['fechaHoraAccidente'] );
            echo $time[0];
           ?></b></td>
            <td><b><?php echo $time[1];  ?></b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td><b>......</b></td>
            
            <td><b>......</b></td>
            <td><b>......</b></td>
            <td ><b><a href= ''>VER LESIONES</a></b></td>
            
		</tr>
        
	<?php 
	}
	 ?>
   
            
    
           </table>
 
     

  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
