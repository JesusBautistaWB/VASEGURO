
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>
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
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br>
        <span class='titleHeader'>   AVISO DE ACCIDENTE | SEGUIMIENTO </span>";
   include("../functions/phpfunctions.php");
    menuEsc();
        
    ?>
   </center>

    </div>
     


      <div id="wrapper">
      <div class="limiter">
          
				<div class="container-login100" style="background:#708090;">
<div class="col-1"><label><input id="nombreEscuela" name="nombreEscuela" type="hidden" readonly></label></div>
                    <script>
              
            $('#nombreEscuela').val(localStorage.getItem("nombreUsuario"));
                    
            var escuela = localStorage.getItem("nombreUsuario");
            $.ajax({

			url: '../functions/escuelasUsuario.php',
			type: 'POST',
			data: {escuela:escuela},
			success:function(data){
                
				$('#tablaAccidentesEsc').show(); 
                $('#tablaAccidentesEsc').html(data);
				
                
			}
		});
                    
                    
                    </script>
  <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" readonly> 
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
        <div class="col-3">
           <label>
               <input  id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           </label>

      </div>

      <div class="col-3">
      
              <label>
          <input  placeholder="<?php $fechaActual = date('Y-m-d'); echo $fechaActual; ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      </div>  
      
       <div id="div1">
       
    <span class="accdet">PROPORCIONE EL FOLIO DE URGENCIA AL SERVICIO DE AMBULANCIA EN EL CASO REQUERIDO.</span>
           <div class="col-1"><span class="accdet"> SELECCIONE EL FOLIO DE APROBACION PARA COMPLETAR LOS DATOS PENDIENTES</span></div>
	<table border="1" id="tablaAccidentesEsc" name="tablaAccidentesEsc">
        
        
	   
	
 
 
            <script type="text/javascript">
var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));

elems.forEach(function(html) {
  var switchery = new Switchery(html);
});
                
      
</script>
    
           </table>
 
     

  </div>
          </div>
          </div>
    </div>

</body>
       
</html>
