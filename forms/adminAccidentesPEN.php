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
        <span class='titleHeader'>   AVISO DE ACCIDENTE | PENDIENTES </span>";  
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
      <div class="col-1"><span class="accdet"> SELECCIONE EL FOLIO DE APROBACION PARA COMPLETAR LOS DATOS PENDIENTES</span></div>
 
      
       <div id="div1">
	<table border="1" id="penTable">
	   
		<tr>
		     <thead>
            <td>ID</td>
			<td>Folio de URGENCIA</td>
            <td>Fecha Accidente</td>
			<td>Primer Apellido</td><td>Segundo Apellido</td><td>Nombre(s)</td>
            <td>Escuela</td>
            <td>EXPORTAR</td>
                
			
			</thead>
		</tr>
        
        <?php      
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
		$sql="SELECT idAcc,ACCT.FolioAccidente,PrimerApellidoA,SegundoApellidoA, NombreA, nombreEstatus, ACCT.idEstatus, nombreEscuela, idHospital, fechaHoraAccidente, fechaRepor, nombreUrgAmb  FROM vasegurobd.tb_accidentado ACT ,
vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC WHERE ACCT.idEstatus = ES.idEstatus
 AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND ACCT.idEstatus=9  ORDER BY fechaRepor DESC;";
		$result=mysqli_query($conexion,$sql);

		while($mostrar=mysqli_fetch_array($result)){
		 ?> 

		<tr >
            <td><?php echo $mostrar['idAcc'] ?></td> 
            <td class="pen"><b> <?php echo $mostrar['FolioAccidente']; ?></b> </td> 
            <td><?php echo $mostrar['fechaRepor'] ?></td> 
            <td><b><?php echo $mostrar['PrimerApellidoA'] ?></b></td>
            <td><b><?php echo $mostrar['SegundoApellidoA'] ?></b></td>
            <td><b><?php echo $mostrar['NombreA'] ?></b></td>
            <td><?php echo $mostrar['nombreEscuela'] ?></td>
            <td> <?php echo "<a href='llenarDatosPendientes.php?idAcc=".$mostrar['idAcc']."' method='get'>CONTINUAR LLENADO DE INFORMACION</a>"; ?></td>
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
  <div class='col-1'>
  
  <img src='../images/botonexcel.jpg' onclick='fnExcelReport()' height='60'  width='75' style='border-radius: 15px; filter: drop-shadow(0 2px 5px rgba(0, 0, 0, 0.7));'>
  
  <script>
function fnExcelReport()
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById('penTable'); // id of table

    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<A[^>]*>|<\/A>/g, "");//remove if u want links in your table
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); // remove if u want images in your table
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); // reomves input params
    tab_text= tab_text.toUpperCase();

    var ua = window.navigator.userAgent;
    var msie = ua.indexOf("MSIE "); 

    if (msie > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./))      // If Internet Explorer
    {
        txtArea1.document.open("txt/html","replace");
        txtArea1.document.write(tab_text);
        txtArea1.document.close();
        txtArea1.focus(); 
        sa=txtArea1.document.execCommand("SaveAs",true,"Say Thanks to Sumit.xls");
    }  
    else                 //other browser not tested on IE 11
        sa = window.open('data:application/vnd.ms-excel,' + encodeURIComponent(tab_text));  

    return (sa);
}
  </script>
  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
