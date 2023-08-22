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
    echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
    <span class='titleHeader'>  REGISTRAR LLAMADA </span>";  
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>

    </div>
  
  <div id="wrapper">
      <div class="limiter">
    
		
		<div class="container-login100" style="background:#708090;">
 
     
 <!-- TRAEMOS LA INFORMACION BASICA DEL USUARIO, YA QUE SE UTILIZARA POSTERIORMENTE PARA FOLIAR AL ACCIDENTE EN CASO DE APROBACION-->
  <form action ="../functions/insertarLlamada.php" method="post" 
  id="accform" name="accform" autocomplete="off" 
  onSubmit="return confirm('Se enviara el accidente para su respectivo proceso. ¿Desea continuar?') ">
      
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


       <div class="col-1"> 
            <span class="textSectionNEW" >
					 DATOS DE LLAMADA
					</span>

  </div> 



       <div class="col-2">
    <label>
    TIPO DE LLAMADA: 
 <select id="tipoLlamada" name="tipoLlamada"  required>
  <?php                                   
                         $conexion = con();
                         $pdc = "SELECT * FROM vasegurobd.cat_tipollamada ORDER by tipollamada ASC";
                         $resultpdc=mysqli_query($conexion,$pdc);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
		                             while($milista=mysqli_fetch_array($resultpdc)){
                                         
                                     echo "<option>".$milista['tipollamada']."</option>";
                                     }
   
                                        ?>

  </select>
</label>      
  </div>
      
      
  <div class="col-2">
    <label>

FOLIO DEL ACCIDENTE CORRESPONDIENTE A LA LLAMADA:<label style="font-size: 10px; color: black;"><br>
*Si la llamada es ajena a algun accidente, deje este campo en blanco.</label>
                                    </label>

                                    <label> 
<input id="folioAccLla" name="folioAccLlam" style="
    background-color: white;
    color: black;
    font-size: 9px;">
  <?php                 
                        /* $sql = "SELECT FolioAccidente FROM vasegurobd.tb_accidentes;";
                        $result=mysqli_query($conexion,$sql);
                         echo "<option value=''>SELECCIONE UNA OPCION</option>";
		                             while($milista=mysqli_fetch_array($result)){
                                         
                                     echo "<option>".$milista['FolioAccidente']."</option>";
                                     }
                                     */
   
                                        ?>

  </select>
  </div>



  <div class="col-1">
  <label> MOTIVO DE LA LLAMADA: 
<input placeholder="comentario" id="motLl" name="motLl"  autocomplete="off" required>
                                    </label>  
   </div>



  <div class="col-2">
    <label>
    Nombre de la persona que se comunica:
        
  <input placeholder="APELLIDO PATERNO" id="appPaRepor" name="appPaRepor"  autocomplete="off" onkeyup="autocompletarApellidoPaterno();" required>
        <span class="listautocomp">
					<ul id="lista_appRepor"></ul>  
					</span>   
      <input placeholder="APELLIDO MATERNO" id="appMaRepor" name="appMaRepor" autocomplete="off" onkeyup="autocompletarApellidoMaterno();" required>
        <span class="listautocomp">
					<ul id="lista_apmRepor"></ul>  
					</span>   
     <input placeholder="NOMBRE(S)"  id="nombreRepor" name="nombreRepor"  autocomplete="off" onkeyup="autocompletarNombreRepor();" required>
        <span class="listautocomp">
					<ul id="lista_nombreRepor"></ul>  
					</span>   
         
    </label>
          
  </div> 


  
     
     
  <div class="col-submit">
    <button class="submitbtn" >ENVIAR</button>
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