


    <!--Fondo-->
  <div class="Contenedor" style="background-image: url(./dashboard/imagenes/fondo.png);">


  


      <div class="uk-inline">
        <button class="uk-button uk-button-default" type="button"  id="BotonFondo1">Categorias</button>
        <div uk-dropdown="pos: bottom-center">
            <ul class="uk-nav uk-dropdown-nav">
            <?php
            $sql = "SELECT * FROM categoria LIMIT 10";
            $result = $conexion->consultar($sql);
    
    
            if ($result->num_rows > 0) {
    
                // Recorrer los resultados y crear filas y columnas HTML
                while($row = $result->fetch_assoc()) {



        ?>

            <li><a href="#"><?php echo $row['descripcion'] ?></a></li>

        

        <?php

        }
            }else {



            }   

    ?>

  
            </ul>
        </div>
      </div>


      <div class="uk-inline">
          <button class="uk-button uk-button-default" type="button"  id="BotonFondo2">Tiendas</button>
        <div uk-dropdown="pos: bottom-center">
          <ul class="uk-nav uk-dropdown-nav">

          <?php
            $sql = "SELECT * FROM local LIMIT 10";
            $result = $conexion->consultar($sql);
    
    
            if ($result->num_rows > 0) {
    
                // Recorrer los resultados y crear filas y columnas HTML
                while($row = $result->fetch_assoc()) {



        ?>

            <li><a href="#"><?php echo $row['nombreLocal'] ?></a></li>

        

        <?php

        }
            }else {



            }   

    ?>

          </ul>
        </div>
       </div>

     
<!--       
      <div class="uk-inline">
        <button class="uk-button uk-button-default" type="button"  id="BotonFondo3">Bottom Center</button>
        <div uk-dropdown="pos: bottom-center">
            <ul class="uk-nav uk-dropdown-nav">
                <li class="uk-active"><a href="#">Active</a></li>
                <li><a href="#">Item</a></li>
                <li class="uk-nav-header">Header</li>
                <li><a href="#">Item</a></li>
                <li><a href="#">Item</a></li>
                <li class="uk-nav-divider"></li>
                <li><a href="#">Item</a></li>
            </ul>
        </div>
      </div>

     
      
      <div class="uk-inline">
      <button class="uk-button uk-button-default" type="button"  id="BotonFondo4">Bottom Center</button>
      <div uk-dropdown="pos: bottom-center">
          <ul class="uk-nav uk-dropdown-nav">
              <li class="uk-active"><a href="#">Active</a></li>
              <li><a href="#">Item</a></li>
              <li class="uk-nav-header">Header</li>
              <li><a href="#">Item</a></li>
              <li><a href="#">Item</a></li>
              <li class="uk-nav-divider"></li>
              <li><a href="#">Item</a></li>
          </ul>
      </div>
      </div> -->

     
      

  </div>


    
    <!--Barra de Bienvenida-->
    <div class="welcome-container">
      <h2 id="textBienvenido">Bienvenido a Online Commerce</h2>
      <div class="buttons">
          <button class="quote-button">Realizar Cotización</button>
          <!-- <button class="add-store-button">Agregar Tienda</button> -->
      </div>
    </div>

    <!--Seccion de ofertas-->
    <div class="container scroll-1">

      <div class="card">
        <div class="card__image" style="width: 100%; height: 100%; overflow: hidden;">
            <img src="./dashboard/imagenes/banner_tienda.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>      
      </div>

      

      <div class="card">
      <div class="card__image" style="width: 100%; height: 100%; overflow: hidden;">
        <img src="./dashboard/imagenes/banner_tienda.png" style="width: 100%; height: 100%; object-fit: cover;" alt="">
        </div>      
      </div>

    </div>



    <!--Top Ranking Productos --> 
    <div class="Top-container">
      <h2 id="textBienvenido">Top Ranking</h2>
     
    </div>

    <center>

    <div class="barra-productos">
      
    <?php
            $sql = "SELECT * FROM producto WHERE imagen != '' and deleted = 0 LIMIT 5 ";
            $result = $conexion->consultar($sql);
    
    
            if ($result->num_rows > 0) {
    
                // Recorrer los resultados y crear filas y columnas HTML
                while($row = $result->fetch_assoc()) {

                    if($row['imagen'] == '' || $row['imagen'] == NULL){
                        $imagen = './dashboard/assets/images/Logo.png';
                    }else{
                        $imagen = "{$row['imagen']}";

                    }

        ?>


      <div class="producto">
          <img src="<?php echo $imagen; ?>" alt="Producto 2">
          <h3><?php echo $row['nombreProducto']; ?></h3>
          <p><?php echo $row['descripcion']; ?></p>
          <p><?php echo $row['precio']; ?></p>
          <button class="agregar">Agregar al Carrito</button>
      </div>
        <?php

        }
            }else {



            }   

        ?>


      <!-- Añade más productos según necesites -->
  <!-- </div> -->

</div>
</center>


