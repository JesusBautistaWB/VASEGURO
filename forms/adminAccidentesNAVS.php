
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Rechazados VASEGURO</title>
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
         echo "<img src='../images/ATLAS1.PNG' height='60'  width='650'> <br> 
        <span class='titleHeader'>   AVISO DE ACCIDENTE | RECHAZADOS </span>";
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>
   </center>

    </div>
     

  
    
    
    
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#708090;">
        <div class="col-1"><span class="accdet"> SELECCIONE EL FOLIO DE APROBACION O EL ID DE ACCIDENTE  PARA VISUALIZAR LOS DATOS CORRESPODIENTES AL ACCIDENTE QUE NO FUE CUBIERTO</span></div>

 
      
       <div id="div1">
	<table border="1">
	   
		<tr>
		     <thead>
			<td>ID</td>
             <td>Fecha Accidente</td>
                 <td>Fecha Reporte</td>
            <td >Estatus</td>
			<td>Apellido Paterno del Accidentado/a</td>
			<td>Apellido Materno</td>
			<td>Nombre(S)</td>
			
			<td>Escuela de procedencia</td>
                 <td>Motivo de Rechazo</td>
                
			
			</thead>
		</tr>
        
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT idAcc,FolioAccidente,PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, ACCT.idEstatus, nombreEscuela, idHospital, idRiesgoEx,fechaHoraAccidente, fechaRepor FROM vasegurobd.tb_accidentado ACT ,
vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
 AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND ACCT.idEstatus in('4','12','2') ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr>
            <td><a href='detallesAccidenteRE.php?idAcc="<?php echo $mostrar['idAcc'] ?>"'  method= "POST"><?php echo $mostrar['FolioAccidente'] ?></a></td>
            <td><?php echo $mostrar['fechaHoraAccidente'] ?></td>
            <td><?php echo $mostrar['fechaRepor'] ?></td>
            <td class='<?php 
              if ($mostrar['idEstatus'] =="12"){ echo "rec"; }
              if ($mostrar['idEstatus'] =="2"){ echo "dup"; } 
              if ($mostrar['idEstatus'] =="4"){ echo "rec"; }
                
                
                ?>'><?php echo $mostrar['nombreEstatus'] ?></td>
            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
			<td><?php echo $mostrar['SegundoApellidoA'] ?></td>
			<td><?php echo $mostrar['NombreA'] ?></td>
			
			<td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['idRiesgoEx'] ?></td>
            
		
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
        

</body>
       
</html>
