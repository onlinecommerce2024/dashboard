<style>

body{
  background-color: #ffffff;


}
    

.Head {
    background-color: #fcbf4f;
    max-width: 100%;
    display: flex;
    padding: 20px;

}


.search {
  display: inline-block;
  position: relative;
  margin-top: 0px;
  margin: auto;
}


.search input[type="text"] {    
  width: 300px;
  height: 30px;
  padding: 10px;
  border: none;
  border-radius: 20px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
@media screen and (max-width: 768px) {
    .search input {
        max-width: 200px;

    }
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
  max-width: 10%;
  height: 50px;
  justify-content: space-around;
  border-radius: 10px;
  margin-left: auto; /* Empuja el contenedor hacia el lado derecho */
}
@media screen and (max-width: 768px) {
    .button-container {
        margin-right: 23px;
    }
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
</style>

<div class="Head">

    <!--Logo-->
    <div class="logo" uk-tooltip="Inicio"><img src="./dashboard/assets/images/Logo.png" width="50px" height="40px"></div>



    <?php   
    
        error_reporting(0);


        if ($_SESSION['id'] != NULL) {
          # code...

    ?>

        <!--Barra Busqueda-->
        <div class="search">
    <input placeholder="Buscar" type="text">
    <button type="submit">Go</button>
    </div>

    <!--Botones-->
    <div class="button-container">
    <a href="?module=home" uk-tooltip="Inicio">
    <button class="button">
        <img src="./dashboard/assets/images/casa (2).png">
    </button>
    </a>

      <a href="?module=perfil"  uk-tooltip="<?php echo $_SESSION['nombre']; ?>">
        <button class="button"> 
            <img src="./dashboard/assets/images/usuario (1).png">
        </button>
      </a>
      <a href="?close=1"  uk-tooltip="Salir de la sesión">
        <button class="button"> <i uk-icon="sign-in"></i>    </button>
      </a>
      <a href="?module=compras" uk-tooltip="Ver compras">
    <button class="button"> 
        <img src="./dashboard/assets/images/carrito-de-compras (2).png">
    </button>
    </a>
    <?php

        }else{

          ?>

        <!--Barra Busqueda-->
        <div class="search">
    <!-- <input placeholder="Search..." type="text">
    <button type="submit">Go</button> -->
    </div>
    <a href="?">
      <button class="button" uk-tooltip="Iniciar sesión"> 
          <img src="./dashboard/assets/images/usuario (1).png">
      </button>
    </a>


    <?php

        }

    ?>








    </div>

</div>