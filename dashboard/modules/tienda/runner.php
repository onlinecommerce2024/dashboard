<style>
    /* styles.css */

body {
    margin: 0;
    font-family: 'Arial', sans-serif;
}

.dashboard {
    display: flex;
}

.sidebar {
    width: 80px;
    background-color: #fcbf4f;
    border: solid 2px black;
    border-radius: 2px;
    color: #fff;
    padding-top: 20px;
}

.logo, .menu {
    text-align: center;
    margin-bottom: 20px;
}

.logo i, .menu a {
    font-size: 24px;
    color: #fff;
    text-decoration: none;
    display: block;
    padding: 10px;
}

.menu a:hover {
    background-color: #555;
}

.content-tienda {
    flex: 1;
    padding: 20px;
}

.content-tienda-inner {
    max-width: 800px;
    margin: 0 auto;
}

</style>

<div class="dashboard">
    <div class="sidebar">
        <!-- <div class="logo">
        </div> -->
        <div class="menu" >
            <a href="?module=tienda&tipo=ventas" class="active uk-animation-toggle" uk-tooltip="title: Ventas; pos: right"><i uk-icon="cart" class="uk-animation-slide-right"></i></a>
            <a href="?module=tienda&tipo=productos" class="uk-animation-toggle" uk-tooltip="title: Productos; pos: right" ><i uk-icon="tag" class="uk-animation-slide-right"></i></a>
            <a href="?module=tienda&tipo=tienda" class="uk-animation-toggle" uk-tooltip="title: Mi tienda; pos: right"><i uk-icon="home"  class="uk-animation-slide-right"></i></a>
            <a href="?module=tienda&tipo=solicitudes" class="uk-animation-toggle" uk-tooltip="title: Solicitudes; pos: right"><i uk-icon="comments"  class="uk-animation-slide-right"></i></a>
            <!-- Agrega más elementos según tus necesidades -->
        </div>
    </div>

    <div class="content-tienda">
        <!-- <div class="content-tienda-inner"> -->
            <!-- Contenido del módulo -->

            <?php


            if($_GET['tipo'] != NULL){
                include('./dashboard/modules/'.$_GET['module'].'/'.$_GET['tipo'].'.php');
            }else{
                include('./dashboard/modules/tienda/ventas.php');

            }



            ?>




        <!-- </div> -->
    </div>
</div>