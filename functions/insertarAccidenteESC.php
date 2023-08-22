<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$fechaRepor= $_POST['fechaHoy'];
$nombreEscuela = ltrim($_POST['nombreEscuela']);
$idUsuario= $_POST['idUsuario'];
$appPaRepor = $_POST['appPaRepor'];
$appMaRepor = $_POST['appMaRepor'];
$nombreRepor = $_POST['nombreRepor'];
$correoReportante = $_POST['correoReportante'];
$estabilidad = $_POST['estabilidadAccidentado'];
$puestoReportante = $_POST['puestoReportante'];
$correoReportante = $_POST['correoReportante'];
$telefonoReportante = $_POST['telefonoReportante'];
$appPaAcc = $_POST['appPaAcc'];
$appMaAcc = $_POST['appMaAcc'];
$nombreAcc = $_POST['nombreAcc'];
$poblacionAccidentado = $_POST['poblacionAccidentado'];
$fechaNacimientonAccidentado = $_POST['fechaNacimientoAccidentado'];
$generoAccidentado = $_POST['generoAccidentado'];
$gradoEscolarAccidentado = $_POST['gradoEscolaridadAccidentado'];
$entidadAccidentado = $_POST['entidadAccidentado'];
$alcaldiaAccidentado = $_POST['alcaldiaAccidentado'];
$coloniaAccidentado = $_POST['coloniaAccidentado'];
$cpAccidentado = $_POST['cpAccidentado'];
$calleAccidentado = $_POST['calleAccidentado'];
$descReportante = $_POST['descReportante'];
$fechaAccidenteReportante = $_POST['fechaAccidenteReportante'];
$horaAccidenteReportante = $_POST['horaAccidenteReportante'];
$regionDelCuerpoAfectada = $_POST['regionDelCuerpoAfectada'];
$tipoDeAccidente = $_POST['tipoDeAccidente'];
$lugarAccidente = $_POST['lugarAccidente'];
$escuelaAccidentado = $_POST['escuelaAccidentado'];
$appResponsable = $_POST['appResponsable'];
$apmResponsable = $_POST['apmResponsable'];
$nombreResponsable = $_POST['nombreResponsable'];
$telefonoResponsable = $_POST['telefonoResponsable'];
$telefonoResponsablefijo = $_POST['telefonoResponsablefijo'];
$idEscuela = "";
$actividadAccidente = $_POST['actividadAccidente'];
$intensidad = $_POST['intensidad'];
$regionRDCA = $_POST['regionesRDCA'];
$lesionProbableInicial = $_POST['lesionProbableInicial'];
$tipoDeEventoInicial = $_POST['tipoDeEventoInicial'];
$periodoDeCobertura = $_POST['periodoDeCobertura'];
$correoEscuela = $_POST['correoEscuela'];
$correoResponsable = $_POST['correoResponsable'];
$sin = $_POST['sintomas'];
$regionPrincipal = $_POST['regionPrincipal'];
$notasAcc = $_POST['notasAcc'];

$dialectoAcc = $_POST['notasAcc'];
$dialectoAccES = $_POST['notasAccES'];
$indigenaAcc = $_POST['indigenaAcc'];
$curpAcc = $_POST['curpAcc'];

$sintomas = implode(",", $sin);



if($dialectoAcc == "NO" ){
    $dialectoAccES = "NINGUNO";
    

}
//OBTENER EL ID DE LA ESCUELA

$idus = "SELECT idEscuela FROM vasegurobd.cat_escuelas WHERE nombreEscuela = '$nombreEscuela' LIMIT 0,1 ";
		$idusarr=mysqli_query($link,$idus); 
        while($mostrar=mysqli_fetch_array($idusarr)){
          
            $idEscuela =  $mostrar['idEscuela'];
                      
       }

//CALCULAR ID DE ACCIDENTADO, CONTANDO TODOS LOS REGISTROS EXISTENTES +1
$accdo = "SELECT * FROM vasegurobd.tb_accidentado ";
		$abu=mysqli_query($link,$accdo); 
        $naccdo = mysqli_num_rows($abu) + 1;


//BUSCAR DUPLICADOS
$fechaHoy = date('Y-m-d')."%";
$dup = "SELECT * FROM vasegurobd.tb_accidentado WHERE  PrimerApellidoA = '$appPaAcc' AND SegundoApellidoA = '$appMaAcc' AND NombreA = '$nombreAcc' AND FechaHoraAccidenteA LIKE '$fechaHoy'";
		$dupp=mysqli_query($link,$dup); 
        $dupl = mysqli_num_rows($dupp);



$estatus ="";
if($dupl > 0){
   $estatus = "2"; 
   $folioAccidente = "";
} else {
    $estatus ="1";
}


$fechaHoraAccidente = $fechaAccidenteReportante." ".$horaAccidenteReportante;

$from = new DateTime($fechaNacimientonAccidentado);
$to   = new DateTime('today');
$edad= $from->diff($to)->y;


$sql = "INSERT INTO vasegurobd.tb_accidentes
(FolioAccidente,appPaRepor, appMaRepor, nombreRepor, FolioAccidentado , idusuario, idRDCA,idTipoDeAccidente, idEstatus, 
 idRiesgoEx, idEscuela, idHospital, idHospitalCosto, idLugarAccidente, HospitalCosto, HospitalIVA, HospitalTOTAL, estabilidad,
  puestoReportante, telefonoReportante, idUsAu, apRes, amRes, nombreRes,telFiRes, telCelRes, fechaHoraAccidente, actividadAcc, sintomas,
   intensidadAccidente, regionRDCA,nombreEscuelaAcc, lesionProbableInicial, tipoDeEventoInicial, periodoDeCobertura, 
   descRepor, poblacionAccidentado, correoReportante, correoEscuela, correoResponsable, regionPrincipal, notasAcc, dialectoAcc,
   dialectoAccES, indigenaAcc) VALUES 
('', (upper('$appPaRepor')), (upper('$appMaRepor')), (upper('$nombreRepor')), '$naccdo', '$idUsuario', '$regionDelCuerpoAfectada', '$tipoDeAccidente',
 '$estatus', '$riEx','$idEscuela', '$hospital', '0', '$lugarAccidente', '0', '0', '0', '$estabilidad', '$puestoReportante',
  '$telefonoReportante','',(upper('$appResponsable')),(upper('$apmResponsable')),(upper('$nombreResponsable')),'$telefonoResponsablefijo','$telefonoResponsable',
  '$fechaHoraAccidente','$actividadAccidente','$sintomas','$intensidad','$regionRDCA',
'$nombreEscuela', '$lesionProbableInicial','$tipoDeEventoInicial','$periodoDeCobertura',
 '$descReportante', '$poblacionAccidentado', '$correoReportante', '$correoEscuela', '$correoResponsable', 
 '$regionPrincipal', '$notasAcc','$dialectoAcc','$dialectoAccES','$indigenaAcc')";


$accidentado = "INSERT INTO vasegurobd.tb_accidentado 
(FolioAccidentado, PrimerApellidoA, SegundoApellidoA, NombreA, FechaNacimientoA, SexoA, GradoEscolarA, EdadA, 
idCP, CalleA, FechaHoraAccidenteA, estado, AlcaldiaMunicipio, Colonia, curpAcc) VALUES
 ('$naccdo',(upper('$appPaAcc')),(upper('$appMaAcc')),
(upper('$nombreAcc')),'$fechaNacimientonAccidentado','$generoAccidentado','$gradoEscolarAccidentado','$edad','$cpAccidentado',
'$calleAccidentado','$fechaHoraAccidente','$entidadAccidentado','$alcaldiaAccidentado','$coloniaAccidentado','$curpAcc')";



$lesPR= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
VALUES('$regionDelCuerpoAfectada','$regionRDCA','$sintomas','$intensidad','$naccdo','$folioAccidente')";
mysqli_query($link,$lesPR) or die (mysqli_error($link));

// LESIONES INSERTADAS MULTIPLES
$regionDelCuerpoAfectada1 = $_POST['regionDelCuerpoAfectada1'];
$sin1 = $_POST['sintomas1'];
$intensidad1 = $_POST['intensidad1'];
$regionRDCA1 = $_POST['regionesRDCA1'];
$sintomas1 = implode(",", $sin1);

if($regionDelCuerpoAfectada1 != ""){
    $les1= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada1','$regionRDCA1','$sintomas1','$intensidad1','$naccdo','$folioAccidente')";
    mysqli_query($link,$les1) or die (mysqli_error($link));
    
    }
    
    
    $regionDelCuerpoAfectada2 = $_POST['regionDelCuerpoAfectada2'];
    $sin2 = $_POST['sintomas2'];
    $intensidad2 = $_POST['intensidad2'];
    $regionRDCA2 = $_POST['regionesRDCA2'];
    $sintomas2 = implode(",", $sin2);
    
    if($regionDelCuerpoAfectada2 != ""){
        $les2= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada2','$regionRDCA2','$sintomas2','$intensidad2','$naccdo','$folioAccidente')";
        mysqli_query($link,$les2) or die (mysqli_error($link));
        
        }
        
    
    
    $regionDelCuerpoAfectada3 = $_POST['regionDelCuerpoAfectada3'];
    $sin3 = $_POST['sintomas3'];
    $intensidad3 = $_POST['intensidad3'];
    $regionRDCA3 = $_POST['regionesRDCA3'];
    $sintomas3 = implode(",", $sin3);
    
    if($regionDelCuerpoAfectada3 != ""){
        $les3= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada3','$regionRDCA3','$sintomas3','$intensidad3','$naccdo','$folioAccidente')";
        mysqli_query($link,$les3) or die (mysqli_error($link));
        
        }
    
    $regionDelCuerpoAfectada4 = $_POST['regionDelCuerpoAfectada4'];
    $sin4 = $_POST['sintomas4'];
    $intensidad4 = $_POST['intensidad4'];
    $regionRDCA4 = $_POST['regionesRDCA4'];
    $sintomas4 = implode(",", $sin4);
    
    if($regionDelCuerpoAfectada4 != ""){
        $les4= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada4','$regionRDCA4','$sintomas4','$intensidad4','$naccdo','$folioAccidente')";
        mysqli_query($link,$les4) or die (mysqli_error($link));
        
        }
    
    $regionDelCuerpoAfectada5 = $_POST['regionDelCuerpoAfectada5'];
    $sin5 = $_POST['sintomas5'];
    $intensidad5 = $_POST['intensidad5'];
    $regionRDCA5 = $_POST['regionesRDCA5'];
    $sintomas5 = implode(",", $sin5);
    
    if($regionDelCuerpoAfectada5 != ""){
        $les5= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada5','$regionRDCA5','$sintomas5','$intensidad5','$naccdo','$folioAccidente')";
        mysqli_query($link,$les5) or die (mysqli_error($link));
        
        }

        $regionDelCuerpoAfectada6 = $_POST['regionDelCuerpoAfectada6'];
        $sin6 = $_POST['sintomas6'];
        $intensidad6 = $_POST['intensidad6'];
        $regionRDCA6 = $_POST['regionesRDCA6'];
        $sintomas6 = implode(",", $sin6);

     if($regionDelCuerpoAfectada6 != ""){
            $les6= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
            VALUES('$regionDelCuerpoAfectada6','$regionRDCA6','$sintomas6','$intensidad6','$naccdo','$folioAccidente')";
            mysqli_query($link,$les6) or die (mysqli_error($link));
            
            }


            $regionDelCuerpoAfectada7 = $_POST['regionDelCuerpoAfectada7'];
            $sin7 = $_POST['sintomas7'];
            $intensidad7 = $_POST['intensidad7'];
            $regionRDCA7 = $_POST['regionesRDCA7'];
            $sintomas7 = implode(",", $sin7);



    
    if($regionDelCuerpoAfectada7 != ""){
                $les7= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
                VALUES('$regionDelCuerpoAfectada7','$regionRDCA7','$sintomas7','$intensidad7','$naccdo','$folioAccidente')";
                mysqli_query($link,$les7) or die (mysqli_error($link));
                
                }

        
         $regionDelCuerpoAfectada8 = $_POST['regionDelCuerpoAfectada8'];
         $sin8 = $_POST['sintomas8'];
         $intensidad8 = $_POST['intensidad8'];
         $regionRDCA8 = $_POST['regionesRDCA8'];
         $sintomas8 = implode(",", $sin8);

     if($regionDelCuerpoAfectada8 != ""){
                 $les8= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
                VALUES('$regionDelCuerpoAfectada8','$regionRDCA8','$sintomas8','$intensidad8','$naccdo','$folioAccidente')";
                mysqli_query($link,$les8) or die (mysqli_error($link));
                    
                    }


                    $regionDelCuerpoAfectada9 = $_POST['regionDelCuerpoAfectada9'];
                    $sin9 = $_POST['sintomas9'];
                    $intensidad9 = $_POST['intensidad9'];
                    $regionRDCA9 = $_POST['regionesRDCA9'];
                    $sintomas9 = implode(",", $sin9);

    if($regionDelCuerpoAfectada9 != ""){
                  $les9= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
                   VALUES('$regionDelCuerpoAfectada9','$regionRDCA9','$sintomas9','$intensidad9','$naccdo','$folioAccidente')";
                   mysqli_query($link,$les9) or die (mysqli_error($link));
                           
                           }

mysqli_query($link,$sql) or die (mysqli_error($link));
mysqli_query($link,$accidentado) or die (mysqli_error($link));

$idLDP ="";
$idCon="SELECT idAcc FROM vasegurobd.tb_accidentes WHERE FolioAccidentado ='$naccdo'";

$result=mysqli_query($link,$idCon);

while($mostrar=mysqli_fetch_array($result)){
    $idLDP = $mostrar['idAcc'];
} 

mysqli_close($link);

?>

<script>
    
        alert("ACCIDENTE REGISTRADO, EN ESPERA DE APROBACION");
        window.location= "../forms/detallesAccidenteNUEVO.php?idAcc=<?php echo $idLDP; ?>" ;     
    

</script>




  
