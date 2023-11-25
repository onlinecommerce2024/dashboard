<?php




if($_GET['action'] == 'excel'){
    include('../config.php');

    $conexion = new Conexion();
    $conexion->create_conexion();
    
    $sql = $_GET['sql'];
    
    $resultado = $conexion->consultar($sql);

    $action = new $_GET['action']();
    $metodo = $_GET['method'];
    $action->$metodo($resultado);
}


class excel{

    


    public static function exportar($tabla){

        if (empty($tabla)) {
            echo "No hay datos para exportar";
            return;
        }else{

        }

        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="datos.csv"');

        $archivo = fopen('php://output', 'w');

        $encabezado = array('ID', 'Nombre', 'Apellido', 'Correo', 'Telefono', 'Fecha', 'Salario');
        fputcsv($archivo, $encabezado);
    

        foreach ($tabla as $fila) {

            if (isset($fila['salary'])) {
                $fila['salary'] = number_format($fila['salary'], 0, ',', '.');
            }
            unset($fila['department_id']);
            unset($fila['trabajo_id']);
            fputcsv($archivo, $fila);
        }

        fclose($archivo);
    }


}


?>