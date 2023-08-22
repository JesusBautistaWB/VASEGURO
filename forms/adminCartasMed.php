<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>
  <script type="text/javascript" src="js/securityMed.js"></script>
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
   include("../functions/phpfunctions.php");
    menuMed("ADMINISTRADOR DE CARTAS");
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#6992EA;">
        <div class="col-1">
                <span class="accdet"> SELECCIONE UN PERIODO PARA FILTRAR LOS RESULTADOS</span>
                </div>

        <div class="col-2">
      
      <label> <input readonly style="background: #088BB9; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoCa()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #BC240C; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoCa()" >

  </label>
</div>
                <div class="col-1">
                <span class="accdet"> SELECCIONE EL PERIODO DE TIEMPO, PARA CONSULTAR LAS CARTAS GENERADAS EN EL</span>
                </div>
 
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
      <div class="col-1" style="background: white; display: none;">
                <span class="accdet"> FILTRO DE BUSQUEDA:</span>
               <label> 
               
               <select id="estatusSE" name="estatusSE" onchange="busquedaACC()">
               <?php 
                        $conexion = con();
                        $esta = "SELECT *  FROM vasegurobd.cat_estatus ORDER by nombreEstatus ASC";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>SELECCIONE UNA CATEGORIA</option>
                         <option>TODOS</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value=".$milista['nombreEstatus'].">".$milista['nombreEstatus']."</option>";
                                     }
   
                                        ?>
      </select></label>
                </div>


      


       <div id="div1">
       <script>
              
/*  
            var estatus = $('#estatusSE option:selected').text();
            var estatusT = $('#estatusSE option:selected').text();
            
            $('#labelNOM').val(estatusT);
              $.ajax({
  
              url: '../functions/filtroUsuario.php',
              type: 'POST',
              data: {estatus:estatus},
              success:function(data){
                  
                  $('#adminTable').show(); 
                  $('#adminTable').html(data);
               
                  
              }
          }); */

          function busquedaACC(){
            var nivel = localStorage.getItem('nivel');
            var estatus = $('#estatusSE option:selected').text();
            var estatusT = $('#estatusSE option:selected').text();
            $('#labelNOM').val(estatusT);

            var estatusS = ((estatus.replace(/[0-9]/,"")).replace("(","")).replace(")","").replace(/[0-9]/,"");
            var es = (estatusS.replace(/[0-9]/,""));
           
          $.ajax({

          url: '../functions/filtroUsuario.php',
          type: 'POST',
          data: {estatus:es, nivel:nivel},
          success:function(data){
              
              $('#adminTable').show(); 
              $('#adminTable').html(data);
               
              
              
          }
      });

          }
                      
                      
                      </script>  
	
  <?php
  //ini_set('display_errors', 1);
  include("phpfunctions.php");


$conexion = con();
		$sql="SELECT * FROM vasegurobd.tb_cartasgarantia 
         ORDER BY fechaGeneracion DESC";
         $result=mysqli_query($conexion,$sql);
          $row_cnt = mysqli_num_rows($result);
          ?>
<table border="1">
    <tr>
        <td colspan="15" style = "background-color: #a9d896; color: #0F362D;">
<?php echo "<b>".$row_cnt."</b> Cartas generadas hasta el dia de hoy </b>"; ?>
</td>
</tr>
</table>
          <?php


echo '<table id="adminTable">
<thead>
<tr>
<td>Numero de Carta</td>
<td> Folio Accidente </td>
<td>Fecha Generacion</td>
<td>DR. Que Autoriza</td>
<td>IDs Servicios Adicionales</td>
<td>Monto Para Hospital</td>
<td>Especialidades</td>
<td>DX</td>
<td>PROCEDIMIENTOS</td>
<td></td>
</tr>
</thead>';

$lista = $query->fetchAll();

/*
foreach ($lista as $milista) {
    echo '

    <td><b>'.$milista['numeroCarta'].'</b></td>
    <td><b>'.$milista['folioAccidente'].'</b></td>
    <td>'.$milista['fechaGeneracion'].'</td>
    <td class="ace">'.$milista['nombre'].'</td>
    <td >'.$milista['ids_ss'].'</td>
    <td > $'.$milista['montoHos'].'</td>';

    espCar($milista['ids_ss']);
    dxCar($milista['ids_ss']);
    proCar($milista['ids_ss']);
    echo '<td><a href='.$milista['gen'].' target="_blank">VER</a></td>
    
    
    </tr>';
  

}
*/

echo "</table>";



 ?>

 
     

  </div>

  <button style="background-color: darkblue;  width: 150px; font-size: 10;" type="button" onclick="descarga()">DESCARGAR HISTORIAL DE CARTAS</button>
 <a href="#" id="linka" style="display:none"></a>
<script>
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
        nombre = "historialCartas";

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
