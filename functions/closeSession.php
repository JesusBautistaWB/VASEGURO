<?php
  include("/phpfunctions.php"); 

$link = con();

$pa= $_GET['pa'];
        

$sql = "UPDATE vasegurobd.tb_usuarios SET perfilActivo ='0' WHERE login = '$pa'";
mysqli_query($link,$sql) or die (mysqli_error($link));

mysqli_close($link);

?>

<script>
localStorage.setItem('sessionValue', "");
localStorage.setItem('nombreUsuario', "");
localStorage.setItem('nivel', ""); 
window.location= "../VistasVaseguro/loginVS/indexvaseguro.html"; 

</script>


  
