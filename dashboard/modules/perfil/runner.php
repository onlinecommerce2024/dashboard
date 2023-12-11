<style>
@import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap");


.container-perfil {
    background: #E0E0E0;
    color: #1c1c1c;
    margin: 64px;
    border-radius: 20px;
    box-shadow: 6px 6px 6px #0e1d2f;
    padding: 64px;
    height: 140vh;
}

.perfil {
    display: flex;
    align-items: center;
}

.perfil-foto {
    border-radius: 460px;
    max-height: 160px;
    box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
}

.titulo {
    margin-left: 16px;
}

.titulo h1 {
    font-weight: 700;
    font-size: 36px;
}

.titulo h3 {
    font-weight: 400;
    font-size: 24px;
}

.projetos {
    display: flex;
    flex-direction: column;
}

@import url("https://fonts.googleapis.com/css?family=Roboto");

*,
*::before,
::after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}



.contenedor {
    max-width: 1170px;
    margin: 0 auto 1rem;
    padding: 1.5rem;
}

.wrapper {
    box-shadow: 0 0 20px 0 rgba(69, 90, 100, 0.7);
    border-radius: 5px;
}

@media screen and (min-width: 700px) {
    .wrapper {
        display: grid;
        grid-template-columns: 1fr 2fr;
    }
}

.servicios {
    list-style: none;
    text-align: center;
}

@media screen and (min-width: 700px) {
    .servicios {
        text-align: left;
    }
}

.logo {
    text-align: center;
    margin-bottom: 1rem;
}

.info-empresa {
    padding: 1rem;
    background-color: #fcc95a;
}

.info-empresa h3 {
    text-align: center;
}

@media screen and (min-width: 700px) {
    .info-empresa h3 {
        text-align: left;
        margin-bottom: 0.5rem;
    }
}

.nombre-empresa {
    color: #263137;
}

.contacto {
    padding: 1rem;
    background-color: #eaeff1;
}

.contacto h3 {
    margin-bottom: 1rem;
}

.formulario {
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-gap: 1.25rem;
}

.formulario label {
    display: block;
}

.formulario button,
.formulario input,
.formulario textarea {
    width: 100%;
    padding: 1rem;
    border: 1px solid #ccd7dc;
}

.formulario textarea {
    resize: none;
}

.full {
    grid-column: 1/3;
}

.boton-enviar {
    background-color: #ccd7dc;
    border: none;
    border-radius: 5px;
    text-transform: uppercase;
    font-weight: bold;
    cursor: pointer;
}

.boton-enviar:focus,
.boton-enviar:hover {
    background-color: #455a64;
    color: #fff;
    outline: 0;
    transition: background-color 2s ease-out;
}

.tendero {
    background-color: #E0E0E0;
    width: 100%;
    border: solid white 2px;
    border-radius: 5px;
}

.tendero:hover {
    background-color: white;
    width: 100%;
    border: solid white 2px;
    border-radius: 5px;
}


</style>

<div class="container-perfil">
    <header class="perfil">
        <img class="perfil-foto" src="./dashboard/assets/images/Logo.png" />
        <div class="titulo">
            <?php
                    $sql = "SELECT * FROM usuarios u INNER JOIN rol r ON u.Rol_idRol = r.idRol WHERE u.idUsuarios = '{$_SESSION['id']}'";
                    $result = $conexion->consultar($sql);
            
            
                    if ($result->num_rows > 0) {
            
                        // Recorrer los resultados y crear filas y columnas HTML
                        while($row = $result->fetch_assoc()) {
            
                            $id_usuario = $row['idUsuarios'];
                            $rol = $row['Rol_idRol'];
                            $nombre_rol = $row['descripcion'];
                            $correo = $row['user_name'];
                            $password = $row['contrasena'];
                            $nombre = $row['nombre'];
                            $apellido = $row['apellido'];
                            $cedula = $row['cedula'];
                            $direccion = $row['direccion'];
                            $barrio = $row['barrio'];
                        }

                      } else {

                        echo '
                        <script>
                            alert("Usuario y contraseña incorrectos");
                            location.href ="index.php"; 
                    
                        </script>
                    ';
                    
                    }   
        ?>
            <h1><?php echo $nombre."  ".$apellido; ?></h1>
            <h3><?php echo "<strong>Rol: </strong>  ".$nombre_rol; ?></h3>
        </div>
    </header>

    <div class="contenedor">
        <h1 class="logo" style="margin-bottom: 5vh"><span class="nombre-empresa" >Datos del perfil</span></h1>
        <div class="wrapper animated bounceInLeft">
            <div class="info-empresa">
                <h3>Online Commerce</h3>
                <ul class="servicios">
                    <?php

                        if($rol == 2){

                    ?>
                    <li>Administrar tienda <br><a href="?module=tienda"><button
                            class="uk-button uk-button-text tendero add-store-button">Administrar</button></a></li>
                    <br>
                    <?php


                        }elseif ($rol == 3) {
                            # code...
                    
                    ?>


                    <?php
        

                        }else{
                            ?>

<li>Tienes una tienda, agregala a online commerce desde aca . <br><a href="?module=register&tipo=tendero"><button
                            class="uk-button uk-button-text tendero add-store-button">Ser tendero</button></a></li>
                    <br>
                    <li>Quieres generar ingresos, trabaja con nosotros como domiciliario. <br><a href="?module=register&tipo=domiciliario"> <button
                            class="uk-button uk-button-text tendero add-store-button">Ser domiciliario</button></a></li>
                            <?php
                        }

                    ?>



                    <!-- <li><i class="fa fa-mobile"></i> 555 555 000</li>
          <li><i class="fa fa-envelope"></i> info@empresa.com</li> -->
                </ul>
            </div>
            <div class="contacto">
                <h3>Actualizar datos</h3>
                <form class="formulario">
                    <p>
                        <label>Nombre</label>
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>">
                    </p>
                    <p>
                        <label>Apellidos</label>
                        <input type="text" name="apellido" value="<?php echo $apellido; ?>">
                    </p>
                    <p>
                        <label>Correo</label>
                        <input type="text" name="user_name" disabled value="<?php echo $correo; ?>">
                    </p>
                    <p>
                        <label>Cedula</label>
                        <input type="text" name="direccion" disabled value="<?php echo $cedula; ?>">
                    </p>
                    <p>
                        <label>Barrio</label>
                        <input type="text" name="barrio" disabled value="<?php echo $barrio; ?>">
                    </p>
                    <p>
                        <label>Direccion</label>
                        <input type="text" name="direccion" disabled value="<?php echo $direccion; ?>">
                    </p>


                    <p class="full">
                        <button class="boton-enviar">Actualizar</button>
                    </p>
                </form>

            </div>
        </div>

    </div>

</div>
