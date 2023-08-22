<?php
  

$link = new mysqli('localHost','root','Q1w2e3r4.','vasegurobd');
$link -> set_charset("utf8");

$FolioAccidente = $_POST['folio'];
$FolioAccidentado = $_POST['folioACDO'];

$nombreUsuario = $_POST['nombreUSuario'];
$idUsuario= $_POST['idUsuario'];
$appPaRepor = $_POST['appPaRepor'];
$appMaRepor = $_POST['appMaRepor'];
$nombreRepor = $_POST['nombreRepor'];

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


$regionDelCuerpoAfectada = $_POST['regionDelCuerpoAfectada'];
$hospital = $_POST['hospital'];
$tipoDeAccidente = $_POST['tipoDeAccidente'];
$lugarAccidente = $_POST['lugarAccidente'];

$appResponsable = $_POST['appResponsable'];
$apmResponsable = $_POST['apmResponsable'];
$nombreResponsable = $_POST['nombreResponsable'];
$telefonoResponsable = $_POST['telefonoResponsable'];
$telefonoResponsablefijo = $_POST['telefonoResponsablefijo'];

$actividadAccidente = $_POST['actividadAccidente'];
$sin = $_POST['sintomas'];
$intensidad = $_POST['intensidad'];
$regionRDCA = $_POST['regionesRDCA'];
$sintomas = implode(",", $sin);
$estatus = $_POST['estatusAcc'];
$lesionProbableInicial = $_POST['lesionProbableInicial'];
$tipoDeEventoInicial = $_POST['tipoDeEventoInicial'];
$periodoDeCobertura = $_POST['periodoDeCobertura'];
$descRepor = $_POST['descRepor'];

$from = new DateTime($fechaNacimientonAccidentado);
$to   = new DateTime('today');
$edad= $from->diff($to)->y;




$sql = "UPDATE  vasegurobd.tb_accidentes SET appPaRepor = '$appPaRepor', appMaRepor = '$appMaRepor', nombreRepor='$nombreRepor',
idRDCA = '$regionDelCuerpoAfectada', regionRDCA = '$regionRDCA', idTipoDeAccidente = '$tipoDeAccidente', idEstatus = '$estatus',
idHospital = '$hospital', idLugarAccidente = '$lugarAccidente', estabilidad = 'INCONCIENTE', puestoReportante = '$puestoReportante',
telefonoReportante ='$telefonoReportante', apRes = '$appResponsable',amRes ='$apmResponsable', nombreRes = '$nombreResponsable',
telFiRes = '$telefonoResponsablefijo', telCelRes = '$telefonoResponsable', actividadAcc = '$actividadAccidente', sintomas = '$sintomas',
intensidadAccidente = '$intensidad', lesionProbableInicial = '$lesionProbableInicial', tipoDeEventoInicial = '$tipoDeEventoInicial',
periodoDeCobertura = '$periodoDeCobertura', poblacionAccidentado='$poblacionAccidentado', descRepor = '$descRepor'
 WHERE FolioAccidente = '$FolioAccidente'";

$accidentado = "UPDATE vasegurobd.tb_accidentado SET
FechaNacimientoA = '$fechaNacimientonAccidentado', SexoA = '$generoAccidentado', GradoEscolarA = '$gradoEscolarAccidentado', EdadA = '$edad', 
idCP = '$cpAccidentado', CalleA = '$calleAccidentado',  estado = '$entidadAccidentado', AlcaldiaMunicipio = '$alcaldiaAccidentado', 
Colonia = '$coloniaAccidentado' WHERE FolioAccidentado = '$FolioAccidentado'";

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
VALUES('$regionDelCuerpoAfectada1','$regionRDCA1','$sintomas1','$intensidad1','$FolioAccidentado','$FolioAccidente')";
mysqli_query($link,$les1) or die (mysqli_error($link));

}


$regionDelCuerpoAfectada2 = $_POST['regionDelCuerpoAfectada2'];
$sin2 = $_POST['sintomas2'];
$intensidad2 = $_POST['intensidad2'];
$regionRDCA2 = $_POST['regionesRDCA2'];
$sintomas2 = implode(",", $sin2);

if($regionDelCuerpoAfectada2 != ""){
    $les2= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada2','$regionRDCA2','$sintomas2','$intensidad2','$FolioAccidentado','$FolioAccidente')";
    mysqli_query($link,$les2) or die (mysqli_error($link));
    
    }
    


$regionDelCuerpoAfectada3 = $_POST['regionDelCuerpoAfectada3'];
$sin3 = $_POST['sintomas3'];
$intensidad3 = $_POST['intensidad3'];
$regionRDCA3 = $_POST['regionesRDCA3'];
$sintomas3 = implode(",", $sin3);

if($regionDelCuerpoAfectada3 != ""){
    $les3= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada3','$regionRDCA3','$sintomas3','$intensidad3','$FolioAccidentado','$FolioAccidente')";
    mysqli_query($link,$les3) or die (mysqli_error($link));
    
    }

$regionDelCuerpoAfectada4 = $_POST['regionDelCuerpoAfectada4'];
$sin4 = $_POST['sintomas4'];
$intensidad4 = $_POST['intensidad4'];
$regionRDCA4 = $_POST['regionesRDCA4'];
$sintomas4 = implode(",", $sin4);

if($regionDelCuerpoAfectada4 != ""){
    $les4= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada4','$regionRDCA4','$sintomas4','$intensidad4','$FolioAccidentado','$FolioAccidente')";
    mysqli_query($link,$les4) or die (mysqli_error($link));
    
    }

$regionDelCuerpoAfectada5 = $_POST['regionDelCuerpoAfectada5'];
$sin5 = $_POST['sintomas5'];
$intensidad5 = $_POST['intensidad5'];
$regionRDCA5 = $_POST['regionesRDCA5'];
$sintomas5 = implode(",", $sin5);

if($regionDelCuerpoAfectada5 != ""){
    $les5= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
    VALUES('$regionDelCuerpoAfectada5','$regionRDCA5','$sintomas5','$intensidad5','$FolioAccidentado','$FolioAccidente')";
    mysqli_query($link,$les5) or die (mysqli_error($link));
    
    }

    $regionDelCuerpoAfectada6 = $_POST['regionDelCuerpoAfectada6'];
    $sin6 = $_POST['sintomas6'];
    $intensidad6 = $_POST['intensidad6'];
    $regionRDCA6 = $_POST['regionesRDCA6'];
    $sintomas6 = implode(",", $sin6);

 if($regionDelCuerpoAfectada6 != ""){
        $les6= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
        VALUES('$regionDelCuerpoAfectada6','$regionRDCA6','$sintomas6','$intensidad6','$FolioAccidentado','$FolioAccidente')";
        mysqli_query($link,$les6) or die (mysqli_error($link));
        
        }


        $regionDelCuerpoAfectada7 = $_POST['regionDelCuerpoAfectada7'];
        $sin7 = $_POST['sintomas7'];
        $intensidad7 = $_POST['intensidad7'];
        $regionRDCA7 = $_POST['regionesRDCA7'];
        $sintomas7 = implode(",", $sin7);




if($regionDelCuerpoAfectada7 != ""){
            $les7= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
            VALUES('$regionDelCuerpoAfectada7','$regionRDCA7','$sintomas7','$intensidad7','$FolioAccidentado','$FolioAccidente')";
            mysqli_query($link,$les7) or die (mysqli_error($link));
            
            }

    
     $regionDelCuerpoAfectada8 = $_POST['regionDelCuerpoAfectada8'];
     $sin8 = $_POST['sintomas8'];
     $intensidad8 = $_POST['intensidad8'];
     $regionRDCA8 = $_POST['regionesRDCA8'];
     $sintomas8 = implode(",", $sin8);

 if($regionDelCuerpoAfectada8 != ""){
             $les8= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
            VALUES('$regionDelCuerpoAfectada8','$regionRDCA8','$sintomas8','$intensidad8','$FolioAccidentado','$FolioAccidente')";
            mysqli_query($link,$les8) or die (mysqli_error($link));
                
                }


                $regionDelCuerpoAfectada9 = $_POST['regionDelCuerpoAfectada9'];
                $sin9 = $_POST['sintomas9'];
                $intensidad9 = $_POST['intensidad9'];
                $regionRDCA9 = $_POST['regionesRDCA9'];
                $sintomas9 = implode(",", $sin9);

if($regionDelCuerpoAfectada9 != ""){
              $les9= "INSERT INTO vasegurobd.tb_lesionesaccidentado (rdca, rdcaEs,sintomasLes,intensidadLes,FolioAccidentadoLes,FolioAccidenteLes)
               VALUES('$regionDelCuerpoAfectada9','$regionRDCA9','$sintomas9','$intensidad9','$FolioAccidentado','$FolioAccidente')";
               mysqli_query($link,$les9) or die (mysqli_error($link));
                       
                       }

mysqli_query($link,$sql) or die (mysqli_error($link));
mysqli_query($link,$accidentado) or die (mysqli_error($link));
mysqli_close($link);


?>

<script>
 if((localStorage.getItem('nivel') == "1" )){
        alert("DATOS ACTUALIZADOS");
         window.location= "../forms/adminAccidentes.php" ;     
      }
    
if((localStorage.getItem('nivel') == "3" )){
        alert("DATOS ACTUALIZADOS");
         window.location= "../forms/adminAccidentesEsc.php" ;     
      }
</script>



  
