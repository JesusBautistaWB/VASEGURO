<html >
<head>
  
  <meta http-equiv="Content-Type" content="text/html">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
  <style>
h4, h5 {
    margin:3;
    font: 80% sans-serif;

}
table, th, td {
  border: 1px solid black;
    border-collapse: collapse;
    font-size:12px;
    font: 60% sans-serif;
    width: 100%;
}
.noborder{
    border: 1px solid white;

}
.textTiny {
    font: 70% sans-serif;
    text-align: justify;
    font-size: 12px;
    
}
.textTinyEn, ul {
    text-align: left;
    font-size: 12px;
    font: 60% sans-serif;
    
}

title{
font-size: 13px;

}

ul {
  
    font-size:12px;
    font: 70% sans-serif;
    width: 100%;
}
</style>
   
     
</head>
<body>
      <img src="TITULOS.png" height="90" width="650">
      <form>
  
        <?php      
        $idAcc = $_GET['idAcc'];
       
		$conexion = mysqli_connect('localHost','root','Q1w2e3r4.','vasegurobd');
        $conexion -> set_charset("utf8");


          
		$sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
        regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
            ACCT.correoEscuela, ACCT.correoResponsable, descRepor, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc,
             conceptoServicio, costoServicio, medicoRevisor
            FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.tab_serviciosadicionales SS
            WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
            AND idAcc = ".$idAcc."  AND ACCT.idEscuela=ESC.idEscuela 
            AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";
          $foAcc="";
          
		$result=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result)){
            
		 ?>
       <center>
      
       <div class="col-1"><label><input type="hidden" id="foAcc" name="foAcc" value="<?php
        echo $mostrar['FolioAccidente'];  
        $foAcc=  $mostrar['FolioAccidente'];  
        ?>" > </label></div>
          <script>


var palabra = $('#foAcc').val();
    
   

 
  $.ajax({
    url: '../functions/serAdTabAp.php',
    type: 'POST',
    data: {palabra:palabra},
    success:function(data){
      $('#seradtab').show();
      $('#seradtab').html(data);
              
              
    }
  });


          </script>
           


<div class="col-2">
 <h4> <b>AUTORIZACION</b> </h4>
<h5> Poliza de Accidentes Personales "ESCOLAR" 2020</h5>
 

</div> 

<div class="col-1"> 
         
     <table>
               <td><b>No. Poliza:</b></td>
                   <td><b>Hospital/Clínica:</b> <?php echo $mostrar['idHospital']; ?></td>
                   <td><b>Fecha: </b><?php echo $mostrar['fechaRepor']; ?></td>
                   </table>
            

    </div> 


           
           <div class="1">
               
           <h5>Agradecemos la atención que se brinde al Alumno(a) y/o Personal Administrativo</h5>
        
        </div>
    
     <div class="col-1">
         <table >
         <tr>
                <td colspan="6" style="background: #BBB7B8;"><b>DATOS DEL ASEGURADO</b></td>
                         
               </tr>
               <tr>
                   <td colspan="6">Atender al Alumno/ Docente/ Administrativo:
                        <?php  echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?></td>
                         
               </tr>
       
               <tr>
                   <td><?php 
                   
                 if($mostrar['SexoA'] == "FEMENINO"){
                     echo "Sexo: M( )  F(x)";
                 } elseif ($mostrar['SexoA'] == "MASCULINO"){
                    echo "Sexo: M(x)  F( )";

                 }
                     
                   ?></td>
                   <td><?php 
                    $from = new DateTime($mostrar['FechaNacimientoA']);
                    $to   = new DateTime('today');
                    $edad= $from->diff($to)->y;
                     echo "Edad:".$edad." años";  
                       ?></td>
                   
                 
                   <td colspan="2">F.Nac:  <?php echo $mostrar['FechaNacimientoA']; ?>  </td>
                    <td>Grado: <?php echo intval(preg_replace('/[^0-9]+/', '', $mostrar['GradoEscolarA']), 10); 
                    
                    ?> </td><td>
<?php 
if($mostrar['poblacionAccidentado'] == "ALUMNADO"){
echo "DOCENTE( )  ALUMNO(x)";

}elseif($mostrar['poblacionAccidentado'] == "DOCENTE"){
    echo "DOCENTE(x)  ALUMNO( )";
    
    }

?>   
  </td> </tr>   
 <tr>
                 <td colspan="2"><b>¿De acuerdo a su cultura se considera indigena?</b> <br>
                 <?php echo $mostrar['indigenaAcc']; ?>
                 </td>
                 
                
                 <td colspan="2"><b>¿Habla alguna lengua indigena?</b> <br>
                 <?php echo $mostrar['dialectoAcc']; ?>
                 </td>
               
                 <td colspan="2"><b>¿Que lengua indigena habla?</b> <br>
                 <?php echo $mostrar['dialectoAccES']; ?>
                 </td>
                 
                 </tr>
                
                 <tr>
               <td colspan="6"><b>CURP:</b>
                <?php  echo $mostrar['curpAcc']; ?><br><br></td>
               </tr>
            
            

                    
      
      
               <tr>
               <td colspan="6"><b>Nombre y firma del Padre o Madre (si el afectado es menor de edad):</b>
                <?php  echo $mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']; ?><br><br></td>
               </tr>
            
             <tr>
                 <td colspan="6"><b>Domicilio del Asegurado afectado</b></td>
                 
                 </tr>
                 <tr> 
                 <td colspan="6"> Calle y número:  <?php echo $mostrar['CalleA']; ?></td>
                 </tr>
           
                <tr>
                    <td colspan="3">Colonia: <?php echo $mostrar['Colonia']; ?></td>
                    <td colspan="3">Delegacion: <?php echo $mostrar['AlcaldiaMunicipio']; ?></td>  
                </tr>
              
                <tr>
                <td colspan="2">Correo:<?php echo $mostrar['correoResponsable']?> </td>
                <td colspan="2">Telefono: <?php echo $mostrar['telFiRes']?></td>
                <td colspan="2">Telefono Celular: <?php echo $mostrar['telCelRes']?></td>
                    
                    </tr>
              <tr>
           <td colspan="6" style="background: #BBB7B8;"><b>DATOS DE lA ESCUELA</b></td>
</tr>
               <tr>
               
               <td colspan="6"><b>Nombre de la escuela: </b><?php echo $mostrar['nombreEscuela']; ?></td>
               </tr>
               <tr>
                   <td colspan="6">Domicilio: <?php 
                   $dir = explode(", ",  $mostrar['dirEscRepor'] );
                   echo $dir[0];

                   
                   
                   ?></td>
                   
               </tr>
                   <tr>

                   <td colspan="2">Delegación: <?php echo $mostrar['alcaldiaEscuela']; ?> </td>
                   <td >CP: <?php echo $mostrar['cpescuela']; ?></td>
                   <td >Telefono<br>: <?php echo $mostrar['telefonoEscuela']; ?></td>
                   <td colspan="2">Correo electronico <br>:<?php echo $mostrar['correoEscuela']?> </td>
                      
                   </tr>
         
          <tr>
               <td colspan="6">Lugar, fecha, hora del accidente: CDMX <br> <?php echo $mostrar['idLugarAccidente'].", ".$mostrar['fechaHoraAccidente']; ?></td>
               </tr>
               <tr>
                   <td colspan="6">Causa del accidente:  <?php echo $mostrar['descRepor'];?> <br><br> </td>
                
                </tr>
            
                <tr>
                   <td colspan="1">CIE 10  </td>
                   <td colspan="2">  </td>

                   <td colspan="1">CPT 4  </td>
                   <td colspan="2">  </td>
                
                </tr>
                <tr>
                   <td colspan="6">Monto autorizado para Hospital : $<b><?php echo $mostrar['costoServicio'];?></b>  <br><br> </td>
                
                </tr>
                <tr>
                   <td colspan="6">Estudios autorizados :   <br><br> </td>
                
                </tr>
                <tr>
           <td colspan="6" style="background: #BBB7B8;"><b>HONORARIOS AUTORIZADOS</b></td>
            </tr> 
            <tr>
            <td colspan="1" >CONSULTA</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
            <tr>
            <td colspan="1" >CIRUJANO</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
            <tr>
            <td colspan="1" >ANESTESIOLOGO</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
            <tr>
            <td colspan="1" >AYUDANTE</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
            <tr>
            <td colspan="1" >OTRO</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>

            <tr>
            <td colspan="1" >TERAPIAS</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
            <tr>
            <td colspan="1" >MEDICAMENTOS</td>
            <td colspan="2" >-</td>
            <td colspan="1" >AUTORIZADO</td>
            <td colspan="2" >$ </td>
            </tr>
</table>
            <?php
        }


        function conexion() { 
            return new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
       }
       
       
       $pdo = conexion();
       
       
       $sql = "SELECT * FROM vasegurobd.tab_serviciosadicionales WHERE folioAccidenteServicio = '$foAcc' AND estadoSolicitud = 'APROBADA' ";
       
       $query = $pdo->prepare($sql); 
       
       $query->execute();
       $lista = $query->fetchAll();
       
       echo '<table><thead><tr>
       <td ><b>CONCEPTO</b></td> 
       <td><b> COSTO</b> </td>
       <td> ESTATUS </td>
       <td> HOSPITAL </b> </td>
       
       <td> COMENTARIO</td>
       <td> RESPUESTA</td>
       <td> FECHA SOLICITUD</td>
       <td> FECHA RESPUESTA</td>
       </tr></thead>';
       
       $total = "";
       foreach ($lista as $milista) {
           echo '
          <tr>
           <td class="ace"><b>'.$milista['conceptoServicio'].'</b></td>';
           
       
       
       
               echo ' <td class ="';
       
               if ($milista['costoServicio'] < 50000 ){
                   echo 'pen';
               }
       
               elseif ($milista['costoServicio'] >= 50000 AND $milista['costoServicio'] < 100000){
                   echo 'enhos';
               }
               
               elseif ($milista['costoServicio'] >= 100000){
                   echo 'dup';
               }
               
               
               
              echo '"><b>$ '.$milista['costoServicio'].'</b> </td>';
        
           
           
           
       if ($milista['estadoSolicitud'] == 'APROBADA'){
           echo ' <td class="pen"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
       }
       
       if ($milista['estadoSolicitud'] == 'NUEVO') {
           echo ' <td class="ace"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
       }
       if ($milista['estadoSolicitud'] == 'RECHAZADA'){
           echo ' <td class="rec"> <b>'.$milista['estadoSolicitud'].' </b> </td>';
       }
          
          
          echo '<td class="enhos"> <b>'.$milista['hospitalOrigen'].'</b> </td>';
       
          
           if ($milista['comentarioAcc'] == ''){
               echo '<td class="dup"> <b> SIN COMENTARIOS </b> </td>';
           }else{
               echo '<td> <b>'.$milista['comentarioAcc'].'</b> </td>';  
           }
       
       
       
           if ($milista['comentarioMed'] == ''){
               echo '<td class="egr"> <b> EN ESPERA </b> </td>';
           }else{
               echo '<td> <b>'.$milista['comentarioMed'].'</b> </td>';  
           }
       
       
       if ($milista['estadoSolicitud'] == 'APROBADA'){
           $total = $total + $milista['costoServicio'];
       }
       
       echo '<td> <b>'.$milista['fechaSolicitud'].'</b> </td>'; 
       
       if ($milista['fechaRespuesta'] == ''){
           echo '<td class="dup"> <b> EN ESPERA </b> </td>';
       }else{
           echo '<td> <b>'.$milista['fechaRespuesta'].'</b> </td>';  
       }
       
           
          echo '</tr>';
          
       
       }
       
       echo '</table>
       <table><tr>
       <td class="rec">TOTAL:</td>
       <td class="';
       
       if ($total < 50000 ){
           echo 'pen';
       }
       
       if ($total >= 50000){
           echo 'enhos';
       }
       if ($total >= 100000){
           echo 'rec';
       }
       
       
       
       echo '" style="font-size: 18px"> <b>$'.$total.'</b></td>
       
       </tr></table>';

       $sql2="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
       regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
           telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
           idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
           PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
           FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
           ACCT.correoEscuela, ACCT.correoResponsable, descRepor, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc,
            conceptoServicio, costoServicio, medicoRevisor
           FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.tab_serviciosadicionales SS
           WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
           AND idAcc = ".$idAcc."  AND ACCT.idEscuela=ESC.idEscuela 
           AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1;";




        $result2=mysqli_query($conexion,$sql2);
        while($mostrar=mysqli_fetch_array($result2)){
            
            ?>
  <table>
           <tr>
           <td colspan="6" style="background: #BBB7B8;"><b>DATOS DEL MEDICO</b></td>
            </tr> 
          
               <tr>
               <td colspan="3">Nombre: </td>
                <td colspan="3">Télefono Celular: </td>
               </tr>
               <tr>
               <td colspan="3">Domicilio: </td>
                <td colspan="3">Fecha: </td>
               </tr>
               <tr>
               <td colspan="3">Cédula Profesional: <br><br></td>
                <td colspan="3">Firma de Médico:<br><br> </td>
               </tr>
               <tr>
               <td colspan="3">Correo electrónico: </td>
               <td colspan="3"></td>
               </tr>

               <tr>

               <td colspan="3">Persona que autoriza:</td>
               <td colspan="3"><b><?php echo $mostrar['medicoRevisor'];?></b></td>
               
               <?php
          }

        ?>


               </tr>
               <tr>
               <td colspan="6">
             <ol>
                 <li><b> Esta carta de autorizacion solo ampara accidentes por actividades dentro y fuera de la escuela, participando en algun 
                     evento programando y supervisado por la escuela.</b>
                 </li>
                 <li><b>Esta carta de autorizacion tiene 24h de vigencia y es valida unicamente para el Hospital o Clinica de referencia.</b></li>
                 <li><b>Enviar facturas en un plazo no mayor a 15 dias a la fecha de atencion.</b></li>
            </ol>
            
            </td>
               
               </tr>
<tr>
    <td colspan="6">GASTOS PERSONALES A CARGO DEL ASEGURADO</td>
</tr>
<tr>
    <td colspan="6">NOTAS:</td>
</tr>

<tr>
    <td colspan="6">OBSERVACIONES:
        <br>
        <br>
        <br>
      DX:
        <br>
        <br>
        <br>
        TRATAMIENTO:
        <br>
        <br>
        <br>
    </td>
</tr>
<tr>
    <td colspan="6">SEGUROS ATLAS AL 800 8 36 22 42/ 54 48 48 14</td>
</tr>




               </table>
     
           </div>
           
           



     
          
          
     
           
        
          
          </center>
        </form>            
          
        

</body>
       
</html>



