<?php




// LLAMADO DE DATOS 

$action = $_REQUEST['method'];
$tipo = $_REQUEST['tipo'];


$fecha = date('d-m-Y');


$datos = $_POST;

$id = $_REQUEST['id'];




function registro_usuario($tipo,$id,$datos,$conexion) {

    $conexion = new Conexion();
    $conexion->create_conexion();

    $columnas = implode(", ", array_keys($datos));
    $valores = "'" . implode("', '", $datos) . "'";
    
    $consulta = "INSERT INTO usuarios ($columnas) VALUES ($valores)";
    

    

    
    // Insertar datos en la base de datos
    
    

    
    if ($conexion->consultar($consulta)) {
        echo "Los datos han sido guardados correctamente.";


        echo '<script>
        var notifications = UIkit.notification(\'Registro guardado exitosamente\', \'success\');
        setTimeout(function() {

            window.location.href = "?";

        }, 1000);
        </script>';


    } else {
        echo "Error al guardar los datos: ".$consulta . mysqli_error($conexion);

        echo '<script>
        var notifications = UIkit.notification(\'Algo salio mal intentalo nuevamente\', \'danger\');
        setTimeout(function() {

            // window.location.href = "";

        }, 1000);
        </script>';


    }




}



function modificar($tipo,$id,$datos,$conexion){

    $fecha = date('d-m-Y H:i');
    $tabla = $_REQUEST['modulo'];

    $columnas = implode(", ", array_keys($datos));
    $valores = "'" . implode("', '", $datos) . "'";

    $columnas_valores = [];
    foreach ($datos as $columna => $valor) {
        $columnas_valores[] = "{$columna} = '{$valor}'";
    }
    
    $columnas_valores_str = implode(", ", $columnas_valores);    


    $consulta = "UPDATE {$tabla} SET  {$columnas_valores_str}  WHERE id = '{$id}' ";

    echo $consulta;

}




function borrar($tipo,$id,$conexion){

    $consulta = "UPDATE $tipo SET deleted = 1 WHERE id='$id'";
    if (mysqli_query($conexion, $consulta)) {
        echo "Los datos han sido guardados correctamente.";


        echo '<script>
        var notifications = UIkit.notification(\'Registro borrado exitosamente\', \'success\');
        setTimeout(function() {

            window.location.href = "?modulo='.$_GET['modulo'].'";

        }, 1000);
        </script>';
    } else {
        echo "Error al guardar los datos: ".$consulta . mysqli_error($conexion);

        echo '<script>
        var notifications = UIkit.notification(\'Algo salio mal intentalo nuevamente\', \'danger\');
        setTimeout(function() {

            window.location.href = "?modulo='.$_GET['modulo'].'";

        }, 1000);
        </script>';


    }



}




if($action){
    $action($tipo,$id,$datos,$conexion);

}




?>