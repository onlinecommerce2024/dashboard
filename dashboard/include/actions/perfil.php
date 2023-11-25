<?php


class perfil{

    public function actualizar(){
        $conexion = new Conexion();
        $conexion->create_conexion();

        $sql = "SELECT * FROM usuarios WHERE employee_id = {$_GET['registro']}";
        $resultado = $conexion->consultar($sql);

        // if($_GET['action']){
        //     echo "datos";
    
        //     $action = new $_GET['action']();
        //     $metodo = $_GET['method'];
        //     $action->$metodo($resultado);
        // }
    }


}




?>