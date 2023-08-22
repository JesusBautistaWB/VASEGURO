<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>
  <script type="text/javascript" src="js/securityMedAux.js"></script>
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
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
        ";  ?> 

         <span type="text" style="
         font-family: fantasy;
         border: none;
  font-size: 30px;
  color:  #2C4A9A;
  line-height: 1.2;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 1px 2px #999;
  display: inline;
    margin: auto;" id="labelNOM" name="labelNOM"> 
    
    PERFIL ANALISTA DE SINIESTROS </span>
     <?php  
   include("../functions/phpfunctions.php");
    menuMedAux();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#985E6B;">
        <div class="col-1">
                <span class="accdet"> SELECCIONE UN PERIODO PARA FILTRAR LOS RESULTADOS</span>
                </div>

        <div class="col-2">
      
      <label> <input readonly style="background: #088BB9; font-size: 11px; color: white;"
      value=" Fecha de Inicio:">
          
           <input   name="fechaIn" id="fechaIn" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSe()" >

  </label>
</div>

<div class="col-2">
      
      <label>
      <input readonly value=" Fecha de final:" style="background: #BC240C; font-size: 11px; color: white;">
           <input   name="fechaFin" id="fechaFin" type="date" style="font-size: 11px; color: black; background: white;" onchange="busquedaPeriodoSe()">

  </label>
</div>
                <div class="col-1">
                <span class="accdet"> SELECCIONE EL FOLIO DE APROBACION PARA VISUALIZAR LOS DATOS CORRESPONDIENTES AL ACCIDENTE Y REALIZAR LAS ACCIONES QUE CORRESPONDA</span>
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
      <div class="col-1" style="background: white;">
                <span class="accdet"> FILTRO DE BUSQUEDA:</span>
               <label> 
               
               <select id="estatusSE" name="estatusSE" onchange="busquedaACC()">
               <?php 
                        $conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
                        $conexion -> set_charset("utf8");
                        $esta = "SELECT *  FROM vasegurobd.cat_estatus ORDER by nombreEstatus ASC";
                        $result3=mysqli_query($conexion,$esta);
                         echo "
                         <option value=''>SELECCIONE UNA CATEGORIA</option>
                         <option>TODOS</option>";
                        
		                             while($milista=mysqli_fetch_array($result3)){
                                         
                                     echo "<option value=".$milista['nombreEstatus'].">".$milista['nombreEstatus']." (".$milista['registrosTotal'].")</option>";
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

            var estatus = $('#estatusSE option:selected').text();
            var estatusT = $('#estatusSE option:selected').text();
            $('#labelNOM').val(estatusT);

            var estatusS = ((estatus.replace(/[0-9]/,"")).replace("(","")).replace(")","").replace(/[0-9]/,"");
            var es = (estatusS.replace(/[0-9]/,""));
           
          $.ajax({

          url: '../functions/filtroUsuarioAux.php',
          type: 'POST',
          data: {estatus:es},
          success:function(data){
              
              $('#adminTable').show(); 
              $('#adminTable').html(data);
               
              
              
          }
      });

          }
                      
                      
                      </script>  
	<table border="1" id="adminTable" name="adminTable">
  <tr><td  ><b>PARA COMENZAR, SELECCIONE UNA CATEGORIA</b><td></tr>  
		
           </table>
 
     

  </div>

          </div>
          </div>
    </div>
</body>
       
</html>
