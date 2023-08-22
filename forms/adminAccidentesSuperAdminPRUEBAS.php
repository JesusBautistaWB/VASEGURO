<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>ADMIN VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" charset="UTF-8" src="xyz.js"></script>
    
    <script type="text/javascript">     
          if((localStorage.getItem('sessionValue') == ""  || localStorage.getItem('nivel') != "4" )){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        }
    </script>     
    
</head>
  
<body>
    <div class="header">
    <center>         
       <?php 
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br>
        <span class='titleHeader'>   AVISO DE ACCIDENTE | ADMINISTRADOR </span>";  
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background: black; ">
                <div class="col-3">
          <label>
          <input  class="ace" name="idUsuario" id="idUsuario" readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input class="ace" id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input class="ace" placeholder="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      </div>

      <div class="col-1">
      
              <label><input readonly style="background: #088BB9; font-size: 11px; color: white;"
      value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE QUE REQUIERA:">
          
          <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolio()"
          name="folioBus" id="folioBus" style="background: white; color: black;">
       
          </label>
      </div>


      <div class="col-2">
      
      <label> <input readonly style="background: #088BB9; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodo()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #05769d; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodo()">

  </label>
</div>



 
      
       <div id="div1">
   
	<table border="1" id="adminTable">

		<tr>
        <thead style = "background-color: darkblue; font-size: 9px;">
        
        <td style = "background-color: #c6e0b4;" colspan = "7"></td>
        <td colspan = "3">NOMBRE DE QUIEN REPORTA</td>
        <td colspan = "2">DEL CONTACTO DE LA PERSONA  QUE REPORTA</td>
        <td style = "background-color: #c6e0b4;" colspan = "3"></td>
        <td colspan = "3">NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</td>
        <td style = "background-color: #c6e0b4;" colspan = "4"></td>
        <td colspan = "4">DOMICILIO COMPLETO DEL ACCIDENTADO</td>
        
        <td  colspan = "3">ETNIA</td>
        <td style = "background-color: #c6e0b4;" ></td>
        <td  colspan = "3">NOMBRE COMPLETO DEL PADRE, MADRE O TUTOR RESPONSABLE DEL ACCIDENTADO</td>
        <td  colspan = "2">TELÉFONOS DE LOCALIZACIÓN DE LA PERSONA ACCIDENTADA</td>
        <td style = "background-color: #c6e0b4;" colspan = "3"></td>
        <td  colspan = "4">DOMICILIO COMPLETO DE LA ESCUELA</td>
        <td style = "background-color: #c6e0b4;" colspan = "50"></td>
    
    
    </thead>
		</tr>
		<tr>
		     <thead>
             <td><b>ELIMINAR</b></td>
             <td><b>EDITAR</b></td>
             <td>ESTATUS</td>
             <td>ESTATUS INTERNO</td>
             <td>ENVIO</td>
             <td>NO. DE REPORTE</td>
            <td>NO. DE SINIESTRO</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
            <td>NOMBRE(S)</td>
			<td>CORREO ELECTRONICO</td>
			<td>TELEFONO</td>

			<td>DESCRIPCION DEL SINIESTRO</td>            
        
			<td>FECHA REPORTE</td>
            <td>HORA  REPORTE</td>
            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
            <td>FECHA DE NACIMIENTO</td>
           
            <td>EDAD</td>
            <td>SEXO</td>
            <td>TIPO DE POBLACION</td>
           
            <td>CALLE Y NUMERO</td>
            <td>COLONIA</td>
            <td>ALCALDIA</td>
            <td>C.P.</td>

           
           
            <td>DE ACUERDO A SU CULTURA ¿SE CONSIDERA INDÍGENA?</td>
            <td>¿HABLA ALGUNA LENGUA INDÍGENA?</td>
            <td>¿QUE LENGUA INDÍGENA HABLA?</td>
            <td>CURP</td>

            <td>APELLIDO PATERNO</td>
            <td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			<td>TELEFONO(FIJO)</td>
            <td>TELEFONO (CEL)</td>

            <td>TIPO DE COBERTURA </td>
            <td>GRADO ESCOLAR</td>

            <td>NOMBRE DE LA ESCUELA</td>
            <td>CALLE Y NUMERO</td>
            
            <td>COLONIA</td>
            <td>ALCALDIA</td>
            <td>C.P.</td>
            <td>TELEFONO DE LA ESCUELA</td>

            <td>REGION DEL CUERPO</td>
            <td>DIAGNOSTICO</td>
            <td>HOSPITAL AL CUAL FUE CANALIZADO</td>
            
         
           
            <td>TIPO DE ACCIDENTE</td>

            <td>RESULTADO ENCUESTA</td>
            <td>DOCUMENTOS FALTANTES</td>
            <td>OBSERVACIONES</td> 
            <td>CIE 10</td>
            
            <td>CPT</td>
            <td>FECHA DE ALTA</td>
            <td>FECHA DE ACCIDENTE</td>
            <td>HORA ACCIDENTE</td>


       
           
         
           
           
           
        
            <td style = "font-size: 9px;">LUGAR DONDE OCURRIO EL ACCIDENTE</td>
            <td>RESERVA TECNICA</td>
            
            <td>MONTOS EROGADOS</td>
           
            <td>MONTO EROGADOS</td>
            <td>HONORARIOS MEDICOS</td>
            <td>MONTO EROGADO</td>


            <td>TIPO DE ATENCION</td>
            
            <td>TIPO DE TRAMITE</td>
            <td>QUEJA</td>
            <td>COMENTARIO</td>
            <td>NOTAS</td>
            <td>TIPO DE LLAMADA</td>
            <td>PAQUETE</td>
                
			
			</thead>
		</tr>
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
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
         montosErogadosHM, folioSiniestro, dirEscRepor, notasAcc, estatusInterno, envioAcc, indigenaAcc,
          dialectoAcc, dialectoAccEs, curpAcc, folioSiniestro, ACCT.correoEscuela, tipoLlamada, paqueteHosAcc, idTipoDeAccidente
        FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, 
        vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
         
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela  ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
        <td><a href="eliminarAccidente.php?foAcc=<?php echo $mostrar['FolioAccidente'] ?>" 
        onclick="return confirm('Este proceso de ELIMINA el registro del accidente, asi como directorios y datos asociados como procedimientos, lesiones y diagnosticos. ¿Desea continuar? ')" ><img src='../images/delete.png' height='20'  width='20' ></a></td>
        <td><a href="modificarAccidente.php?idAcc=<?php echo $mostrar['idAcc'] ?>" ><img src='../images/edit.png' height='20'  width='20' ></a></td>
     

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
                
                
                ?>'><?php echo $mostrar['nombreEstatus'] ?></td>
        
        <td class='<?php 
            
            
              if ($mostrar['estatusInterno'] =="REGULAR"){ echo "ace"; }
              if ($mostrar['estatusInterno'] =="PRUEBA"){ echo "enhos"; }
            
                
                
                ?>'><?php echo $mostrar['estatusInterno'] ?></td>
 <td class='<?php 
            
            
            if ($mostrar['envioAcc'] =="NO ENVIADO"){ echo "rec"; }
            if ($mostrar['envioAcc'] =="ENVIADO"){ echo "fin"; }
          
              
              
              ?>'><?php echo $mostrar['envioAcc'] ?></td>



        
         
        <?php 
              if ($mostrar['FolioAccidente'] ==""){ echo "<td class='rec'><b>NO DISPONIBLE</b> </td>";
             }else{ echo "<td  class='ace' ><b>".$mostrar['FolioAccidente']."</b> </td>";
             }
                ?>
        
        <td class='<?php 
                        
            if ($mostrar['folioSiniestro'] ==""){ echo "rec"; } 
            else{ echo "ace"; }
                            
              ?>'><?php echo $mostrar['folioSiniestro'] ?></td>
        
        <td><?php echo $mostrar['appPaRepor'] ?></td>
        <td><?php echo $mostrar['appMaRepor'] ?></td>
        <td><?php echo $mostrar['nombreRepor'] ?></td>

        <td><b><?php
        
            echo $mostrar['correoEscuela'];
     
        
        
        ?></b></td>


        <td><?php echo $mostrar['telefonoReportante'] ?></td>
        <td ><?php echo $mostrar['descRepor'] ?></td>
            <td><?php 
            $times = explode(" ",  $mostrar['fechaRepor'] );
            echo $times[0];
           ?></td> 
            <td><?php echo $times[1]; ?></td>

            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
            <td><?php echo $mostrar['SegundoApellidoA'] ?></td>
            <td><?php echo $mostrar['NombreA'] ?></td>
            <td><?php echo $mostrar['FechaNacimientoA'] ?></td>
            
            <td><?php echo $mostrar['EdadA'] ?></td>
            <td><?php echo $mostrar['SexoA'] ?></td>
            <td><?php echo $mostrar['poblacionAccidentado'] ?></td>
            
          


            <td><?php echo $mostrar['CalleA'] ?></td>
            <td><?php echo $mostrar['Colonia'] ?></td>
            <td><?php echo $mostrar['AlcaldiaMunicipio'] ?></td>
            <td><?php echo $mostrar['idCP'] ?></td>
            
            
              
            <td><?php echo $mostrar['indigenaAcc'] ?></td>
            <td><?php echo $mostrar['dialectoAcc'] ?></td>
            <td><?php echo $mostrar['dialectoAccEs'] ?></td>
            <td><?php echo $mostrar['curpAcc'] ?></td>


            <td><?php echo $mostrar['apRes'] ?></td>
            <td><?php echo $mostrar['amRes'] ?></td>
            <td><?php echo $mostrar['nombreRes'] ?></td>


            <td><?php echo $mostrar['telFiRes'] ?></td>
            <td><?php echo $mostrar['telCelRes'] ?></td>
            <td><b><?php echo $mostrar['tipoDeCobertura'] ?></b></td>
            <td><?php echo $mostrar['GradoEscolarA'] ?></td>

            <td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php
            
            
            $dir = explode(", ",  $mostrar['dirEscRepor'] );
            echo $dir[0];
            ?></td>
            <td><?php echo $dir[2]; ?></td>
            <td><?php echo $dir[1]; ?></td>
            <td><?php echo $dir[3]; ?></td>
            <td><?php echo $dir[4]; ?></td>


            <td><?php echo $mostrar['regionPrincipal'] ?></td>
            <td><?php echo $mostrar['diagnosticosLista'] ?></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td>
            
            <td><b><?php echo $mostrar['idTipoDeAccidente'] ?></b></td>

            <td><b><?php echo $mostrar['resultadosEncuesta'] ?></b></td>
            <td><b><?php echo $mostrar['documentosFaltantes'] ?></b></td>
            <td><b><?php echo $mostrar['observacionesQueja'] ?></b></td>
            <td><?php echo $mostrar['diagnosticosAcc'] ?></td>
            <td ><?php echo $mostrar['procedimientosAcc'] ?></td>
            <td><b><?php echo $mostrar['fechaEgreso'] ?></b></td>
            <td><b><?php 
            $time = explode(" ",  $mostrar['fechaHoraAccidente'] );
            echo $time[0];
           ?></b></td>
            <td><b><?php echo $time[1];  ?></b></td>



           
            <td><b><?php echo $mostrar['idLugarAccidente'].", ".$mostrar['lugarAccIn'] ?></b></td>
            <td><b><?php echo $mostrar['reservaTecnica'] ?></b></td>
            <td><b><?php echo $mostrar['montosErogados'] ?></b></td>
            
            <td><b><?php echo $mostrar['montosErogadosRT'] ?></b></td>
            <td><b><?php echo $mostrar['honorariosMedicos'] ?></b></td>
            <td><b><?php echo $mostrar['montosErogadosHM'] ?></b></td>
            <td><b><?php echo $mostrar['tipoDeAtencion'] ?></b></td>
            
            <td><b><?php echo $mostrar['tipoDeTramite'] ?></b></td>
            
            <td><b><?php echo $mostrar['quejaAccidente'] ?></b></td>
            <td><b><?php echo $mostrar['comentarioAccidente'] ?></b></td>
            <td><b><?php echo $mostrar['notasAcc'] ?></b></td>
            <td><b><?php echo $mostrar['tipoLlamada'] ?></b></td>
            <td><b><?php echo $mostrar['paqueteHosAcc'] ?></b></td>


            
            
		</tr>
        
	<?php 
	}
	 ?>
   
            
    
           </table>
 
     

  </div>
  <div class='col-1'>
  <br>
  <img id='generarExcel' src='../images/botonexcel.jpg' onclick="fnExcelReport('adminTable')" height='60'  width='70' style='border-radius: 15px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));'>
  <a href="#" id="link" style="display:none"></a>
  <script>
function encode_utf8( s )
{
  return unescape( encodeURIComponent( s ) );
}




function fnExcelReport(idTable)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(idTable); 
    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<a href[^>]*>|<\/a>/g, "");
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); 
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); 
    tab_text= tab_text.toUpperCase();
   
    
 
    var link = document.getElementById('link'),
        nombre = "tablaAdministrador <?php 

$time = time();
$fechaHoy = date('Y-m-d', $time);
$hora = date("H:i:s", $time);
$fechaID = $fechaHoy." ".$hora;
echo $fechaID;
?>";

    link.href='data:application/vnd.ms-excel;base64,' + window.btoa(tab_text);
    link.download=nombre;
    link.click();
    
}
  </script>
  </div>
          </div>
          </div>
          
    </div>
    
</body>
       
</html>

