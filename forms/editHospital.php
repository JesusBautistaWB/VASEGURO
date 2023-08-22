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
   

    
   
</head>

     
    
<body>
<div class="header">
  
  <center>         
     <?php 
      
 include("../functions/phpfunctions.php");
  menuMed("EDICION HOSPITAL");
  ?>
   
 </center>

  </div>

      <div id="wrapper">
      <div class="limiter">
  
				<div class="container-login100" style="background:#708090;">

        
        
        <?php   
        $id = $_GET['id'];
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");
      
		$sql1="SELECT * FROM vasegurobd.cat_hospitales WHERE idHospital= ".$id;

		$result1=mysqli_query($conexion,$sql1);
		while($mostrar=mysqli_fetch_array($result1)){

		 ?>
        
      <form id="arrHosForm" action ="../functions/guardarCambiosHospital.php?idAcc=<?php echo $mostrar['idAcc']; ?>" method="POST" enctype="multipart/form-data">  
      <div class="col-1">
          <label>
          <input   name="idHospital" id="idHospital" value="<?php echo $mostrar['idHospital']; ?>" readonly> 
          
              </label>
              </div> 
     

      <div class="col-1">
          <label>
          <input   name="hospital" id="hospital" style="border:none; " class="ace" readonly> 
          <script>
          document.getElementById("hospital").value = localStorage.getItem('nombreUsuario');
          </script>
              </label>
              </div> 
              <span class="textSection">DATOS DEL HOSPITAL </span>

              <div class="col-2">
                <label>NOMBRE DEL HOSPITAL:
                <input id="nombreClinicaHospital" name="nombreClinicaHospital" value="<?php echo $mostrar['nombreClinicaHospital']; ?>">
    </label>
    </div>


    <div class="col-2">
                <label>CALLE DEL HOSPITAL:
                <input id="calleHospital" name="calleHospital" value="<?php echo $mostrar['calleHospital']; ?>">
    </label>
    </div>

    <div class="col-2">
                <label>DELEGACION DEL HOSPITAL:
                <input id="delegacionHospital" name="delegacionHospital" value="<?php echo $mostrar['delegacionHospital']; ?>">
    </label>
    </div>

    <div class="col-2">
                <label>TELEFONO DEL HOSPITAL:
                <input id="telefonoHospital" name="telefonoHospital" value="<?php echo $mostrar['telefonoHospital']; ?>">
    </label>
    </div>

    <div class="col-2">
                <label>HORARIO DE ATENCION:
                <input id="horarioAtencion" name="horarioAtencion" value="<?php echo $mostrar['horarioAtencion']; ?>">
    </label>
    </div>

    <div class="col-2">
                <label>REFERENCIAS DEL HOSPITAL:
                <input id="referenciasHospital" name="referenciasHospital" value="<?php echo $mostrar['referenciasHospital']; ?>">
    </label>
    </div>

    
    <div class="col-2">
                <label>CORREO ELECTRONICO:
                <input id="Correo" name="Correo" value="<?php echo $mostrar['Correo']; ?>">
    </label>
    </div>

    <span class="textSection">ESPECIALIDADES </span>


    <div class="col-4">
                <label>NEUROLOGIA:
                <select id="conNeurologia" name="conNeurologia" >
                <option><?php
                if ($mostrar['conNeurologia']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conNeurologia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Con cirugia general:
                <select id="conCirugiaGeneral" name="conCirugiaGeneral" >
                <option><?php
                if ($mostrar['conCirugiaGeneral']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conCirugiaGeneral']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Con cirugia cardiotoracica:
                <select id="conCirugiaCardiotoracica" name="conCirugiaCardiotoracica" >
                <option><?php
                if ($mostrar['conCirugiaCardiotoracica']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conCirugiaCardiotoracica']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Con cirugia neurologica:
                <select id="conCirugiaNeurologica" name="conCirugiaNeurologica" >
                <option><?php
                if ($mostrar['conCirugiaNeurologica']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conCirugiaNeurologica']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Pediatria:
                <select id="pediatria" name="pediatria" >
                <option><?php
                if ($mostrar['pediatria']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['pediatria']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>



    <div class="col-4">
                <label>Cirugia Plastica:
                <select id="cirugiaPlastica" name="cirugiaPlastica" >
                <option><?php
                if ($mostrar['cirugiaPlastica']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['cirugiaPlastica']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>



  <div class="col-4">
                <label>Odontologia:
                <select id="odontologia" name="odontologia" >
                <option><?php
                if ($mostrar['odontologia']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['odontologia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>

    <div class="col-4">
                <label>Oftamologia:
                <select id="oftamologia" name="oftamologia" >
                <option><?php
                if ($mostrar['oftamologia']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['oftamologia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Dermatologia:
                <select id="dermatologia" name="dermatologia" >
                <option><?php
                if ($mostrar['dermatologia']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['dermatologia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Con traumatologia ortopedia:
                <select id="conTraumatologiaOrtopedia" name="conTraumatologiaOrtopedia" >
                <option><?php
                if ($mostrar['conTraumatologiaOrtopedia']== "0"){
                  echo "NO";
                } else { echo "<b>SI</b>";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conTraumatologiaOrtopedia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Procedimientos Quirurgicos:
                <select id="procedimientosQuirurgicos" name="procedimientosQuirurgicos" >
                <option><?php
                if ($mostrar['procedimientosQuirurgicos']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['procedimientosQuirurgicos']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    <div class="col-4">
                <label>Fisioterapia y Rehabilitacion:
                <select id="fisioterapiaRehabilitacion" name="fisioterapiaRehabilitacion" >
                <option><?php
                if ($mostrar['fisioterapiaRehabilitacion']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['fisioterapiaRehabilitacion']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>

    <div class="col-4">
                <label>Tomografia:
                <select id="conTomografia" name="conTomografia" >
                <option><?php
                if ($mostrar['conTomografia']== "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conTomografia']== "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>



    <div class="col-4">
                <label>Rayos X:
                <select id="conRayosX" name="conRayosX" >
                <option><?php
                if ($mostrar['conRayosX'] == "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['conRayosX'] == "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>

    <div class="col-4">
                <label>Manda TCE:
                <select id="mandaTCE" name="mandaTCE" >
                <option><?php
                if ($mostrar['mandaTCE'] == "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['mandaTCE'] == "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>


    
    <div class="col-4">
                <label>Ambulatorio:
                <select id="ambulatorio" name="ambulatorio" >
                <option><?php
                if ($mostrar['ambulatorio'] == "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['ambulatorio'] == "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>

     
    <div class="col-4">
                <label>Otorrinolaringologo:
                <select id="otorrino" name="otorrino" >
                <option><?php
                if ($mostrar['otorrino'] == "0"){
                  echo "NO";
                } else { echo "SI";
                }
                ?></option>

  <option><?php 
                if ($mostrar['otorrino'] == "0"){
                  echo "SI";
                } else { echo "NO";
                }
                ?></option>
    </select>
    </label>
    </div>



  


    <span class="textSection">ESTADO DE HOSPITAL</span>

    <div class="col-1">
                <label> TIPO DE SERVICIO:</label>
                <label style="color: darkred; font-size: 12px;">
                  C = Consultorio<br>
                  H = Hospital<br>
                  B = Dado de baja(No aparecera para ser seleccionado)
                  
                <select id="tipoDeServicio" name="tipoDeServicio" >
                <option><?php
                echo $mostrar['tipoDeServicio'] ;
               
                ?></option>
                <option>H</option>
                <option>C</option>
                <option>B</option>

  
    </select>
    </label>
    </div>


     
             <?php 
            
              
            }
                   
            ?>
	
         <div class="col-submit">
    <button class="submitbtn" >ENVIAR</button>
  </div>
  
     
        </form>
              
    
		
 
     

  </div>
          </div>
    </div>
          
        

</body>
       
</html>

 