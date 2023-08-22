<?php ob_start();

include("../functions/phpfunctions.php");
$conexion = con();

?>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">

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
    font-size: 11px;
    
}
.textTinyEn, ul {
    text-align: left;
    font-size: 11px;
    font: 60% sans-serif;
    
}

title{
font-size: 13px;

}

ul{
  
    font-size:12px;
    font: 70% sans-serif;
    width: 100%;
}
</style>
</head>
<body>
 
      <form>
    
      <img src="TITULOS2022.jpg" height="70" width="710">

        <?php      


$idAcc = $_GET['idAcc'];
		        $sql="SELECT idAcc,appPaRepor, appMaRepor, nombreRepor, puestoReportante, ACCT.FolioAccidente, fechaHoraAccidente, sintomas, actividadAcc, 
            regionRDCA, intensidadAccidente, nombreUrgAmb, procedimientosLista, tipoDeEventoInicial,
            telefonoReportante, fechaRepor, idRDCA, idTipoDeAccidente, ciudadEscuela, alcaldiaEscuela, calleEscuela, cpescuela, telefonoEscuela, 
            idLugarAccidente, ACCT.idEstatus, ACCT.idEscuela, estabilidad, fechaHoraAccidente, idHospital, nombreEscuela, ES.nombreEstatus,
            PrimerApellidoA, SegundoApellidoA, NombreA, GradoEscolarA, SexoA, AlcaldiaMunicipio, ACT.Colonia, CalleA, diagnosticosLista, 
            FechaNacimientoA,GradoEscolarA, estado, apRes, amRes, nombreRes, telFiRes, telCelRes,FechaNacimientoA, poblacionAccidentado,
            ACCT.correoEscuela, ACCT.correoResponsable, descRepor, dirEscRepor, dialectoAcc, dialectoAccES, indigenaAcc, curpAcc
            FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
            WHERE  ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado AND ACCT.idEstatus= ES.idEstatus 
            AND idAcc = '$idAcc' AND ACCT.idEscuela=ESC.idEscuela AND ES.idEstatus=ACCT.idEstatus AND ACCT.FolioAccidentado=ACT.FolioAccidentado LIMIT 0,1";
          
          
		$result=mysqli_query($conexion,$sql);
		while($mostrar=mysqli_fetch_array($result)){
            
		 ?>
      <center>
      <div class="col-3">
      <textTiny style="font: 80% sans-serif; 15px; text-align: justify;">
      <p align="right">Aut: <u><?php echo $mostrar['FolioAccidente']; $foAcc= $mostrar['FolioAccidente']; ?></p>
      </textTiny>  
        </div>
        
     <div class="col-1">
     <h4>  <b>AVISO DE ACCIDENTE</b>  </h4>
    <h5><b> Poliza de Accidentes Personales "ESCOLAR"</b>     </h5>
     

    </div> 

     <div class="col-1"> <table>
               <td>No. Poliza:</td>
                   <td>Hospital/Clínica: <?php echo $mostrar['idHospital']; ?></td>
                   <td>Fecha: <?php echo $mostrar['fechaRepor']; ?></td>
                   </table>
             
    </div> 
           
           <div class="1"><h5>Agradecemos la atención que se brinde al Alumno(a) y/o Personal Administrativo</h5></div>
     <div class="col-1">
         <table >
               <tr>
                   <td colspan="6">
                       Atender al Alumno/ Docente/ Administrativo: <?php  echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?>
                    </td>
                         
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
                 <td colspan="2"> ¿De acuerdo a su cultura se considera indigena?  <br>
                 <?php echo $mostrar['indigenaAcc']; ?>
                 </td>
                 
                
                 <td colspan="2"> ¿Habla alguna lengua indigena?  <br>
                 <?php echo $mostrar['dialectoAcc']; ?>
                 </td>
               
                 <td colspan="2"> ¿Que lengua indigena habla?  <br>
                 <?php echo $mostrar['dialectoAccES']; ?>
                 </td>
                 
                 </tr>
                
                 <tr>
               <td colspan="6"> CURP: 
                <?php  echo $mostrar['curpAcc']; ?><br><br></td>
               </tr>
            
            

                    
      
      
               <tr>
               <td colspan="6"> Nombre y firma del Padre o Madre (si el afectado es menor de edad): 
                <?php  echo $mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes']; ?><br><br></td>
               </tr>
            
             <tr>
                 <td colspan="6"> Domicilio del Asegurado afectado </td>
                 
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
                </table>
           
           </div>
           <div class="col-1"><h5> <b>Datos de la escuela</b> </h5></div>
           <div class="col-1">
           <table>
               <tr>
               
               <td colspan="6"> Nombre de la escuela:  <?php echo $mostrar['nombreEscuela']; ?></td>
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
                   <td >Telefono: <?php echo $mostrar['telefonoEscuela']; ?></td>
                   <td colspan="2">Correo:<?php echo $mostrar['correoEscuela']?> </td>
                      
                   </tr>
           
           <tr>
           <td colspan="4">Nombre del director o persona que autoriza: <?php echo $mostrar['appPaRepor']." ".$mostrar['appMaRepor']." ".$mostrar['nombreRepor']; ?></td> 
           <td colspan="2" rowspan="3"> SELLO DE LA ESCUELA: <br><br><br><br><br><br> </td>
           </tr>
            <tr>
            <td colspan="4">Puesto: <?php echo $mostrar['puestoReportante']; ?></td>
            </tr><tr>
               <td colspan="4">Firma: <br><br></td>
            
           </tr>
              
               
               </table>
           </div>
           
           <div clas="col-1">
             <h5> <b> Información del accidente</b></h5>
           <table><tr>
               <td>Lugar, fecha, hora del accidente: CDMX <br> <?php echo $mostrar['idLugarAccidente'].", ".$mostrar['fechaHoraAccidente']; ?></td>
               </tr>
               <tr><td>Causa del accidente:  <?php echo $mostrar['descRepor'];?> <br><br></tr>
               
               
               
               </table>
           
           </div>
           
           <div class="col-1">
             <h5>   <b> Informe Médico  </b></h5> 
           <table>
               <tr>
               <td>Antecendentes médicos del Lesionado: Alergias; enfermedades y tratamiento actual: <br><br><br></td>
               </tr>
             
            
                 
               <tr><td>   Descripción de las lesiones y tratamiento:  <p><br>
             <!--  /* */*/

                   /*
                     "EN   ".$mostrar['idLugarAccidente']." , 
                    EL DIA  ".$mostrar['fechaHoraAccidente'].
                    " , AL ESTAR  ".$mostrar['actividadAcc'].
                     " , SUFRE  ".$mostrar['idTipoDeAccidente'].
                    
                    
                    " , SE ENCUENTRA  ".$mostrar['estabilidad'];      
                    
                   
            
}

$sqlLes = "SELECT *  FROM vasegurobd.tb_lesionesaccidentado WHERE FolioAccidenteLes = '$foAcc'";
$lesiones = mysqli_query($conexion,$sqlLes);
while($mostrarLes=mysqli_fetch_array($lesiones)) {
    echo '
    , LESION EN  '.$mostrarLes['rdca'].' '.$mostrarLeS['rdcaES'].'  REFIERE  '.$mostrarLes['sintomasLes'].'   CON INTENSIDAD EN GRADO  '.$mostrarLes['intensidadLes'].'  ';
   

}
echo ".";

          
		$result2=mysqli_query($conexion,$sql);
       
		while($mostrar=mysqli_fetch_array($result2)) {
*/
/*/echo $mostrar['descRepor'];

?>*/
-->
        </td></tr>
        
                  </table>
           </div>

           <div class="col-1">
             <h5>  <b>  Datos del Médico  </b></h5> 
           <table>
               <tr>
               <td>Nombre: </td>
                <td>Télefono Celular: </td>
               </tr>
               <tr>
               <td>Domicilio: </td>
                <td>Fecha: </td>
               </tr>
               <tr>
               <td>Cédula Profesional: <br><br></td>
                <td>Firma de Médico:<br><br> </td>
               </tr>
               <tr>
               <td>Correo electrónico: </td>
               <td></td>
               </tr>
               </table>
           </div>
           
           <div class="col-1"> 
           <textTiny style="font: 50% sans-serif; text-align: justify; "> <br><p>
           <p style="text-align:center">   Reportar a: PROGRAMA VASEGUR@ / Seguros Atlas al 800 836 3342 / 55 54-48-48-14  </p>

<p>1. Esta carta autorización sólo ampara accidentes por actividades dentro y fuera de la escuela, participando en algún evento 
programado y supervisado por la escuela. <u>Gastos Personales a Cargo del Asegurado.</u><br>
2.La presente carta de autorización tiene una vigencia de 24 hrs. a partir de la fecha de expedición y es válida únicamente 
para el Hospital o Clínica de referencia.<br> 
3. Enviar facturas en un plazo no mayor a 5 días a la fecha de atención.<br>

<strong>Se autoriza a Seguros Atlas S. A. para obtener historia clínica, prescripciones, tratamientos, radiografías de los Hospitales,
 Clínicas, Sanatorios, laboratorios y/o establecimientos de salud que hayan examinado al asegurado afectado con relación a cualquier
  lesión que haya sufrido.</strong> </p>
<br>
<p align="right"> <b><u>AVISO DE PRIVACIDAD AL REVERSO </u></b></p>
</p>
</textTiny>
   </div> 

   <div style="page-break-after:always;"></div> 
   
   <div class="col-1">
   <img src="TITULOS2022.jpg" height="70" width="710">
<textTiny style="font: 75% sans-serif; 11px; text-align: justify;">
    <br>
    <p align="left">  AVISO DE PRIVACIDAD SIMPLIFICADO PARA CLIENTE </p>

<p>
(Proponentes y solicitantes, contratantes, asegurados, beneficiarios, fideicomitentes, fideicomisarios y proveedores de recursos) .
</p>
<p>
En cumplimiento con lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, Seguros Atlas, 
S.A. (Seguros Atlas) con domicilio en Paseo de los Tamarindos No. 60- PB, Col. Bosques de las Lomas, 05120 México, CDMX Tel.: 
(55)9177-50-00, hace de su conocimiento que tratará los datos personales generales y sensibles que Usted proporcione para la evaluación 
de su solicitud de seguro y selección de riesgos y, en su caso, emisión del contrato de seguro, trámite de sus solicitudes de pago de 
siniestros, administración, mantenimiento y renovación de la póliza de seguro, prevención de fraude y operaciones ilícitas, para información
 estadística así como para todos los fines relacionados con el cumplimiento de nuestras obligaciones de conformidad con lo establecido en el
  propio contrato, la Ley sobre el Contrato de Seguro y en la normatividad aplicable. 
  </p>
<p>
Para mayor información ponemos a su disposición, nuestra página de internet www.segurosatlas.com.mx en donde usted podrá consultar
 nuestro Aviso de Privacidad Integral, así como los mecanismos para hacer valer su derecho ARCO.
</p>


<p align="left"> CONSENTIMIENTO  </p>


<p>
En cumplimiento con lo dispuesto por la Ley Federal de Protección de Datos Personales en Posesión de los Particulares, autorizo a Seguros Atlas, S.A., a tratar y, en su caso,
transferir mis datos personales, los sensibles y los patrimoniales o financieros, para todos los fines vinculados con la relación jurídica que tengamos celebrado o que en su caso,
se celebre, así como para los indicados en el Aviso de Privacidad, cuyo contenido conozco y que previamente se ha puesto a mi disposición.

</p>
<p>
En caso de haber proporcionado datos personales, sensibles, patrimoniales o financieros de otros titulares, me obligo a hacer del conocimiento de dichos titulares que he proporcionado 
tales datos a Seguros Atlas, S.A. y a hacer de su conocimiento los lugares en donde se encuentra a su disposición el referido Aviso de Privacidad. 
</p>
<br>
<br>
<p>
 
En cumplimiento con lo dispuesto en los artículos 14, 15, 16 de la LEY DE PROTECCIÓN DE DATOS PERSONALES PARA LA CDMX, la información proporcionada es de carácter confidencial, 
y su tratamiento, requerirá el consentimiento inequívoco expreso y por escrito del interesado, por lo que declaro que todos los datos aquí contenidos son ciertos y autorizo el tratamiento
de mis datos personales cuando por motivos de salud resulte necesario para la asistencia o examinación médica.  
</p><p>
 
Además: <br>
Este programa es de carácter público, ajeno a cualquier partido político. Queda prohibido el uso para fines distintos a los establecidos en el Programa.           
</p>          
</textTiny>

  </div>      

              <div style="page-break-after:always;"></div>
           
           
<textTiny style="font: 80% sans-serif; 15px; text-align: justify;"> 
 <img src="TITULOS2022.jpg" height="80" width="710">    

      
 ENCUESTA DE SERVICIO        
<?php //echo "  |  ".$mostrar['FolioAccidente']; ?> 

<br>



<ul> ¿Cómo calificaría la atención del personal que lo recibe en urgencias? </ul>
<ul>
a)      Muy satisfactoria<br>
b)      Satisfactoria<br>
c)  Insatisfactorio
</ul>




<ul> ¿Cómo califica el tiempo de espera hasta ser atendido por un médico? </ul>

    <ul>
    a)      Muy satisfactorio<br>
    b)      Satisfactorio<br>
    c)      Insatisfactorio</ul>
    

<ul> ¿Cómo considera la atención por parte del médico? </ul>

<ul>a)      Muy satisfactoria<br>
b)      Satisfactoria<br>
c)  Insatisfactorio</ul>


<ul> ¿Cómo calificaría la información que recibió con respecto a su paciente? </ul>

<ul>a)      Muy satisfactoria<br>
b)      Satisfactoria<br>
c)  Insatisfactorio</ul>


<ul> ¿Cómo considera la limpieza, iluminación y comodidad de la clínica u hospital? </ul>

<ul>a)      Muy satisfactoria<br>
b)      Satisfactoria<br>
c)      Insatisfactorio</ul>


<ul> ¿Cómo es su percepción general de la atención recibida </ul>

<ul>a)      Muy satisfactoria<br>
b)      Satisfactoria<br>
c)      Insatisfactoria</ul>
   
<br><br><br>
<div class="col-1"> 
    <table style="border: hidden" >
    
    <tr style="border: hidden">
        <td colspan="2" style="border: hidden"><br>Nombre del Hospital o Clínica: <u> <?php echo $mostrar['idHospital'] ?></u></td>
        </tr>
        <tr style="border: hidden">
        <td  colspan="2" style="border: hidden">Nombre del Paciente: <u><?php  echo $mostrar['PrimerApellidoA']." ".$mostrar['SegundoApellidoA']." ".$mostrar['NombreA']; ?> </u></td>
        </tr>
        <tr style="border: hidden">
        <td  colspan="2" style="border: hidden">Nombre del Padre o Tutor: <u><?php  echo $mostrar['apRes']." ".$mostrar['amRes']." ".$mostrar['nombreRes'];  ?></u></td>
       
        </tr>
  <br>
    </table>
  <table style="border: hidden" style="text-align:center">
    <tr>
        <td  colspan="2" style="border: hidden" style="text-align:center"><br><br><u>_______________________<br></u>Firma del Afectado.</td>
  
        <td  colspan="2" style="border: hidden" style="text-align:center"><br><br><u>_______________________<br></u>Firma del Padre o Tutor.</td>
    </tr>
  
   
    <tr>
        <td  colspan="2" style="border: hidden">Télefono casa: <u><?php echo $mostrar['telFiRes'] ?></u></td>
        <td  colspan="2" style="border: hidden">Email:          </td>
    </tr><tr>
        <td  colspan="2" style="border: hidden">Télefono Cel: <u><?php echo $mostrar['telFiRes'] ?></u></td>
        <td   colspan="2" style="border: hidden">Fecha:      </td>
        </tr>
    </table>

        </div>      <?php
          }
          ?>

           
           
           
</textTiny>
          
          </center>
        </form>            
          
        

</body>
       
</html>
<?php
$html = ob_get_clean();
//echo $html;



date_default_timezone_set('America/Mexico_City');
$time = time();
$fecha = date("Y:m:d", $time);
$hora = date("H:i:s", $time);

$fechaSolicitud = $fecha." ".$hora;

require_once "../../dompdf/autoload.inc.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();


$options = $dompdf ->getOptions();
$options->set(array('isRemoteEnabled' => true));
$options->set('isJavascriptEnabled', TRUE);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->set_option( 'isJavascriptEnabled' , true );
$dompdf->render();
$dompdf->stream($folio."-".$fechaSolicitud, array("Attachment" => false));



?>





