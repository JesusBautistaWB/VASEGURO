<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title> VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>

     
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
      
     <?php  
   include("../functions/phpfunctions.php");
  
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#6992EA;">
               
 
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
      <script>

  function activar(){

    var palabra = $('#pa').val();

    $.ajax({
    url: '../functions/activar.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      alert("PERFIL "+palabra+" ACTIVADO");

      


window.location= "http://www.gruposemedic.mx/VASEGURO/VistasVaseguro/loginVS/indexvaseguro.html" ;  

    }
  });

  }
    
          </script>
      <div class="col-1">
      
      <label>
  <input  placeholder="INGRESE EL USUARIO QUE DESEA ACTIVAR" style="background: white; color: black;" name="pa" id="pa">
  <button type="button" class="submitbtn" onclick="activar();"> ACTIVAR <button>
  </label>
</div>      
         

      


       <div id="div1">
       
	

    <?php

$conexion = con();
		$sql="SELECT * FROM vasegurobd.tb_llamadas";
       

       

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
 
}
?> 	

 
     

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

