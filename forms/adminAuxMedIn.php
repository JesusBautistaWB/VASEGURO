<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>VASEGURO</title>
  <script type="text/javascript" src="js/securityMedAux.js"></script>
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
       echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
        ";  ?> 
         <span style="
         font-family: fantasy;
         border: none;
  font-size: 30px;
  color:  #2C4A9A;
  line-height: 1.2;
  text-align: center;
  text-transform: uppercase;
  text-shadow: 1px 2px #999;
  display: inline;
    margin: auto;" id="labelNOM" name="labelNOM" >
PERFIL ANALISTA DE SINIESTROS
    </span>
     <?php  
   include("../functions/phpfunctions.php");
    menuMedAux();
    ?>
   </center> 
    </div>
      <div id="wrapper">
      <div class="limiter">
    
				<div class="container-login100"  style="background:#985E6B;">
               
 
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

              
      <div class="col-1">
      
      <label>
     
      <input readonly style="background: #088BB9; font-size: 11px; color: white;"
value=" INGRESE EL FOLIO ESPECIFICO DEL ACCIDENTE QUE REQUIERA:">
  
  <input  placeholder="BUSQUEDA POR FOLIO" onkeyup="buscarFolioS()" onchange="buscarFolioS()"
  name="folioBus" id="folioBus" style="background: white; color: black; font-size: 12px">

  </label>
</div>

      


       <div id="div1">
       
	<table border="1" id="adminTable" name="adminTable">
    <tr>
        <thead>
       <td colspan="8">ACCIDENTES CON SOLICITUDES REGISTRADAS </td>
       
       
       </thead>
   </tr>
        <tr>
        <thead>
       <td>Folio </td>
       <td>Accidentado/a</td>
       <td>Hospital</td>
       <td>MONTO AUTORIZADO</td>
       <td>Fecha de Ultima Solicitud</td>
       <td><b>COMPLETAR DATOS</b></td>
       <td># de Solicitudes</td>
       <td>DETALLES ACCIDENTE</td>
     
       
       </thead>
   </tr>

    <?php
 
$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");

      



        $sql="SELECT DISTINCT SA.folioAccidenteServicio, AC.montoAuSol, AC.ultimaFechaSolicitud,
        ACCI.PrimerApellidoA, ACCI.SegundoApellidoA, ACCI.NombreA, AC.idHospital, ac.idAcc, folioSiniestro
        FROM vasegurobd.tab_serviciosadicionales SA, vasegurobd.tb_accidentes AC, vasegurobd.tb_accidentado ACCI  
        WHERE AC.FolioAccidente = SA.folioAccidenteServicio
        AND AC.FolioAccidentado = ACCI.FolioAccidentado
        ORDER BY fechaSolicitud DESC";
        
		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){
  ?>
	<tr>
           
            <td class="ace"><?php echo $mostrar['folioAccidenteServicio'] ?></td> 
            <td  ><?php echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'] ?></td></td>
            <td><b><?php echo $mostrar['idHospital'] ?></b></td></td>
            

            <?php montoAprobado($mostrar['folioAccidenteServicio']); ?>

<?php ultimaFecha($mostrar['folioAccidenteServicio']); ?>


    <td><a href ="adminAuxMed.php?idAcc=<?php echo $mostrar['folioAccidenteServicio']; ?>"> 
    
            <button style="width: 115; font-size: 10px; background: darkblue;">1 REVISAR SOLICITUDES</button></a></td>
            <td><?php 
            $fa = $mostrar['folioAccidenteServicio'];
            numeroSolicitudes($fa); ?></td>
            <td><a href ="detallesAccidenteMedAux.php?idAcc=<?php echo $mostrar['idAcc']?>">
            VER
            </a></td>
            
   
            	
		</tr>

  <?php
      

}


?>  
		
           </table>
 
     

  </div>

  
  <div class='col-1'>

  <script>

function fnExcelReport(idTable)
{
    var tab_text="<table border='2px'><tr bgcolor='#87AFC6'>";
    var textRange; var j=0;
    tab = document.getElementById(idTable); 
    for(j = 0 ; j < tab.rows.length ; j++) 
    {     
        tab_text=tab_text+tab.rows[j].innerHTML+"</tr>";
        //tab_text=tab_text+"</tr>";
    }

    tab_text=tab_text+"</table>";
    tab_text= tab_text.replace(/<a href[^>]*>|<\/a>/g, "");
    tab_text= tab_text.replace(/<img[^>]*>/gi,""); 
    tab_text= tab_text.replace(/<input[^>]*>|<\/input>/gi, ""); 
 
    var link = document.getElementById('link'),
        nombre = "totalAccidentes <?php 

$time = time();
$fechaHoy = date('Y-m-d', $time);
$hora = date("H:i:s", $time);
$fechaID = $fechaHoy." ".$hora;
echo $fechaID;
?>";

    link.href='data:application/vnd.ms-excel,' + encodeURIComponent(tab_text);
    link.download=nombre;
    link.click();
    
}
  </script>
  <div id="div1">
   

    

 </div>
  </div>
        
          </div>
          </div>
    </div>
</body>
       
</html>
