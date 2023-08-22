<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>

  
      <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
      
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
       <?php 
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
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
    SOLICITUDES DE SERVICIOS
    </span>
     <?php  
   include("../functions/phpfunctions.php");
    menuHos();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#6992EA;">
               
 
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
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE CUYAS SOLICITUDES REQUIERA BUSCAR:">
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolioSM()" onchange="buscarFolioSM()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 12px">

  </label>
</div>

<script>

            var idHos = localStorage.getItem("idHos");
            $.ajax({

			url: '../functions/hospitalSolicitudes.php',
			type: 'POST',
			data: {idHos:idHos},
			success:function(data){
                
				$('#adminTable').show(); 
        $('#adminTable').html(data);
				
                
			}
		});
                    
                    
                    </script>
      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
    
           </table>
 
     

  </div>

  
  <div class='col-1'>
  
  <div id="div1">
   

    

 </div>
  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
