<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title> VASEGURO</title>

  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
      
     <?php  
   include("../functions/phpfunctions.php");
    menuAdmin("ADMINISTRADOR DE LLAMADAS");
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

              
         

      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
   
        <tr>
        <thead>
       <td>ID</td>
       <td>Folio</td>
       <td>Comentario</td>
       <td>Persona que llama</td>
       <td>Tipo de llamada</td>
       <td>Usuario que registra </td>
       <td>Fecha</td>
       <td></td>
       
     
       
       </thead>
   </tr>

    <?php

$conexion = con();
		$sql="SELECT * FROM vasegurobd.tb_llamadas ORDER BY fecha DESC";
       

       

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td><b><?php echo $mostrar['id_Llamada'] ?></b></td> 
            <td class="ace"><?php echo $mostrar['folioAccLlamada'] ?></td>
            <td style="font-size: 9px;"><?php echo $mostrar['motivoLlamada'] ?></td>
            <td><?php echo $mostrar['apRepor']." ".$mostrar['amRepor']." ".$mostrar['nombreRepor']; ?></td>
            <td><?php echo $mostrar['tipoLlamada'] ?></td>
            <td class="ace"><?php echo $mostrar['usuReg'] ?></td>
            <td class="ace"><?php echo $mostrar['fecha'] ?></td>
            <td>
              <?php 
              if($mostrar['folioAccLlamada'] != ""){
              
              if($mostrar['estatus'] == "NO"){ 
             ?>

              <a href="../functions/insertarComen.php?<?php echo "idAcc=".$mostrar['folioAccLlamada']."&&idCo=".$mostrar['id_Llamada']; ?> ">
              AGREGAR COMENTARIO A ACCIDENTE</a>

              <?php
              
              }else{

                echo "AGREGADO";
              }
            }
            else{
             ?> <b>NO APLICA</b><?php
            }

              ?>
            
            </td>

  </tr>
           


            


                <?php

}
?> 	

</tr>

  
		
           </table>
           <div class="col-1"><label><a href="registrarLlamada.php">
               <button type="button" style="
             background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
 
  text-decoration: none;
  display: inline-block;
  font-size: 10px;
  margin: 4px 2px;
  width: 250px;
  ">REGISTRAR LLAMADA</button></a>
</label>
           </div>
 
     

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
