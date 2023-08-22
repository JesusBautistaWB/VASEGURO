<html>
<head>
 
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html">
  <title>Aviso de Accidente VASEGURO</title>
  
 
  <link rel="stylesheet" type="text/css" media="all" href="css/styles.css">
  <link rel="stylesheet" type="text/css" media="all" href="css/switchery.min.css">
  <script type="text/javascript" src="js/switchery.min.js"></script>
      <script type="text/javascript" src="js/jquery-3.5.1.js"></script>
      <script type="text/javascript" src="js/sistema.js"></script>
      <script type="text/javascript" src="js/securityAdmin.js"></script>
      <script>
function sendForm(){

 

return confirm('Se enviara el accidente para su respectivo proceso. ¿Desea continuar?') ;
if (result) {

  window.onkeypress = function(event) {
  if (event.which == 32) {
   return false;
  }
}
  
}

}

</script>
</head> 
<body>
    
 
    <div class="header">   
       <?php 
    echo "<img src='../images/ATLAS1.PNG' height='60'  width='500'> <br>
    <span class='titleHeader'>   PRUEBAS </span>";  
   include("../functions/phpfunctions.php");
    menuAdmin();
    ?>

    </div>
  
  <?php formularioPrincipal(); ?>
</body>
    
      
</html>