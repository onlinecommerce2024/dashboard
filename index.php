<?php  
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    // error_reporting(E_ALL);
    error_reporting(0);
    session_start();
    require_once('./dashboard/include/config.php');

    include('./session.php');

    $conexion = new Conexion();

    $conexion->create_conexion();
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ONLINE COMMERCE</title>

<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/css/uikit.min.css" />
<link rel="stylesheet" type="text/css" href="theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->      


    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="theme-assets/css/pages/dashboard-ecommerce.css">

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.17.10/dist/js/uikit-icons.min.js"></script>
<link rel="icon" href="./dashboard/assets/images/Logo.png" type="image/gif" sizes="16x16">
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


</head>
<body>  

<style>

body{
  background-color: #ffffff;
}
.navbar {
    background-color: #fcc95a;
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }
  .search {
  display: inline-block;
  position: relative;
  margin-top: 0px;
}

.search input[type="text"] {
  width: 300px;
  height: 30px;
  padding: 10px;
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.search button[type="submit"] {
  background-color: #f8a232;
  height: 50px;
  border: none;
  color: #fff;
  cursor: pointer;
  padding: 10px 20px;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  position: absolute;
  top: 0;
  right: 0;
  transition: .9s ease;
}

.search button[type="submit"]:hover {
  transform: scale(1.1);
  color: rgb(255, 255, 255);
  background-color: blue;
}

.button-container {
  display: flex;
  background-color:transparent;
  width: 230px;
  height: 50px;
  align-items: center;
  justify-content: space-around;
  border-radius: 10px;
  margin-top: -5px;
 
}

.button {
  outline: 0 !important;
  border: 0 !important;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background-color: transparent;
  display: flex;
  align-items: center;
  justify-content: center;
  color: #000000;
  transition: all ease-in-out 0.3s;
  cursor: pointer;
}

.button:hover {
  transform: translateY(-3px);
}

.icon {
  font-size: 10px;
}

.Contenedor {
        
  max-width: 100%;
  height: 400px;
  background-size: 100% 100%; /* Ajusta la imagen para cubrir completamente el div */



  }
  #BotonFondo1,#BotonFondo2,#BotonFondo3,#BotonFondo4{
    border: transparent;
    color: #ffffff;
    font-size: 20px;
    margin-left: 95px;
    margin-top: 20px;
  }
  


  .barraProductos{
    display: flex;
    max-width: 90%;
    background-color: #ffffff;
    height: 60px;
    margin-left: 57px;
    margin-top: 30px;
    border-radius: 10px;
  }

  h1{
    margin-top: 2px;
    margin-left: 20px;

  }

  h2{
    margin-left: 72%;
    margin-top: 10px;
  }





.ContenedorCard{
  display: flex;
  max-width: 90%;
  background-color: #ffffff ;
  margin-left: 80px;
  margin-top: 10px;
}

.card-img {
    /* clear and add new css */
  transition: all 0.5s;
  display: flex;
  justify-content: center;
  
}

.card{
  margin-left: 20px;
}

.card {
 width: 190px;
 height: 342px;
 padding: .8em;
 background: #ffffff;
 position: relative;
 overflow: visible;
 box-shadow: 0 3px 3px rgba(0,0,0,0.12), 0 3px 2px rgba(0,0,0,0.24);

}

.card-img {
 background-color: #ffffff;
 height: 40%;
 width: 100%;
 border-radius: .5rem;
 transition: .3s ease;
}

.card-info {
 padding-top: 10%;
}

svg {
 width: 20px;
 height: 20px;
}

.card-footer {
 width: 100%;
 display: flex;
 justify-content: space-between;
 align-items: center;
 padding-top: 10px;
 border-top: 1px solid #ddd;
}

/*Text*/
.text-title {
 font-weight: 900;
 font-size: 1.2em;
 line-height: 1.5;
}

.text-body {
 font-size: .9em;
 padding-bottom: 10px;
}

/*Button*/
.card-button {
 border: 1px solid #252525;
 display: flex;
 padding: .3em;
 cursor: pointer;
 border-radius: 50px;
 transition: .3s ease-in-out;
}

/*Hover*/
.card-img:hover {
 transform: translateY(-25%);
 box-shadow: rgba(226, 196, 63, 0.25) 0px 13px 47px -5px, rgba(238, 166, 12, 0.3) 0px 8px 16px -8px;
}

.card-button:hover {
 border: 10px solid #f08035;
 background-color: #f38237;
}



/* Barra bienvenida */
.welcome-container {
    display: flex;
    max-width: 100%;
    align-items: center;
    justify-content: space-between;
    background-color: #ffffff;
    padding: 10px;


}

.buttons {
    display: flex;
    gap: 10px;
    margin-right: 20px;
}

.quote-button, .add-store-button {
    padding: 12px 16px;
    background-color: #f38237;
    color: #fff;
    border: none;
    cursor: pointer;
}

.quote-button:hover, .add-store-button:hover {
    background-color: #0f45da;
}

#textBienvenido{
  margin-left: 10px;
  font-weight: 700;
}



/* Seccion de ofertas */
.scroll-1::-webkit-scrollbar {
  width: 8px;
  height: 8px;
}

.scroll-1::-webkit-scrollbar-thumb {
  border-radius: 20px;
  background: #888;
}

.container * {
  box-sizing: border-box;
  padding: 0;
  margin: 0;
  color: #fff;
}

.container {
  display: flex;
  overflow-x: scroll;
  padding: 24px;
  width: 90%;
  scroll-snap-type: x mandatory;
  scroll-padding-top: 24px;
  border-radius: 8px;
  gap: 10px;
  margin: auto;
}

.container .card {
  flex: 0 0 100%;
  overflow: hidden;
  border-radius: 8px;
  background-color: #141414;
  scroll-snap-align: start;
}

.card .card__image {
  flex: 1;
  background: url('/dashboard/imagenes/tiendas.png') no-repeat;


}


/* Top Productos Barra */
.Top-container{
  display: flex;
    max-width: 100%;
    background-color: #ffffff;
    padding: 10px;    
}

.barra-productos {
    justify-content: center;
    display: flex;
    max-width: 100%;
    margin-left: 45px;
}

@media screen and (max-width: 768px) {
.barra-productos {
    max-width: 100%;
    margin:auto;
    flex-direction: column;

    }
}


.producto {
    margin: 20px;
    text-align: center;
    box-shadow: 0 7px 7px rgba(0, 0, 0, 0.1);
    padding: 20px;

}

.producto img {
    max-width: 100px;
    
}

.agregar {
    background-color: #f8a232;
    color: #fff;
    border: none;
    padding: 10px 10px;
    cursor: pointer;
    font-size: 20px;
    margin-bottom: 10px;
    border-radius: 10px;
}

/* footer */

.page {
    background-color: #f8f8f8;
    padding: 20px;
    text-align: center;
    font-family: Arial, sans-serif;
    color: #333;
    border-top: 1px solid #ccc;
}

/* .type {
    margin-top: 20px;
} */

/* .text-center {
    text-align: center;
    margin-bottom: 10px;
} */

/* Estilos para pantallas más pequeñas (menos de 768px) */
@media screen and (max-width: 768px) {
    .page {
        padding: 10px;
        margin-top: 300px;
    }
}


button {
  /* Para que el texto sea más pequeño */
  font-size: 0.9rem;
  /* Para que el texto no quede tan pegado al borde del input */
  padding: 0.3rem;
}
/* Botones */
button {
  background: #026aa7;
  box-shadow: inset 0 -4px 0 0 rgba(0, 0, 0, 0.2);
  padding: 0.5rem 1rem;
  color: #ddd;
  outline: none;
  border: none;
  cursor: pointer;
}
button:hover {
  box-shadow: inset 0 -4px 0 0 rgba(0, 0, 0, 0.6), 0 0 8px 0 rgba(0, 0, 0, 0.5);
}
button:active {
  box-shadow: inset 0 3px 5px 0 rgba(0, 0, 0, 0.2);
}
/* header, #content-page {
            flex: 1;
            padding: 20px;
            background-color: #f0f0f0;
        } */

  footer {
      padding: 10px;
      background-color: #333;
      color: white;
      text-align: center;
  }

</style>
<?php 

include('./dashboard/include/head.php');


if($_SESSION['id'] != NULL){
    // include('module/admin');
    // echo "Se tiene una sesion abierta";
}else{

    echo '<script> 

    window.location = "./login.php";

    </script>';
    echo "No se tiene ninguna sesion abierta";
}


?>



<div id="content-page">

<?php


if($_GET['module'] != NULL){
    include('./dashboard/modules/'.$_GET['module'].'/runner.php');
    if($_GET['actions'] != NULL){
      include('./dashboard/include/actions/'.$_GET['module'].'.php');
    }
}else{
    include('./dashboard/modules/home/runner.php');

}



?>


</div>

<?php


// include('./dashboard/modules/'.$_GET['module'].'/runner.php');

include('./dashboard/include/footer.php');

?>




</body>
</html>