<html lang="en-US">
<head>
  
<script type="text/javascript">     
          if((localStorage.getItem('sessionValue') == ""  )){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        }
    </script>   
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>SEGUROS ATLAS VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      
      
 
</head>
  
<body>
    <div class="header">
   
  
        <center>         
           <?php 
           echo "<img src='../images/ATLAS1.PNG' height='60'  width='450'> <br>
            ";  ?> 
             <span style="
             font-family: fantasy;
             border: none;
      font-size: 30px;
      color:  #2C4A9A;
      line-height: 1.2;
      text-align: center;
      text-transform: uppercase;
      text-shadow: 1px 2px #999;
      display: inline;
        margin: auto;" id="labelNOM" name="labelNOM" >
    SEGUROS ATLAS
        </span>

        <?php  
   include("../functions/phpfunctions.php");
   menuAtlas();
    ?>
 
    
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#730B06; ">
                <div class="col-3">
          <label>
          <input  class="ace" name="idUsuario" id="idUsuario" style='background:#730B06;' readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input class="ace" id="nombreUsuario" name="nombreUSuario" style='background:#730B06;' readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input class="ace" placeholder="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy" style='background:#730B06;'  readonly>
       
          </label>
      </div>

      <div class="col-1">
      
      <label><input readonly style="background: #088BB9; font-size: 11px; color: white;"
value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE QUE REQUIERA:">
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolio()" onchange="buscarFolio()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 12px">

  </label>
</div>





      <div class="col-2">
      
      <label> <input readonly style="background: #088BB9; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoOR()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #BC240C; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoOR()">

  </label>
</div>

 
      
       <div id="div1">
   
	<table border="1" id="adminTable">

		<tr>
        <thead style = "background-color: darkblue; font-size: 9px;">
        
        <td style = "background-color: #32275a;" colspan = "7"></td>
        <td colspan = "3">NOMBRE DE QUIEN REPORTA</td>
        <td colspan = "2">DEL CONTACTO DE LA PERSONA  QUE REPORTA</td>
        <td style = "background-color: #32275a;" colspan = "3"></td>
        <td colspan = "3">NOMBRE COMPLETO DE LA PERSONA ACCIDENTADA</td>
        <td style = "background-color: #32275a;" colspan = "4"></td>
        <td colspan = "4">DOMICILIO COMPLETO DEL ACCIDENTADO</td>
        
        <td  colspan = "3">ETNIA</td>
        <td style = "background-color: #32275a;" ></td>
        <td  colspan = "3">NOMBRE COMPLETO DEL PADRE, MADRE O TUTOR RESPONSABLE DEL ACCIDENTADO</td>
        <td  colspan = "2">TELÉFONOS DE LOCALIZACIÓN DE LA PERSONA ACCIDENTADA</td>
        <td style = "background-color: #32275a;" colspan = "3"></td>
        <td  colspan = "4">DOMICILIO COMPLETO DE LA ESCUELA</td>
        <td style = "background-color: #32275a;" colspan = "50"></td>
    
    
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
   <tr><td colspan="15"><b>PARA COMENZAR, ESPECIFIQUE UN PERIODO, O BUSQUE POR FOLIO</b><td></tr>
            
    
           </table>
 
     

  </div>
  <div class='col-1'>
  <br>
  <img id='generarExcel' src='../images/botonexcel.jpg' onclick="filtroDescarga()" height='60'  width='70' style='border-radius: 15px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));'>
  <a href="#" id="link" style="display:none"></a>
  <script>
function encode_utf8( s )
{
  return unescape( encodeURIComponent( s ) );
}

function filtroDescarga(){

  var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();

$.ajax({


   url: '../functions/buscarPeriodoAdminFiltro.php',
   type: 'POST',
   data: {fechaIn:fechaIn, fechaFin:fechaFin},
   success:function(data){
	   $('#adminTable').show(data); 
	   $('#adminTable').html(data);
	   alert("SE DESCARGARAN LOS ACCIDENTES EN EL PERIODO SELECCIONADO, QUE NO HAYAN SIDO ENVIADOS ANTERIORMENTE.");
     fnExcelReport();
   }
});


}



function fnExcelReport()
{

  var fechaIn = $('#fechaIn').val();
	var fechaFin = $('#fechaFin').val();

    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('adminTable'); 
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
?>"+"("+fechaIn+"-"+fechaFin+")";

    //link.href='data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
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

