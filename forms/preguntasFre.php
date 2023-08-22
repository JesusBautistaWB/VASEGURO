<html>
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Aviso de Accidente VASEGURO</title>
  
  <script type="text/javascript" src="js/securityAdmin.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      
      
</head> 
<body>
    
 
    <div class="header">   
       <?php  
   include("../functions/phpfunctions.php");
    menuAdmin("AYUDA");
    ?>

    </div>
  
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">
 
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form>
      
            <div  class="col-3" >
          <label>
          <input style="border: none" name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input style="border: none" id="nombreUsuario" name="nombreUsuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3" >
      
              <label>
          <input style="border: none" placeholder="<?php 
  $fechaActual = date('Y-m-d');
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>



      <div class="col-1" >
      
      <label>
Bienvenido a la seccion de ayuda y preguntas frecuentes, donde encontrara asistencia a dudas que le ayudaran a optimizar 
su uso del sistema.
  <br><br>

<ol>
  <li>
    <label style="color: darkred;">¿QUE PASA SI NO PUEDO INICIAR SESION?</label><br><br>
    
    <label style="color: grey;">
    DEBAJO DEL BOTON "INICIAR", ENCONTRAS LA PALABARA "DESBLOQUEAR", LA CUAL TE LLEVARA A UN FORMULARIO 
    DONDE DEBERAS INGRESAR EL NOMBRE DEL TU PERFIL Y PULSAR AL BOTON, LUEGO DE ESTO, PODRAS INICIAR SESION 
    NORMALMENTE.
</label>
    <label style="color: black; font-size: 18px;">*NO OLVIDES CERRAR TU SESION TODOS LOS DIAS AL DEJAR TU EQUIPO</label>
</li>
</ol>
 </label>
</div>

     
  </div> 
      
  
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