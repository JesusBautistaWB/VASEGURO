<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Pendientes VASEGURO</title>
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
         echo "<img src='../images/ATLAS1.PNG' height='60'  width=650'> <br>
         <span class='titleHeader'>   AVISO DE ACCIDENTE | POR APROBAR </span>";
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>
   </center>

    </div>
     


      <div id="wrapper">
      <div class="limiter">
    
                <div class="container-login100" style="background:#708090;">
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
                <div class="col-1"><span class="accdet">A CONTINUACION SE MUESTRAN LOS ACCIDENTES REGISTRADOS POR LAS ESCUELAS, SELECCIONE EL ID PARA VISUALIZAR DATOS, APROBAR O RECHAZAR SU COBERTURA, Y SI ES NECESARIO, SUGERIR HOSPITALES. </span></div>
 
      
       <div id="div1">
	<table border="1">
	   
		<tr>
		     <thead>
			<td>ID</td>
            <td>Fecha</td>
            <td>Estatus</td>
			<td>Apellido Paterno del Accidentado/a</td>
			<td>Apellido Materno</td>
			<td>Nombre(S)</td>
			
			<td>Escuela de procedencia</td>
                 <td>Hospital Seleccionado</td>
                 <td></td>
                
			
			</thead>
		</tr>
        
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT idAcc,ACCT.FolioAccidente,PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, ACCT.idEstatus, nombreEscuela, idHospital, hospitalesSugeridos, fechaHoraAccidente FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND ACCT.idEstatus in('1','13') ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>    
            <td><?php 
             if ($mostrar['idEstatus'] == "1" ){
                echo "<a href='accHosAp.php?idAcc=".$mostrar['idAcc']."' method= 'POST'>".$mostrar['idAcc']."</a>";
             }
             if ($mostrar['idEstatus'] == "13" ){
                echo "<a href='detallesAccidente.php?idAcc=".$mostrar['idAcc']."' method= 'POST'>".$mostrar['FolioAccidente']."</a>";
             }
           
            
            
            
            
            
            
            ?></td>
            <td><?php echo $mostrar['fechaHoraAccidente'] ?></td>
        
            <td class='<?php 
            
              if ($mostrar['idEstatus'] =="1"){ echo "nuevo"; } 
              if ($mostrar['idEstatus'] =="13"){ echo "penrev"; } 

                ?>'><?php echo $mostrar['nombreEstatus'] ?></td>
            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
			<td><?php echo $mostrar['SegundoApellidoA'] ?></td>
			<td><?php echo $mostrar['NombreA'] ?></td>
			
			<td><?php echo $mostrar['nombreEscuela'] ?></td>
            
            <td class='<?php echo ($mostrar['hospitalesSugeridos'] !="")?'enEspera':'no' ?>'>
                
                <?php 
             
             
             if($mostrar['hospitalesSugeridos'] !=""){
             echo $mostrar['idHospital'];
             }else{
                 
                 echo "EN ESPERA DE OPCIONES";
             }
                
                
                
                ?>
            
            </td>
            <td class='<?php echo ($mostrar['hospitalesSugeridos'] !="")?'enEspera':'no' ?>'>
                <?php 
                if($mostrar['hospitalesSugeridos'] == ""){
                    if($mostrar['idHospital'] == ""){
                        echo "<a href='accHosAp.php?idAcc=".$mostrar['idAcc']."' method='get'>SUGERIR <br> HOSPITALES</a>";
                    } else{
                        echo "<a href='' method='get'>REVISAR DATOS</a>";

                    }




                   
                }else{
                    
                    echo "EN ESPERA DE SELECCION DE HOSPITAL";
                }
                
                
                ?>
                
            </td>   
            
		
		</tr>
	<?php 
	}
	 ?>
 
 
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
