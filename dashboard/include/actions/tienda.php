<?php




ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



        
    function guardarImagen() {
    
        $fecha_imagen = date('d_m_Y_H_i');
        $rutaImagen = 'dashboard/upload/';
        $nombreImagen = $_FILES["imagen"]["name"];
        $rutaImagen = $rutaImagen . $fecha_imagen.$nombreImagen;
    
    
        // Comprobamos si se ha subido un archivo
        if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $rutaImagen)) {
            echo "Imagen guardada en " . $rutaImagen;
        } else {
            echo "Error al guardar la imagen: " . error_get_last()['message'];
        }


        return $rutaImagen;
    
    }


    function crear(){
        
        $tipo = $_GET['tipo'];
        $imagen = $_FILES['imagen'];

        $conexion = new Conexion();
        $conexion->create_conexion();

        if($imagen != '' or $imagen != null){
        
            $ruta_imagen = guardarImagen(); 
            echo "Imagen guardada".$ruta_imagen;
        }else{
            $ruta_imagen = '';
        }

        $_POST['imagen'] = $ruta_imagen;

        $datos = $_POST;

        $columnas = implode(", ", array_keys($datos));
    
        $valores = "'" . implode("', '", $datos) . "'";
        



        $consulta = "INSERT INTO producto ($columnas) VALUES ($valores)";
    
        echo $consulta;
        if ($conexion->consultar($consulta)) {
        

            

                echo "Los datos han sido guardados correctamente. {$consulta}";
    
                echo '<script>
        
                var notifications = UIkit.notification(\'Registro guardado exitosamente\', \'success\');
        
                setTimeout(function() {
    
                    window.location.href = "?module=tienda&tipo=productos";
    
        
                }, 1000);
        
                </script>';


        } else {
    
            // echo "Error al guardar los datos: ".$consulta . mysqli_error($conexion);
            echo '<script>
    
            var notifications = UIkit.notification(\'Algo salio mal intentalo nuevamente\', \'danger\');
            setTimeout(function() {

                // window.location.href = "?modulo=blog";
            }, 1000);
    
            </script>';
    
        }
    }   


    function quitar(){

        $conexion = new Conexion();
        $conexion->create_conexion();

        $id_producto = $_GET['id_producto'];

        $consulta = "UPDATE producto SET deleted = 1 WHERE idProducto = {$id_producto}";
    

        if ($conexion->consultar($consulta)) {
        

            

                echo "Los datos han sido guardados correctamente. {$consulta}";
    
                echo '<script>
        
                var notifications = UIkit.notification(\'Registro guardado exitosamente\', \'success\');
        
                setTimeout(function() {
    
                    window.location.href = "?module=tienda&tipo=productos";
    
        
                }, 1000);
        
                </script>';


        } else {
    
            // echo "Error al guardar los datos: ".$consulta . mysqli_error($conexion);
            echo '<script>
    
            var notifications = UIkit.notification(\'Algo salio mal intentalo nuevamente\', \'danger\');
            setTimeout(function() {

                // window.location.href = "?modulo=blog";
            }, 1000);
    
            </script>';
    
        }
    }


    function actualizar_perfil($conexion){

    }


    if($_GET['actions'] != NULL){

        $actions = $_GET['actions'] ;

        $actions();

    }else{  

    }





?>