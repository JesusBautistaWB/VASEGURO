
<html lang="en-US">
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Administracion VASEGURO</title>
  <meta name="author" content="Jake Rocheleau">
  <link rel="shortcut icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  <link rel="icon" href="http://static.tmimgcdn.com/img/favicon.ico">
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
    
   <script type="text/javascript">     
        if((localStorage.getItem('sessionValue') == "")){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
        }
    </script>  
</head>

     
    
<body>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">
        
        <?php   
        $alcaldia="";
        $idAcc = $_GET['idAcc'];
        $h1 = "";
        $h2 = "";
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
      
		$sql1="SELECT idAcc,hospitalesSugeridos FROM vasegurobd.tb_accidentes WHERE  idAcc = ".$idAcc."  LIMIT 0,1;";
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form action ="../functions/insertarHospital.php?idAcc=<?php echo $mostrar['idAcc']; ?>" method="post" >   
          <div class="col-1"> <span class="textSectionInf"> SELECCIONE UNA SUGERENCIA DE HOSPITAL</span> </div>  
          <div class="col-1"><label><br></label></div>
      
             <?php 
            
           $sug = $mostrar['hospitalesSugeridos'];
           $sugerencias = explode(",", $sug);
            
            
                
                echo "<br>
                <div class='col-2'><fieldset><center><br><p><input type='radio' name='nombreHospital' value='$sugerencias[0]' required><span  style='font-size: 20px; block: inline;'>".$sugerencias[0]."</span></p></fieldset></div> 
                <div class='col-2'><fieldset><center><br> <p><input type='radio' name='nombreHospital' value='$sugerencias[1]' required><span  style='font-size: 20px; block: inline;'>".$sugerencias[1]."</span></p></fieldset></div><br>
                ";
               $h1 = $sugerencias[0];  
               $h2 = $sugerencias[1];            
            
            
            
        }
                    	$sql2="SELECT * FROM vasegurobd.cat_hospitales  WHERE   nombreClinicaHospital = '$h1'  LIMIT 0,1;";
                    $result2=mysqli_query($conexion,$sql2);
       
		             while($mostrar=mysqli_fetch_array($result2)){
                        echo "<div class = 'col-2'>
                         <center><span style='font-size: 14px; block: inline; text-align: justify;'> 
                         <a href='https://www.google.com/maps/place/".$mostrar['calleHospital']." ".$mostrar['delegacionHospital']."' target='_blank'>".$mostrar['calleHospital'].",".$mostrar['delegacionHospital']."<br></a> ".$mostrar['telefonoHospital']."</span></center></div>";
                     }
                    
                 	    $sql3="SELECT * FROM vasegurobd.cat_hospitales  WHERE   nombreClinicaHospital =  '$h2'  LIMIT 0,1;";
                    $result3=mysqli_query($conexion,$sql3);
                  
                    
                        
		             while($mostrar=mysqli_fetch_array($result3)){
                         echo "<div class = 'col-2'>
                         <center><span style='font-size: 14px; block: inline; text-align: justify'>
                         <a href='https://www.google.com/maps/place/".$mostrar['calleHospital']." ".$mostrar['delegacionHospital']."' target='_blank'>".$mostrar['calleHospital'].",".$mostrar['delegacionHospital']."<br></a> ".$mostrar['telefonoHospital']."</span></center></div>";
                    
                     }
                    
          
            
            
            $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, hospitalesSugeridos, sintomas, regionRDCA, intensidadAccidente,
                   idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, alcaldiaEscuela, ES.nombreEstatus,
                         PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, AlcaldiaMunicipio, ACT.Colonia, CalleA, 
                                FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes
                                              FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
                                                        WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
                                                        AND idAcc = ".$idAcc." AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
             ?> 
          
          
          <div class="col-1"><label><br></label></div>
             <center><button id="buttonDetAcc" class="submitbtn" type="button" onclick="detallesAccidente()" style="width: 150; font-size: 12px;">VER DETALLES DEL ACCIDENTE</button> <br><br> </center>
            <center><button id="ocDetAcc" class="submitbtn" type="button" onclick="ocultarDetallesAccidente()" style="width: 150; font-size: 12px; display: none; background: darkred;">OCULTAR DETALLES</button></center>
        <div class="col-1"><label></label></div>
          
          <div class='col-1' id="detallesAccT" style="display: none;">    
       <?php echo "<span class='textSectionInf'>ACCIDENTE CON EL ID:  <u>".$mostrar['idAcc']."</u></span>"; ?>
              </div>
          
          
        <div class='col-2' id="detallesAcc" style="display: none;">    
     <center><span class="textOption"><?php echo   
        
        "<br><b>Reportante:</b> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor'].
        "<br><b>Puesto de reportante:</b>".$mostrar['puestoReportante']. 
        "<br><b>Telefono:</b> ".$mostrar['telefonoReportante'].
        "<br><b>Fecha de accidente:</b> ".$mostrar['fechaRepor'].
        "<br><b> Escuela: </b>  ".$mostrar['nombreEscuela'].
        "<br><b>Estabilidad del Accidentado:</b> ".$mostrar['estabilidad'].
        "<acc style='color: red;'><br><b> Region del Cuerpo Afectada: </b>".$mostrar['idRDCA'].", ".$mostrar['regionRDCA'].
        "<br><b> Tipo de Accidente:</b> ".$mostrar['idTipoDeAccidente'].
        "<br><b>LUGAR:</b> ".$mostrar['idLugarAccidente'].
        "<br><b>SINTOMAS:</b> ".$mostrar['sintomas'].
        "<br><b>INTENSIDAD:</b> ".$mostrar['intensidadAccidente'];?>
            </span></center> </div>
              
          <div class='col-2' id="detallesAcc2" style="display: none;">  
         <center><span class="textOption"><?php echo 
               
        "</acc><br><br><b> Fecha y hora del Accidente:</b> ".$mostrar['fechaHoraAccidente'].
        "<br><b>PERSONA ACCIDENTADA:</b> <ac style='color: #2C4A9A; font-size: 14px; '><u>".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'].
        "</u></ac> <br><b>GRADO ESCOLAR: </b>".$mostrar['GradoEscolarA'].         
        " <br><b>PROCEDENCIA: </b> ".$mostrar['estado'].
        "<br> <b>FECHA DE NACIMIENTO: </b> ".$mostrar['FechaNacimientoA'].
        " <br><b>DOMICILIO: </b> ".$mostrar['AlcaldiaMunicipio'].", <br>".$mostrar['Colonia'].", ".$mostrar['CalleA'].
        "<br><b>NOMBRE DE RESPONSABLE: </b> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes'].
        "<br><b>CONTACTO:</b> ".$mostrar['telFiRes']." / ".$mostrar['telCelRes']."<div class='col-1'><label><br></label></div>";
        
          
          ?></span></center></div>  
    
            <center><button id="send" class="submitbtn" type="submit"  style="width: 150; font-size: 12px; background: #246355;">ENVIAR</button> </center>
          
          <div class="col-1"><label></label></div>
         <?php } ?>
    
      
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>
