<?php 

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ONLINE COMMERCE</title>
    <link rel="icon" href="./dashboard/assets/images/Logo.png" type="image/gif" sizes="16x16">

</head>
<body>  



<div id="content-page">


<?php 

include('./dashboard/include/head.php');
include('./session.php');


validar_sesion();


if($_GET['action'] == 'register'){
    include('./dashboard/modules/login/registrarse.php');
}else{
    include('./dashboard/modules/login/iniciar_sesion.php');
}


?>


</div>
<?php 

    include('./dashboard/include/footer.php');
    include('./');


?>

</body>
</html>