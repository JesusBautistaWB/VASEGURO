<?php

$hospital = ltrim($_POST['hospital']);
$idHos = ltrim($_POST['idHos']);

include("phpfunctions.php");
$conexion = con();  

       

		$sql="SELECT DISTINCT idAcc,ACCT.FolioAccidente, PrimerApellidoA, SegundoApellidoA, NombreA, nombreEstatus, ACCT.idEstatus, envioAcc,
        nombreEscuela, hospitalesSugeridos, fechaHoraAccidente, ACCT.folioSiniestro, HOS.idHospital, ACCT.numHospital, HOS.nombreClinicaHospital
        FROM vasegurobd.tb_accidentado ACT ,
        vasegurobd.tb_accidentes ACCT, vasegurobd.cat_estatus ES, vasegurobd.cat_escuelas ESC, vasegurobd.cat_hospitales HOS
        WHERE ACCT.idEstatus = ES.idEstatus
        AND ACT.FolioAccidentado = ACCT.FolioAccidentado 
        AND ACCT.idEscuela = ESC.idEscuela 
        AND ACCT.numHospital ='$idHos' 
        AND HOS.idHospital ='$idHos' 
        AND ACCT.idEstatus in('3','5','6','13','7','11','15') ORDER BY fechaRepor DESC";


		$result=mysqli_query($conexion,$sql);
 echo " 
 <table>
 <tr>
		     <thead>
			<td>Folio Aprobacion</td>
            <td>Fecha y Hora de Accidente</td>
            <td>ESTATUS</td>
			<td>ACCIDENTADO</td>	
			<td>Procedencia</td>
            <td>Hospital</td>
        
            <td>ENVIO</td>
            <td><b>DESCARGA Aviso de Accidente</b></td>
            <td><b>SERVICIO ADICIONAL</b></td>
            <td>Reportar Actividad</td>
            <td>Detalles del Accidente</td>

			
			</thead>
		</tr>";
  while($mostrar=mysqli_fetch_array($result)){
     
       echo "<tr><td class='ace'>".$mostrar['FolioAccidente']."</td>
       <td>".$mostrar['fechaHoraAccidente']."</a></td>
            <td class='";
            if ($mostrar['idEstatus'] =="1"){ echo "nuevo"; }
            if ($mostrar['idEstatus'] =="3"){ echo "ace"; }
            if ($mostrar['idEstatus'] =="5"){ echo "enhos"; }
            if ($mostrar['idEstatus'] =="6"){ echo "egr"; }
            if ($mostrar['idEstatus'] =="13"){ echo "enEspera"; }
            if ($mostrar['idEstatus'] =="7"){ echo "fin"; }
           
           
            echo "'>".$mostrar['nombreEstatus']."</td>
            <td><b>".strtoupper($mostrar['PrimerApellidoA'])." ".strtoupper($mostrar['SegundoApellidoA'])." ".strtoupper($mostrar['NombreA'])."</b></td>
            
            <td>".$mostrar['nombreEscuela']."</td>
            <td> <b>".$mostrar['nombreClinicaHospital']."</b></td>
       
            <td class='";
            if ($mostrar['envioAcc'] =="NO ENVIADO"){ echo "ace"; }
            if ($mostrar['envioAcc'] =="ENVIADO"){ echo "ace"; }
         
           
            echo "'>".$mostrar['envioAcc']."</td>";

            if ($mostrar['envioAcc'] =="NO ENVIADO"){
            echo "<td><a href='pdfdetailsAcc.php?idAcc=".$mostrar['idAcc']."' method='get' target='_blank'>Aviso de Accidente(PDF)</a></td>";
            }else
                {
                   echo " <td class='ace'></td>";
                }

            if($mostrar['idEstatus'] == 3 OR $mostrar['idEstatus'] == 5 OR $mostrar['idEstatus'] == 6 OR $mostrar['idEstatus'] == 7){

                if ($mostrar['envioAcc'] =="NO ENVIADO"){
                    echo " <td><a href='solicitarServicioAdicional.php?idAcc=".$mostrar['idAcc']."'>
                    <button class='submitbtn' style='font-size: 10px; width:120; background: #38A456'  >NUEVO SERVICIO <b>+</b></button></a></td>";
                    }else
                        {
                           echo " <td class='ace'></td>";
                        }

        }else{
                echo " <td class='rec'>OPCION NO DISPONIBLE</td>";

            }

            if($mostrar['idEstatus'] == 3){
                echo " <td><a href='arriboHospital.php?idAcc=".$mostrar['idAcc']."'>
                <button class='submitbtn' style='font-size: 10px'>REPORTAR ARRIBO</button></a></td>";
            }  if($mostrar['idEstatus'] == 5){
                echo "<td><a href='egresoHospital.php?idAcc=".$mostrar['idAcc']."'>
                <button class='submitbtn' style='background: #EA6E38; font-size: 10px'>REPORTAR EGRESO</button></a></td>";
            }if($mostrar['idEstatus'] == 13 OR $mostrar['idEstatus'] == 15){
                echo "<td class='enEspera'>DOCUMENTOS EN REVISION</button></td>";
            }if($mostrar['idEstatus'] == 7){
                echo "<td class='ace'>FINALIZADO <br> HOSPITAL</td>";
            }if($mostrar['idEstatus'] == 6){
                echo "<td class='egr'>EGRESADO</td>";
            }

            
           echo ' <td><a href ="detallesAccidenteHos.php?idAcc=';
             echo $mostrar['idAcc'].'">';
             echo '
           VER
            </a></td>';
            
          
}

echo "</tr></table>";
mysqli_close($conexion);
?>
 