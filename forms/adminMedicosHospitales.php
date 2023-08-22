<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title> VASEGURO</title>
  <script type="text/javascript" src="js/securityMed.js"></script>
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityMed.js"></script>
    
      
</head>
  
<body>
    <div class="header">
  
    <center>         
       
     <?php  
   include("../functions/phpfunctions.php");
    menuMed("ADMINISTRADOR DE HOSPITALES");
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
       <td>Hospital</td>
       <td>Editar</td>
       <td>Calle</td>
       <td>Delegacion</td>
       <td>Telefono</td>
       <td>Horarios</td>
     
     
       
       </thead>
   </tr>

    <?php

$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT * FROM vasegurobd.cat_hospitales;";
        

       

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td class="dup"><?php echo $mostrar['idHospital'] ?></td> 
            <td class="ace"><?php echo $mostrar['nombreClinicaHospital'] ?></td>
            <td><a href="editHospital.php?id=<?php echo $mostrar['idHospital']?>" ><img src='../images/edit.png' height='20'  width='20' ></a></td>
           

            <td ><?php echo $mostrar['calleHospital'] ?></td>

			
			<td><b><?php echo $mostrar['delegacionHospital'] ?></b></td>

            <td><?php echo $mostrar['telefonoHospital'] ?></td>


           <td> <?php echo $mostrar['horarioAtencion'] ?> </td> 
  
     



 	

</tr>

  <?php
      

}
mysqli_close($conexion);

?>  
		
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
