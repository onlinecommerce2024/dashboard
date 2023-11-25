<?php 



    // global $conexion;

    // // Conexión a la base de datos
    // $host = "localhost";
    // $usuario = "root";
    // $contraseña = "";
    // $baseDeDatos = "onlinecommerce";
    // $conexion = mysqli_connect($host, $usuario, $contraseña, $baseDeDatos);

    // // Verificar conexión
    // if (!$conexion) {
    //     die("Error al conectar con la base de datos: " . mysqli_connect_error());
    // }



    


?>
<?php

class conexion{

    public $conexion;


    public function create_conexion(){


        // Conexión a la base de datos  
        $host = "localhost";
        $usuario = "root";
        $contraseña = "";
        $baseDeDatos = "onlinecommerce";

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