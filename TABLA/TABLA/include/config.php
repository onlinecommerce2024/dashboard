<?php

class conexion{

    public $conexion;


    public function create_conexion(){


        // Conexión a la base de datos  
        $host = "localhost";
        $usuario = "alejo";
        $contraseña = "123Alejandro.";
        $baseDeDatos = "base_adso_php";

        $this->conexion = new mysqli($host, $usuario, $contraseña, $baseDeDatos);

        if ($this->conexion->connect_errno) {
            echo "Error en la conexión: " . $this->conexion->connect_error;
        } else {
            // echo "Conexión exitosa";
        }
    }

    public function consultar($query){
        $sql = $query;
        $resultado = $this->conexion->query($sql);
        return $resultado;
    }


}

?>