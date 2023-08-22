<html lang="en-US">
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  
  <title>Aviso de Accidente VASEGURO</title>
  
 
  <script type="text/javascript" src="js/securityMed.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
    
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<style type="text/css">>
iframe {
  overflow-x:hidden;
  overflow-Y:hidden;
}    

::-webkit-scrollbar {
    width: 0px;
    height: 0px;
}

</style> 
</head> 


      
<body>
    
 
    <div class="header">         
       <?php 
        echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
    <span class='titleHeader'>   AVISO DE ACCIDENTE </span>";  
   include("../functions/phpfunctions.php");
    menuMed();
    ?>
  

    </div>
    
    
    
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#6992EA;">
 
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form>
     
       <div class="col-1"></div>

      
            <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" style="border: none;"  readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
              </div>
        <div class="col-3">
           <label>
               <input id="nombreUsuario" name="nombreUsuario" style="border: none;"  readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>
      </div>
      <div class="col-3">
      <label>
      <input  placeholder="<?php  $fechaActual = getdate('d-m-Y');
      echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy" style="border: none;"  readonly>
      </label>
      </div>
          <div class="col-1"><span class="textSection">BIENVENIDO AL SISTEMA DE AVISO DE ACCIDENTES | VASEGURO <br></span></div>
          <?php estadisticasIniciales(); ?>
  </form>
  </div>
 </div>
</div>
</body>
    
      
</html>