
<?php
session_start();
include('../config.php');
include('../../../session.php');


$action = $_REQUEST['action'];
$conexion = new Conexion();
$conexion->create_conexion();


if ($action == 'agregar') {
    # code...
    agregar($conexion);

}elseif ($action == 'ver') {
    # code...
    $id=$_REQUEST['id'];

    ver($id,$conexion);
}elseif ($action == 'editar') {
    # code...
    $id=$_REQUEST['id'];


    editar($id,$conexion);
}else{
    echo "<script>alert('Petición incorrecta vuelve a interlo despues')</script>";
}







function agregar($conexion){

    ?>

                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Agregar producto</h2>
                    </div>

                    <form action="?actions=crear&module=tienda" method="post" enctype="multipart/form-data" >

                        <div class="uk-modal-body">
                        



                            <div class="uk-form-controls">
                                <input required class="uk-input" name="id_usuario"  id="form-stacked-text"
                                    type="hidden" value="<?php echo $_SESSION['id']; ?>">
                            </div>



                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre
                                    Producto</label>
                                <div class="uk-form-controls">
                                    <input required class="uk-input" name="nombreProducto" id="form-stacked-text"
                                        type="text" placeholder="Ejemplo : Buzo coler">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <textarea class="uk-textarea" rows="5" name="descripcion"
                                    placeholder="Descripción del producto"
                                    aria-label="Textarea"></textarea>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Precio
                                    Producto</label>
                                <div class="uk-form-controls">
                                    <input required class="uk-input" name="precio" id="form-stacked-text"
                                        type="number" placeholder="Ejemplo : 10000">
                                </div>
                            </div>

                            <?php //coleccion(NULL,$conexion); ?>
                            <?php categoria(NULL,$conexion); ?>
                            <?php //subcategoria(NULL,$conexion); ?>

                            <center>
                                <div class="uk-margin">
                                    <div uk-form-custom>
                                        <input  type="file" name="imagen" aria-label="Custom controls" >
                                        <button class="uk-button uk-button-default" type="button"
                                            tabindex="-1">Sube las imagenes del producto</button>
                                    </div>
                                </div>
                            </center>


                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close"
                                type="button">Cancelar</button>
                            <button class="uk-button uk-button-primary" type="submit">Guardar</button>
                        </div>
                    </form>

    <?php

}



function ver($id,$conexion){

    $sql_producto  = "SELECT * FROM producto WHERE idProducto={$id} and deleted = 0";
    $result_producto = $conexion->query($sql_producto);

    if ($result_producto->num_rows > 0) {

        // Recorrer los resultados y crear filas y columnas HTML
        while($row = $result_producto->fetch_assoc()) {


    ?>

                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Ver producto</h2>
                    </div>

                    <form action="?modulo=refresh_data&action=ver" method="post" enctype="multipart/form-data" >

                        <div class="uk-modal-body">
                        


                                <div class="uk-form-controls">
                                    <input required class="uk-input" name="tipo"  id="form-stacked-text"
                                        type="hidden" value="productos">
                                </div>


                            <div class="uk-margin">
                            <div class="uk-form-controls">

                                    <input required class="uk-input" name="id_usuario"  id="form-stacked-text"
                                        type="hidden" value="1">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre
                                    Producto</label>
                                <div class="uk-form-controls">
                                    <input required disabled class="uk-input" name="nombre" id="form-stacked-text"
                                        type="text" value="<?php echo $row['nombre']; ?>" placeholder="Ejemplo : Buzo coler">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <textarea class="uk-textarea" disabled rows="5" name="descripcion"
                                    placeholder="Descripción del producto"
                                    aria-label="Textarea" ><?php echo $row['descripcion']; ?></textarea>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Precio
                                    Producto</label>
                                <div class="uk-form-controls">
                                    <input required disabled class="uk-input" name="precio" id="form-stacked-text"
                                        type="number" value="<?php echo $row['precio']; ?>" placeholder="Ejemplo : 10000">
                                </div>
                            </div>

                            <?php coleccion($row['id_coleccion'],$conexion); ?>
                            <?php categoria($row['id_categoria'],$conexion); ?>
                            <?php subcategoria($row['id_subcategoria'],$conexion); ?>




                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close"
                                type="button">Cancelar</button>
                            <button class="uk-button uk-button-primary" disabled type="submit">Guardar</button>
                            <a class="uk-button uk-button-primary" style="color:#7473d2; background-color:black; border: solid white 2px;" href="#" onclick="editar_producto(<?php echo $row['id']; ?>)">Editar</a>

                        </div>
                    </form>

    <?php

            }

        } else {
            echo "<script>alert('El producto no existe {$sql_producto}');</script>";
        }   

}   




function editar($id,$conexion){

    $sql_producto  = "SELECT * FROM producto WHERE idProducto={$id} and deleted = 0";
    $result_producto = $conexion->consultar($sql_producto);

    if ($result_producto->num_rows > 0) {

        // Recorrer los resultados y crear filas y columnas HTML
        while($row = $result_producto->fetch_assoc()) {


    ?>

                    <div class="uk-modal-header">
                        <h2 class="uk-modal-title">Editar producto</h2>
                    </div>

                    <form action="?module=tienda&action=editar_producto&id_producto=<?php echo $row['idProducto']; ?>" method="post" enctype="multipart/form-data" >

                        <div class="uk-modal-body">
                        


                                <div class="uk-form-controls">
                                    <input required class="uk-input" name="tipo"  id="form-stacked-text"
                                        type="hidden" value="productos">
                                </div>
                                


                            <div class="uk-margin">
                            <div class="uk-form-controls">

                                    <input required class="uk-input" name="id_usuario"  id="form-stacked-text"
                                        type="hidden" value="1">
                                </div>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Nombre
                                    Producto</label>
                                <div class="uk-form-controls">
                                    <input required  class="uk-input" name="nombre" id="form-stacked-text"
                                        type="text" value="<?php echo $row['nombreProducto']; ?>" placeholder="Ejemplo : Buzo coler">
                                </div>
                            </div>

                            <div class="uk-margin">
                                <textarea class="uk-textarea"  rows="5" name="descripcion"
                                    placeholder="Descripción del producto"
                                    aria-label="Textarea" ><?php echo $row['descripcion']; ?></textarea>
                            </div>
                            <div class="uk-margin">
                                <label class="uk-form-label" for="form-stacked-text">Precio Producto</label>
                                <div class="uk-form-controls">
                                    <input required  class="uk-input" name="precio" id="form-stacked-text"
                                        type="number" value="<?php echo $row['precio']; ?>" placeholder="Ejemplo : 10000">
                                </div>
                            </div>



                  
                            <div class="uk-margin">
                                <?php categoria($row['Categoria_idCategoria'],$conexion); ?>
                                <?php categoria(NULL,$conexion); ?>

                            </div>                                         




                        </div>
                        <div class="uk-modal-footer uk-text-right">
                            <button class="uk-button uk-button-default uk-modal-close"
                                type="button">Cancelar</button>
                            <button class="uk-button uk-button-primary" type="submit">Guardar</button>

                        </div>
                    </form>

    <?php

            }

        } else {
            echo "<script>alert('El producto no existe {$sql_producto}');</script>";
        }   
    
}


function coleccion($id,$conexion){


    if($id != NULL){
        $sql_colecciones3  = "SELECT * FROM colecciones WHERE id = {$id} and deleted = 0";
        $result_colecciones3 = $conexion->query($sql_colecciones3);

        $name = ""; 
        $item = "green";
        $mensaje = " Se encuentra asignado";   
        
    }else{
        $sql_colecciones3  = "SELECT * FROM colecciones WHERE deleted = 0";
        $result_colecciones3 = $conexion->query($sql_colecciones3);
        $name = "id_coleccion"; 
        $item = "white";
        $mensaje = "";
    }



    ?>

                            <div class="uk-margin">
                                <select class="uk-select" style="background-color:<?php echo $item; ?>; color: black;" name="<?php echo $name; ?>" aria-label="Select">
                                    <?php 



                                        if ($result_colecciones3->num_rows > 0) {


                                            while($row = $result_colecciones3->fetch_assoc()) {
                                                echo "<option  value=\"".$row['id']."\">".$row['nombre']." {$mensaje}</option>";
                                            }


                                        }else if($id != NULL){
                                            echo "<option default style=\"color: red;\" value=\"\">No asignaste una coleccion</option>";

                                        }
                                        else {
                                            echo "<option default style=\"color: red;\" value=\"\">Primero crea una subcategoria</option>";
                                        }   

                                    ?>
                                </select>
                            </div>

    <?php

}


function categoria($id,$conexion){

    if ($id != NULL) {
        # code...
        $sql_categorias2  = "SELECT * FROM categoria WHERE id = {$id} ";
        $result_categorias2 = $conexion->consultar($sql_categorias2);
        $name = "";
        $item = "green";
        $mensaje = " Se encuentra asignado";   


    }else{
        $sql_categorias2  = "SELECT * FROM categoria";
        $result_categorias2 = $conexion->consultar($sql_categorias2);
        $name = "Categoria_idCategoria";
        $item = "white";
        $mensaje = "";

    }


    ?>

                            <div class="uk-margin">
                                <select class="uk-select" style="background-color:<?php echo $item; ?>; color: black;" name="<?php echo $name; ?>" aria-label="Select">
                                    <?php 



                                        if ($result_categorias2->num_rows > 0) {

                                                // Recorrer los resultados y crear filas y columnas HTML
                                                while($row = $result_categorias2->fetch_assoc()) {
                                                    echo "<option  value=\"".$row['idCategoria']."\">".$row['descripcion']."{$mensaje}</option>";
                                                }  

                                        }else if($id != NULL){
                                            echo "<option default style=\"color: red;\" value=\"\">No asignaste una categoria</option>";

                                        }                                                    else {
                                            echo "<option default style=\"color: red;\" value=\"\">Primero crea una categoria</option>";
                                        }   

                                    ?>
                                </select>
                            </div>

    <?php

}


function subcategoria($id,$conexion){


    if ($id != NULL) {
        # code...
        $sql_subcategorias2  = "SELECT * FROM subcategorias WHERE id = {$id} and deleted = 0";
        $result_subcategorias2 = $conexion->query($sql_subcategorias2);
        $name = "";
        $item = "green";
        $mensaje = " Se encuentra asignado";   

        
    } else{
        $sql_subcategorias2  = "SELECT * FROM subcategorias WHERE deleted = 0";
        $result_subcategorias2 = $conexion->query($sql_subcategorias2);
        $name= "id_subcategoria";
        $item = "white";
        $mensaje = "";

    }


    ?>

                            <div class="uk-margin">
                                <select class="uk-select" style="background-color:<?php echo $item; ?>; color: black;" name="<?php echo $name; ?>" aria-label="Select">
                                    <?php 





                                        if ($result_subcategorias2->num_rows > 0) {


                                                
                                                // Recorrer los resultados y crear filas y columnas HTML

                                                while($row = $result_subcategorias2->fetch_assoc()) {
                                                    echo "<option value=\"".$row['id']."\">".$row['nombre']."{$mensaje}</option>";
                                                }

                                        }else if($id != NULL){
                                            echo "<option default style=\"color: red;\" value=\"\">No asignaste una subcategoria</option>";

                                        }                                              
                                        else {
                                            echo "<option default style=\"color: red;\" value=\"\">Primero crea una subcategoria</option>";
                                        }   

                                    ?>
                                </select>
                            </div>

    <?php

}



    ?>










?>
