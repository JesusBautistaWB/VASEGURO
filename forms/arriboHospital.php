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
    
   <script type="text/javascript">     
        if((localStorage.getItem('sessionValue') == "")){
            window.location= "../VistasVaseguro/loginVS/indexvaseguro.html" ;
        }
       
       function pregunta(){
    if (confirm('¿Confirmar el arribo del paciente?')){
       document.arrHosForm.submit();
    }
}
    </script>  
</head>

     
    
<body>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">
        
        <?php   
        $idAcc = $_GET['idAcc'];
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
      
		$sql1="SELECT idAcc,FolioAccidente,FolioAccidentado  FROM vasegurobd.tb_accidentes WHERE  idAcc = ".$idAcc."  LIMIT 0,1;";
          
          
		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form id="arrHosForm" action ="../functions/confirmarArribo.php?idAcc=<?php echo $mostrar['idAcc']; ?>" method="post" >   
          <div class="col-1"> <span class="textSectionInf"> ARRIBO DE PACIENTE A HOSPITAL</span> </div>  
          <div class="col-1"><label><br></label></div>
          <div class="col-3">
          <label>
          <input   name="idUsuario" id="idUsuario" readonly>
          <script>
          document.getElementById("idUsuario").value = localStorage.getItem('sessionValue');
          </script>
              </label> 
       
             
      </div>
       
        <div class="col-3">
           <label>
               <input id="nombreUsuario" name="nombreUSuario" readonly>
          <script>
          document.getElementById("nombreUsuario").value = localStorage.getItem('nombreUsuario');
          </script> 
           
           
           </label>
    
      </div>
    
      
      <div class="col-3">
      
              <label>
          <input  placeholder="<?php 
  $fechaActual = date('Y-m-d');
  
  echo $fechaActual;
                               ?>" name="fechaHoy" id="fechaHoy"  readonly>
       
          </label>
      
      </div>
             <?php 
            
                
                echo "
                
                <div class='col-1'><span class='accdet'>FOLIO DE APROBACION DEL ACCIDENTE:</span></div> 
               <center> <div class='col-1'><span  style='font-size: 35px; block: inline;'>".$mostrar['FolioAccidente']."</span></div> </center>
              
                ";
                   
            
            
            
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
                     <center><button id="send" class="submitbtn" type="submit" onclick="pregunta()" style="width: 150; font-size: 12px; background: #246355;">CONFIRMAR EL ARRIBO</button> </center>

             <center><button id="buttonDetAcc" class="submitbtn" type="button" onclick="detallesAccidente()" style="width: 150; font-size: 12px;">VER DETALLES DEL ACCIDENTE</button> <br><br> </center>
            <center><button id="ocDetAcc" class="submitbtn" type="button" onclick="ocultarDetallesAccidente()" style="width: 150; font-size: 12px; display: none; background: darkred;">OCULTAR DETALLES</button></center>
        <div class="col-1"><label></label></div>
          
          <div class='col-1' id="detallesAccT" style="display: none;">    
       <?php echo "<span class='textSectionInf'>ACCIDENTE CON EL ID:  <u>".$mostrar['idAcc']."</u></span>"; ?>
              </div>
          
          
        <div class='col-2' id="detallesAcc" style="display: none; ">    
     <center><span class="textOption" style="text-align: left; margin-left: 20px">
     <?php echo   
        
        "<br><b>Reportante:</b> ".$mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor'].
        "<br><b>Puesto de reportante:</b>".$mostrar['puestoReportante']. 
        "<br><b>Telefono:</b> ".$mostrar['telefonoReportante'].
        "<br><b>Fecha de accidente:</b> ".$mostrar['fechaRepor'].
        "<br><b> Escuela: </b>  ".$mostrar['nombreEscuela'].
        "<br><b>Estabilidad del Accidentado:</b> ".$mostrar['estabilidad'].
        
        "<br><b> Tipo de Accidente:</b> ".$mostrar['idTipoDeAccidente'].
        "</acc><br><br><b> Fecha y hora del Accidente:</b> ".$mostrar['fechaHoraAccidente'];
        ?>
            </span></center> </div>
              
          <div class='col-2' id="detallesAcc2" style="display: none; ">  
         <center><span class="textOption"><?php echo 
               
        
        "<br><b>PERSONA ACCIDENTADA:</b> <ac style='color: #2C4A9A; font-size: 14px; '><u>".$mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA'].
        "</u></ac> <br><b>GRADO ESCOLAR: </b>".$mostrar['GradoEscolarA'].         
        " <br><b>PROCEDENCIA: </b> ".$mostrar['estado'].
        "<br> <b>FECHA DE NACIMIENTO: </b> ".$mostrar['FechaNacimientoA'].
        " <br><b>DOMICILIO: </b> ".$mostrar['AlcaldiaMunicipio'].", <br>".$mostrar['Colonia'].", ".$mostrar['CalleA'].
        "<br><b>NOMBRE DE RESPONSABLE: </b> ".$mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes'].
        "<br><b>CONTACTO:</b> ".$mostrar['telFiRes']." / ".$mostrar['telCelRes']."<div class='col-1'><label><br></label></div>";
        
          
          ?></span></center></div>  
    
    <div class="col-1"><label><input type="hidden" id="foAcc" value="<?php echo $mostrar['FolioAccidente'];  ?>" > </label></div>
          <script>


var palabra = $('#foAcc').val();
    
    $.ajax({
    url: '../functions/lesTab.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#lestab').show();
      $('#lestab').html(data);
              
              
    }
  });
          </script>
          <div class="col-1" id="lesArr" style="display: none;">
        
        <span class="textSectionPEN"style="font-size: 14px;">LESIÓNES OCURRIDAS EN EL ACCIDENTE:</span>
        <table id="lestab"></table></div>
         <?php } ?>
    
      
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 