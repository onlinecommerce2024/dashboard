<?php

class listas{

    public function department(){

        $conexion = new Conexion();
        $conexion->create_conexion();
        $sql = "SELECT * FROM departments";
        $resultado = $conexion->consultar($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {


         echo   "<option value=\"{$fila['department_id']}\">{$fila['department_name']}</option>";

            }
        }

    }

    public function trabajo(){
        $conexion = new Conexion();
        $conexion->create_conexion();
        $sql = "SELECT * FROM jobs";
        $resultado = $conexion->consultar($sql);
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {

                echo   "<option value=\"{$fila['job_id']}\">{$fila['job_title']}</option>";


            }
        }
    }


}



?>