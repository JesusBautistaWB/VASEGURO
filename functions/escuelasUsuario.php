<?php

include("phpfunctions.php");

$escuela = ltrim($_POST['escuela']);
$conexion = con();
		$sql="SELECT * FROM vasegurobd.tb_accidentado ACT ,vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC
         WHERE ACCT.idEstatus = ES.idEstatus
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado AND ACCT.idEscuela = ESC.idEscuela AND nombreEscuela ='$escuela' ORDER BY fechaRepor DESC;";

        echo "<table> <tr>
		     <thead>
			<td>ID</td>
            <td>Folio Urgencia</td>
            <td>Fecha</td>
            <td>Estatus</td>
			<td>Apellido Paterno del Accidentado/a</td>
			<td>Apellido Materno</td>
			<td>Nombre(S)</td>			
			<td>Escuela de procedencia</td>
                 <td>Hospital</td>
                 <td>ESTATUS DE OPCIONES</td>
                
			
			</thead>
		</tr>";

		$result=mysqli_query($conexion,$sql);

  while($mostrar=mysqli_fetch_array($result)){


       echo "<tr><td>".$mostrar['idAcc']."</td>";

       if ($mostrar['idEstatus'] =="11" || $mostrar['idEstatus'] =="3" || $mostrar['idEstatus'] =="13"  ||
       $mostrar['idEstatus'] =="13" || $mostrar['idEstatus'] =="5" || $mostrar['idEstatus'] =="6" || $mostrar['idEstatus'] =="7"  ){  
       echo "
       <td class='pen'><a href='detallesAccidenteEsc.php?idAcc=".$mostrar['idAcc']."' method= 'GET'><b>".$mostrar['FolioAccidente']."</b></a></td>
       ";
       }

       if ($mostrar['idEstatus'] =="2" || $mostrar['idEstatus'] =="4" ){  
        echo "
        <td class='pen'><a href='detallesAccidenteREsc.php?idAcc=".$mostrar['idAcc']."' method= 'GET'><b>".$mostrar['FolioAccidente']."</b></a></td>
        ";
        }

        if ($mostrar['idEstatus'] =="1" ){  
            echo "
            <td class='pen'><a href='detallesAccidenteNUEVO.php?idAcc=".$mostrar['idAcc']."' method= 'GET'><b>".$mostrar['idAcc']."</b></a></td>
            ";
            }

       
        echo "<td>".$mostrar['fechaHoraAccidente']."</td>";
       echo "<td class='";
         if ($mostrar['idEstatus'] =="12"){ echo "rec"; }
              if ($mostrar['idEstatus'] =="11"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="3"){ echo "ace"; }
              if ($mostrar['idEstatus'] =="2"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="4"){ echo "rec"; } 
              if ($mostrar['idEstatus'] =="1"){ echo "nuevo"; }
              if ($mostrar['idEstatus'] =="9"){ echo "pen"; }
              if ($mostrar['idEstatus'] =="7"){ echo "fin"; }
              if ($mostrar['idEstatus'] =="5" || $mostrar['idEstatus'] =="6" || $mostrar['idEstatus'] =="13"){ echo "egr"; }
            
                
                
            echo "'>".$mostrar['nombreEstatus']."</td>
            <td>".$mostrar['PrimerApellidoA']."</td>
			<td>".$mostrar['SegundoApellidoA']."</td>
			<td>";
      
                if($mostrar['NombreA'] == ""){
                    
                   echo $mostrar['nombreUrgAmb'];
                }else{
                    
                 echo $mostrar['NombreA'];
                }
                
                
                
                
              echo  "</td>
            <td>".$mostrar['nombreEscuela']."</td>
            
            
            <td class='";
       if ($mostrar['hospitalesSugeridos'] !=""){ 
           echo "enEspera";
       }else{ 
           echo "no";
          }
      
      echo "'>";
                
            
             if($mostrar['hospitalesSugeridos'] !=""){
                 
                 if(($mostrar['idHospital']) != ""){
                     
                   echo $mostrar['idHospital']; 
                 }else{
                     
                  echo "SUGERENCIAS DISPONIBLES";   
                     
                 }

             }else{
                 
                echo "EN ESPERA DE OPCIONES";
             }
                
      echo "</td><td class='";
   if ($mostrar['hospitalesSugeridos'] !=""){ 
           echo "enEspera";
       }else{ 
           echo "no";
          }
      
      echo "'>";
                
                if($mostrar['hospitalesSugeridos'] == ""){
                    
                    if($mostrar['idEstatus'] == "3"){
                       echo "<a href='pdfdet.php?idAcc=".$mostrar['idAcc']."' method='get'>Generar Aviso de Accidente</a>"; 
                    }
                   
                }else{
                    
                    if(($mostrar['idHospital']) != ""){
                       echo "<a href='pdfdet.php?idAcc=".$mostrar['idAcc']."' method='get'>Generar Aviso de Accidente</a>";
                    }else{
                       echo "<a href='seleccionarHospital.php?idAcc=".$mostrar['idAcc']."' method='get'>SELECCIONAR <br> HOSPITAL</a>";  
                    }
    
                }
                 
           echo "</td> </tr>";

}
echo "</table>";
mysqli_close($conexion);
?>
 