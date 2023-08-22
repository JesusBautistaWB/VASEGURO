<html lang="en-US">
<head>
<meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
<script type="text/javascript" src="js/securityAdminSup.js"></script>

 
  <title>ADMIN VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <style>
      
      .grow img{
transition: 1s ease;
}

.grow img:hover{
-webkit-transform: scale(1.2);
-ms-transform: scale(1.2);
transform: scale(1.2);
transition: 1s ease;
}
      
</style>
</head>
<body>
    <div class="header">
    <center>          
       <?php 
    
   include("../functions/phpfunctions.php");
    menuAdmin("AVISO DE ACCIDENTE | ADMINISTRADOR");
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#B7B9EB; ">
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
               <input class="ace" id="nombreUsuario" name="nombreUSuario"  readonly>
          <script>
     
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input style="color: white;" class="ace" value="<?php 
          date_default_timezone_set('america/mexico_city');
          $time = time();
           $fechaActual = date('Y-m-d', $time);
          
          echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      </div>

      <div class="col-3">
      
      <label>
     
      <input readonly style="background: #4C51C2; font-size: 10px; color: white;"
value="Ingrese el folio especifico:"> 
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolio()" onchange="buscarFolio()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 10px">

  </label>
</div>

<div class="col-3">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white; heigh: auto;"
value="BUSQUEDA POR ESTATUS INTERNO:" >
               <label>
               <select id="busEsIn" name="busEsIn" onchange="busquedaEsIn()" style="background: white; font-size: 16px; color: black; height: auto;">
               <?php 
                        $conexion = con();
                        $esta = "SELECT nombreEstatusInterno FROM vasegurobd.cat_estatusinterno;";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>Seleccione un estatus...</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value='".$milista['nombreEstatusInterno']."'>".$milista['nombreEstatusInterno']."</option>";
                                     }
   
                                        ?>
      </select>
 

  </label>
</div>


<div class="col-3">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value="BUSQUEDA POR HOSPITAL">
               <label>
               <select id="busHos" name="busHos" onchange="busquedaHos()" style="background: white; font-size: 16px; color: black;">
               <?php 
                        $esta = "SELECT idHospital, nombreClinicaHospital FROM vasegurobd.cat_hospitales;";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>Seleccione un hospital...</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value='".$milista['idHospital']."'>".$milista['nombreClinicaHospital']."</option>";
                                     }
   
                                        ?>
      </select>
 

  </label>
</div>

<div class="col-2">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value="BUSQUEDA POR ESTATUS">
               <label>
               <select id="busEs" name="busEs" onchange="busquedaEs()" style="background: white; font-size: 16px; color: black;">
               <?php 
                        
                        $esta = "SELECT idEstatus, nombreEstatus FROM vasegurobd.cat_estatus;";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>Seleccione un Estatus...</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value='".$milista['idEstatus']."'>".$milista['nombreEstatus']."</option>";
                                     }
   
                                        ?>
      </select>
 

  </label>
</div>



<div class="col-2">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value="BUSQUEDA POR RESULTADOS DE ENCUESTA">
               <label>
               <select id="busEn" name="busEn" onchange="busquedaEnc()" style="background: white; font-size: 16px; color: black;">
               <?php 
                        
                        $esta = "SELECT encuesta FROM vasegurobd.cat_encuesta WHERE encuesta != '';";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>Seleccione un Resultado...</option>
                         
                         ";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option>".$milista['encuesta']."</option>";
                                     }
   
                                        ?>
      </select>
 

  </label>
</div>



      <div class="col-2">
      
      <label> <input readonly style="background:  #05769d; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" 
           max="<?php echo date("Y-m-d",strtotime($fechaActual."+ 2 month")); ?>"
           min="<?php echo date("Y-m-d",strtotime($fechaActual."- 2 month")); ?>"
           style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodo()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #05769d; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" 
           max="<?php echo date("Y-m-d",strtotime($fechaActual."+ 2 month")); ?>"
           min="<?php echo date("Y-m-d",strtotime($fechaActual."- 2 month")); ?>"
           style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodo()">

  </label>
</div>

 
      
       <div id="div1">

       <div class="col-1" id="load" style="display: none;">
       <center>
    <img src="../images/load.gif" width="700" hight="300">
</center>
                                    </div>
	<table border="1" id="adminTable">

		
           </table>
 
     

  </div>

  <div class='grow' title="DESCARGAR REPORTE FILTRADO">
  <br>
  <img id='generarExcel' src='../images/doex.png' onclick="filtroDescarga()" height='140'  width='280' 
  style='border-radius: 6px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7)); background-color:white;  opacity: 7;'>
  <a href="#" id="link" style="display:none"></a>
  </div>
  <div class="col-1">
  <label><br><br></label>
 </div>



  <div class='grow' title="DESCARGAR REGISTROS DE  PANTALLA ACTUAL">
  <img id='generarExcelALL' src='../images/doexalt.png' onclick="descarga()" height='140'  width='280' 
  style='border-radius: 10px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7)); background-color:white;  opacity: 7;'>
  <a href="#" id="linka" style="display:none"></a>
                                    </div>



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
    tab_text= tab_text.replace("&nbsp;", " ");
    tab_text= tab_text.replace("&NBSP;", " ");
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
   //link.href='data:application/vnd.ms-excel;base64,' + window.btoa(tab_text);

   link.href='data:application/vnd.ms-excel;base64,' + window.btoa(tab_text);
    link.download=nombre;
    link.click();
    
}


function descarga()
{
alert("SE DESCARGARA LA TABLA QUE SE MUESTRA EN PANTALLA");

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
    tab_text= tab_text.replace("&nbsp;", " ");
    tab_text= tab_text.replace("&NBSP;", " ");
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); 
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); 
    tab_text= tab_text.replace("«", ""); 
    tab_text= tab_text.replace("»", ""); 
    tab_text= tab_text.replace("“", ""); 
    tab_text= tab_text.replace("”", ""); 
    tab_text= tab_text.replace("„", ""); 
    tab_text= tab_text.replace("“", ""); 
    
    tab_text= tab_text.toUpperCase();
    var link = document.getElementById('link'),
        nombre = "tablaAdministrador <?php 

$time = time();
$fechaHoy = date('Y-m-d', $time);
$hora = date("H:i:s", $time);
$fechaID = $fechaHoy." ".$hora;
echo $fechaID;
?>";

    //link.href='data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
    linka.href='data:application/vnd.ms-excel;base64,' + window.btoa(tab_text);
    linka.download=nombre;
    linka.click();
    
}


  </script>
  
          </div>
          </div>
          
    </div>
    
</body>
       
</html>

