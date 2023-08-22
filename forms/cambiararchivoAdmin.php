<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/security.js"></script>
      <style>
        .text {
  font-size:24px;
  font-family:helvetica;
  font-weight:bold;
  color: darkred;
  text-transform:uppercase;
}
.parpadea {
  
  animation-name: parpadeo;
  animation-duration: 1s;
  animation-timing-function: linear;
  animation-iteration-count: infinite;

  -webkit-animation-name:parpadeo;
  -webkit-animation-duration: 1s;
  -webkit-animation-timing-function: linear;
  -webkit-animation-iteration-count: infinite;
}

@-moz-keyframes parpadeo{  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}

@-webkit-keyframes parpadeo {  
  0% { opacity: 1.0; }
  50% { opacity: 0.0; }
   100% { opacity: 1.0; }
}

@keyframes parpadeo {  
  0% { opacity: 1.0; }
   50% { opacity: 0.0; }
  100% { opacity: 1.0; }
}
      </style>

    
   <script type="text/javascript">     
        
       
       function pregunta(){
    if (confirm('¿Confirmar el cambio de archivo?')){

      loading();
       document.arrHosForm.submit();
    }

}

function loading(){
    var Val = $('#file').val(); 
        if(Val=='') 
        { 
           

        } 
       else
         {
          document.getElementById('loading').style.display = 'inline'; 
         }

  

}
    </script>  
</head>

     
    
<body>
<div class="header">
  
  <center>         
     <?php 
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>";
 include("../functions/phpfunctions.php");

  ?>
      
 </center>

  </div>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

        
        
        <?php   
        $id = $_GET['idf'];
		    $conexion = con();
      
		$sql1="SELECT * FROM vasegurobd.tb_rutasarchivos WHERE idRuta =".$id;
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form id="arrHosForm" action ="../functions/confirmarCambioAdmin.php" method="POST" enctype="multipart/form-data">   
      <div class="col-2">
          <label>
          <input   name="hospital" id="hospital" style="border:none; " readonly> 
          <script>
          document.getElementById("hospital").value = localStorage.getItem('nombreUsuario');
          </script>
              </label>
              </div> 

              <div class="col-2">
          <label>
          <input   name="id" id="id" style="border:none; display: none;" readonly> 
          <script>
          document.getElementById("id").value = localStorage.getItem('idHos');
          </script>
              </label>
              </div> 

              
          <div class="col-1"> <span class="textSection"> CAMBIO DE ARCHIVO</span> </div>  
          <div class="col-1"><label><br></label></div>
          

             <?php 
            
                
                echo "
                <div class='col-3'><label>ID ARCHIVO:
                <input name='idRuta' id='idRuta' value=".$mostrar['idRuta']." readonly>
                </label>
                </div>

                <div class='col-3'><label>ACCIDENTE ASOCIADO:
               <input name='folio' id='folio' value=".$mostrar['folioAcc']." readonly>
               </label>
               </div>

               <div class='col-3'>
               <label> TIPO DE DOCUMENTO:
            <select id='tipoDocumento' name='tipoDocumento'>
              <option>".$mostrar['tipoDocumento']."</option>
              <option>INE</option>
              <option>ACTA DE NACIMIENTO</option>
              <option>CARTILLA</option>
              <option>OTRO</option>
              </select>
    </label>
               </div>


                <div class='col-1'><span class='accdet'>ARCHIVO ACTUAL:</span></div> 
               <center> <div class='col-1'>
               <span  style='font-size: 15px; block: inline;'><a href='".$mostrar['ruta']."' target='_blank'>".
               $mostrar['tipo']."-".$mostrar['folioAcc']."-".$mostrar['foAcc']."-".$mostrar['fechaDeCarga'].
               "</a></span></div> </center>
               ";
   
            }
          
        
         ?>
         <div class="col-1"><label><br></label></div>
         <div class="col-1">
         <span class='accdet'>ARCHIVO NUEVO:</span>  
         <center>
         <input type="hidden" name="MAX_FILE_SIZE" value="1000000000">
         
         <input type="file"  name="file[]" id="file" multiple></center>
        
        
        
        </div>
        <div class="col-1"><label><br></label></div>
    <center><button id="send" class="submitbtn" type="submit" onclick="pregunta()" style="width: 150; font-size: 10px; background: #darkblue;">
    
    CONFIRMAR EL CAMBIO</button> </center>

    <div class="col-1"><label><br></label></div>
        
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 