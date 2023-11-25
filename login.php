<?php 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();    




?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE COMMERCE</title>
    <link rel="icon" href="./dashboard/assets/images/Logo.png" type="image/gif" sizes="16x16">
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/css/uikit.min.css" />


<!-- UIkit JS -->
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit-icons.min.js"></script>

</head>
<body>  



<div id="content-page">


<?php 
require_once('./dashboard/include/config.php');

include('./dashboard/include/head.php');
include('./session.php');

$session = new session();


if($_POST['correo'] != NULL and $_POST['password'] != NULL){

    require_once('./dashboard/include/config.php');

    $session->crear_sesion();

  }elseif ($_GET['close'] == 1) {
      # code...
      $session->quitar_sesion();
  }
  else{
    $session->validar_sesion();
      // validar_sesion($datos,$conexion);
  }
  


if($_GET['action'] == 'register'){
    include('./dashboard/modules/login/registrarse.php');
    include('./dashboard/include/actions/login.php');
}else{
    include('./dashboard/modules/login/iniciar_sesion.php');
    include('./dashboard/include/actions/login.php');
}


?>


</div>
<?php 

    include('./dashboard/include/footer.php');
    include('./');


?>

</body>
</html>