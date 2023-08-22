<html lang="en-US">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  
  <title>Aviso de Accidente VASEGURO</title>
  
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
    
    <script type="text/javascript">     
        if((localStorage.getItem('sessionValue') == "")){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
            localStorage.setItem('sessionValue', "");
             localStorage.setItem('nivel', "");
            
        }
    </script>    
</head>   
<body>
    <div class="header">
   
      
            
       <?php 
   echo "<img src='../images/ATLAS1.PNG' height='60'  width=500'> <br>
   <span class='titleHeader'>   AVISO DE ACCIDENTE | HOSPITAL </span>";  
   include("../functions/phpfunctions.php");
    menuHos();
        ?>
  

    </div>

  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">

   <form>
     
       <div class="col-1"></div>
            <div class="col-4">
          <label>
          <input style="border: none;"  name="idUsuario" id="idUsuario" type="hidden" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-4">
           <label>
               <input style="border: none;"  id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-4">
      
              <label>
          <input style="border: none;"  placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
          <div class="col-4" id="notAccHosS" name="notAccHosS"></div>
       <script>     
            var hospital = localStorage.getItem("nombreUsuario");
            $.ajax({

			url: '../functions/notAccHos.php',
			type: 'POST',
			data: {hospital:hospital},
			success:function(data){
				$('#notAccHosS').show();
                $('#notAccHosS').html(data); 
                $('#notAccHosS').val(data);
				
                
			}
		});




    $.ajax({

url: '../functions/estadisticasHospital.php',
type: 'POST',
data: {hospital:hospital},
success:function(data){
  $('#estadisticas').show();
          $('#estadisticas').html(data); 
          $('#estadisticas').val(data);
  
          
}
});
       
       </script>
         <div class="col-4">
          <label>
          <input style="border: none;"  name="idHos" id="idHos" type="hidden" readonly>
          <script>
          document.getElementById("idHos").value = localStorage.getItem('idHos');
          </script>
              </label> 

      </div>

      <div class="col-1">
          <label id="estadisticas">
         </label> 

      </div>
    <!--  <div class="col-1"><center><br><img src='../images/ATLAS.png' width="130 " height="130" ></center></div> <br> </br><p></p>-->
          <div class="col-1"><span class="textSection">BIENVENIDO AL SISTEMA DE AVISO DE ACCIDENTES | VASEGURO</span></div>
          

          <div class="col-1" id="estadisticas"></div>
          
          <div class="col-1"><span class="textSection">CONTACTO</span></div>

          
     
           <div class="col-1"><span class="textOptionIn"><center><br>
Ciudad de México Alcaldía Alvaro Obregon,<br>
Colonia Guadalupe Inn Insurgentes <br> Sur 1883, Piso 1
C.P. 01020</center></span></div>
      
      <div class="col-1"><span class="textOptionIn"><center>
      <br>CDMX y Areá Metropolitana: 55 55 43 55 55 <br> Resto de la República: 800 836 33 42 <br>contacto@semedic.mx<br><br>
        </center>  </span>
      </div>
      
          <div class="col-4"><center><a href="https://www.facebook.com/Grupo-Semedic-de-M%C3%A9xico-104172378139723" target="_blank"><img src='../images/fb.png' width="30" height="30" ></a></center></div>
          <div class="col-4"><center><a href="https://www.instagram.com/semedic_mx/?hl=es-la" target="_blank"><img src='../images/ig.png' width="30" height="30" ></a></center></div>
          <div class="col-4"><center><a href="https://twitter.com/GSemedic_MX" target="_blank"><img src='../images/tw.png' width="30" height="30" ></a></center></div>
          <div class="col-4"><center><a href="https://www.youtube.com/channel/UCbGVIilVGN3lNc4BRoDhrDw" target="_blank"><img src='../images/yt.png' width="40" height="30" ></a></center></div>
          <div class="col-1"><center><span class="textOptionIn"><br>Visita la web oficial <a href="http://www.semedic.com.mx/" target="_blank">AQUI</a> <br><br></span></center></div> 
      

  </form>
  </div>
          
          
            <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
                
          
</script>

      </div>
    </div>
</body>
    
      
</html>