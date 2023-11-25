<?php

class session{


    public function crear_sesion(){
        $conexion = new Conexion();
        $conexion->create_conexion();


        $correo = $_REQUEST['correo'];
        $password = $_REQUEST['password'];  


        $sql = "SELECT * FROM usuarios WHERE user_name = '{$correo}' AND contrasena = '{$password}'";
        $result = $conexion->consultar($sql);

        $datos = array();

        if ($result->num_rows > 0) {

            // Recorrer los resultados y crear filas y columnas HTML
            while($row = $result->fetch_assoc()) {

                $datos['id'] = $row['idUsuarios'];
                $datos['rol'] = $row['Rol_idRol'];
                $datos['correo'] = $row['user_name'];
                $datos['password'] = $row['contrasena'];
                $datos['nombre'] = $row['nombre'];

            }

        } else {

            echo '
            <script>
                alert("Usuario y contraseña incorrectos");
                location.href ="index.php"; 

            </script>
        ';

        }   



        if($correo == $datos['correo'] and $password == $datos['password']){

            $_SESSION['correo'] = $correo;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $datos['id'];
            $_SESSION['rol'] = $datos['rol'];
            $_SESSION['nombre'] = $datos['nombre'];
            
            echo '
                <script>
                    alert("Autenticado correctamente");
                    window.location ="./index.php"; 

                </script>
            ';
        }else{
            echo '
            <script>
                alert("Usuario o contraseña incorrectos");

            </script>
        ';
        }


    }




    public function validar_sesion(){
        $_SESSION['correo'];        
        $_SESSION['password'];        
        $_SESSION['id'];        
        $_SESSION['rol'];        

        if($_SESSION['correo'] != NULL and $_SESSION['password'] != NULL){
            echo '
            <script>
               
                // window.location ="index.php"; 

            </script>
            ';
        }else{
            echo '
            <script>
                // window.location ="./login.php"; 
            

            </script>
            ';
        }


        try{

            $resultado = "todo bien";
        }catch(Exception $e){
            echo $e->getMessage();
        }
    
        return $resultado;
    }

    public function quitar_sesion(){
        session_destroy();
        echo '
        <script>
        
            window.location ="./login.php"; 

        </script>
        ';
    }

}



?>