<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Aprobados VASEGURO</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
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
        <span class='titleHeader'>   AVISO DE ACCIDENTE | APROBADOS </span>";  
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100" style="background:#708090;">
        <div class="col-1"><span class="accdet"> SELECCIONE EL FOLIO DE APROBACION PARA VISUALIZAR LOS DATOS CORRESPONDIENTES</span></div>
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
	<table border="1">
	   
		<tr>
		     <thead>
			<td>FOLIO DE APROBACION </td>
            <td>FECHA ACCIDENTE</td>
            <td>FECHA REPORTE</td>
            <td>ESTATUS</td>
			<td>APELLIDO PATERNO ACCIDENTADO/A</td>
			<td>APELLIDO MATERNO</td>
			<td>NOMBRE(S)</td>
			
			<td>ESCUELA DE PROCEDENCIA</td>
                 <td>HOSPITAL SELECCIONADO</td>
                 <td>EXPORTAR</td>
                
			
			</thead>
		</tr>
        
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT idAcc,ACCT.FolioAccidente,PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, ACCT.idEstatus, nombreEscuela, idHospital, fechaHoraAccidente, fechaRepor  FROM vasegurobd.tb_accidentado ACT ,
vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
 AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND ACCT.idEstatus in('3','11') ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?>

		<tr >
            <td class='<?php echo ($mostrar['nombreEstatus']=="DUPLICADO")?'rec':'no' ?>'><a href='detallesAccidente.php?idAcc="<?php echo $mostrar['idAcc'] ?>"'  method= "POST"><?php echo $mostrar['FolioAccidente'] ?> </a></td>
            <td class='<?php echo ($mostrar['nombreEstatus']=="DUPLICADO")?'rec':'no' ?>'><?php echo $mostrar['fechaHoraAccidente'] ?></td> 
            <td class='<?php echo ($mostrar['nombreEstatus']=="DUPLICADO")?'rec':'no' ?>'><?php echo $mostrar['fechaRepor'] ?></td>
             <td class='<?php 
              if ($mostrar['idEstatus'] =="12"){ echo "rec"; }
              if ($mostrar['idEstatus'] =="11"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="2"){ echo "rec"; } 
            if ($mostrar['idEstatus'] =="3"){ echo "nuevo"; }
                
                
                ?>'> <?php echo $mostrar['nombreEstatus'] ?></td>
            <td><?php echo $mostrar['PrimerApellidoA'] ?></td>
			<td><?php echo $mostrar['SegundoApellidoA'] ?></td>
			<td><?php echo $mostrar['NombreA'] ?></td>
			
			<td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td><?php echo $mostrar['idHospital'] ?></td>
            <td> 
               <?php if(($mostrar['FolioAccidente']) == ""){
                  echo "NO DISPONIBLE";
            }else{
                  echo "<a href='pdfdet.php?idAcc=".$mostrar['idAcc']."' method='get'>Generar PDF</a>";
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
