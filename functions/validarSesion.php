<?php
include("../lib/conexionBD.php");

$username = $_REQUEST['username'];
$password = $_REQUEST['pass'];


$cnx= new PDO('mysql:host=localHost;dbname=vasegurobd', 'root', 'Q1w2e3r4.', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$res= $cnx->query("SELECT nombre,nivel, numHospital, perfilActivo FROM vasegurobd.tb_usuarios WHERE login = '$username' AND clave = '$password' ");


$datos=array();
$nivel="";

foreach ($res as $row){
 ?>
<center>
    <img src="../images/loading.gif" width="600" hight="600">
</center>
 <?php
  $datos[]=$row['nombre'];
    $nivel = $row['nivel'];
    $idhos = $row['numHospital'];
    $perfilActivo = $row['perfilActivo'];
    echo "<center><label style='color: darkblue; font-size: 22px;'> BIENVENIDO/A: </label>  <label style='color: black; font-size: 22px;'><b>".$row['nombre']."</b></label></center>";
}


$pagina = implode($datos);

if($pagina == ""){
?>

  <script type="text/javascript">
        
        localStorage.setItem('sessionValue', "");
        alert("USUARIO Y/O PASSWORD INCORRECTO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
</script>

<?php

}else{
      if($nivel == "3"){
          ?>




<script>
      <?php if($perfilActivo =="0"){ ?> 
            alert("ACCESO VERIFICADO TIPO DE USUARIO: ESCUELA");
        window.location= "../forms/inicioEsc.php";
        localStorage.setItem('sessionValue', "<?php echo $username; ?>");
        localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
        localStorage.setItem('nivel', "<?php echo $nivel; ?>");  
        <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
       <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
  
</script>

<?php         
}
      
      if($nivel == "1"){
?>


  <script type="text/javascript">
        <?php if($perfilActivo =="0"){ ?> 
            alert("ACCESO VERIFICADO TIPO DE USUARIO: SEMEDIC");
        window.location= "../forms/formAccidentadoAcc.php";
        localStorage.setItem('sessionValue', "<?php echo $username; ?>");
        localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
        localStorage.setItem('nivel', "<?php echo $nivel; ?>");  
        <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
         <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
          
</script>

<?php         
}
      
      if($nivel == "2"){
?>
  <script type="text/javascript">
     
            alert("ACCESO VERIFICADO TIPO DE USUARIO: HOSPITAL");
        window.location= "../forms/inicioHos.php";
      localStorage.setItem('sessionValue', "<?php echo utf8_encode($username); ?>");
        localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
        localStorage.setItem('nivel', "<?php echo $nivel; ?>");     
        localStorage.setItem('idHos', "<?php echo $idhos; ?>");    
        <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
        
        
</script>
<?php                     
      }
      if($nivel == "4"){
                        ?>
        <script type="text/javascript">
              <?php if($perfilActivo =="0"){ ?> 
                  alert("ACCESO VERIFICADO TIPO DE USUARIO: SUPER USUARIO");
                              window.location.href= "../forms/adminAccidentesSuperAdmin.php";
                              //window.location= "../forms/adminAccidentesSuperAdmin.php";
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>");  
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>  
               <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
       
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
                                  
                        </script>
                        <?php 
}

if($nivel == "0"){
      ?>
<script type="text/javascript">
              alert("USUARIO INVALIDO");
              window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
                 
      </script>
      <?php 
}


if($nivel == "5"){
      ?>
<script type="text/javascript">
              
              <?php if($perfilActivo =="0"){ ?> 
                  alert("PERFIL MEDICO");
                  window.location.assign("../forms/adminMedicosIn.php");
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>"); 
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
                 
               <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
            
      </script>
      <?php 
}

if($nivel == "6"){
      ?>
<script type="text/javascript">
      <?php if($perfilActivo =="0"){ ?> 
            alert("PERFIL ANALISTA DE SINIESTROS");
              window.location= "../forms/adminAuxMedIn.php";
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>"); 
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?> 
       <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
             
                 
                 
      </script>
      <?php 
}

If($nivel == "7"){
      ?>
<script type="text/javascript">
      <?php if($perfilActivo =="0"){ ?>
            alert("SEGUROS ATLAS");
              window.location= "../forms/adminSegAt.php";
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>"); 
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
        <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
              
      </script>
      <?php 
}

If($nivel == "8"){
      ?>
<script type="text/javascript">
      <?php if($perfilActivo =="0"){ ?>
            alert("BIENVENIDO A LA VISTA DE ESTADISTICAS Y FILTRAJE");
              window.location= "../forms/inicioAdmin.php";
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>"); 
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
        <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
              
      </script>
      <?php 

} If($nivel == "9"){
      ?>
<script type="text/javascript">
      <?php if($perfilActivo =="0"){ ?>
            alert("ADMINISTRADOR DE ARCHIVOS ENCUESTA");
              window.location= "../forms/adminAccidentesEncuesta.php";
                                localStorage.setItem('sessionValue', "<?php echo $username; ?>");
                                localStorage.setItem('nombreUsuario', "<?php echo $pagina; ?>");
                                localStorage.setItem('nivel', "<?php echo $nivel; ?>"); 
                                <?php $res= $cnx->query("UPDATE vasegurobd.tb_usuarios SET perfilActivo ='1' WHERE login = '$username' AND clave = '$password' "); ?>
        <?php }?>
        <?php if($perfilActivo =="1"){ ?> 
       alert("PERFIL EN USO");
        window.location= "../VistasVaseguro/loginVS/indexvaseguro.html";
        localStorage.clear();
         <?php }?>
              
      </script>
      <?php 
}





mysqli_close($cnx);

} 
?>
