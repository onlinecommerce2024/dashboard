<?php


class usuario{

    public function crear(){
        $conexion = new Conexion();
        $conexion->create_conexion();

        $datos = $_POST;
        $columnas = implode(", ", array_keys($datos));
        $valores = "'" . implode("', '", $datos) . "'";
        
        $sql = "INSERT INTO usuarios ($columnas) VALUES ($valores)";
        $resultado = $conexion->consultar($sql);


    }

    public function editar(){
        $conexion = new Conexion();
        $conexion->create_conexion();

        $datos = $_POST;

        $columnas = implode(", ", array_keys($datos));
        $valores = "'" . implode("', '", $datos) . "'";
    
        $columnas_valores = [];
        foreach ($datos as $columna => $valor) {
            $columnas_valores[] = "{$columna} = '{$valor}'";
        }
        
        $columnas_valores_str = implode(", ", $columnas_valores);    
    
    
        $sql = "UPDATE usuarios SET  {$columnas_valores_str}  WHERE employee_id = '{$_GET['registro']}' ";
        $resultado = $conexion->consultar($sql);



    }




}



?>