<?php 
    error_reporting(0);

    session_start();    

    $datos = array(
    
        "correo"=> "alejandro@gmail.com",
        "password" => "123",
        "id"=>"25454",
        "rol"=> "admin",

    );

    $correo = $_REQUEST['correo'];
    $usuario = $_REQUEST['password'];
    

    if($_POST['correo'] != NULL and $_POST['password'] != NULL){
        crear_sesion($datos);
    }elseif ($_GET['close'] == 1) {
        # code...
        quitar_sesion();
    }
    else{

    }


    function crear_sesion($datos){

        $correo = $_REQUEST['correo'];
        $password = $_REQUEST['password'];  

        if($correo == $datos['correo'] and $password == $datos['password']){

            $_SESSION['correo'] = $correo;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $datos['id'];
            $_SESSION['rol'] = $datos['rol'];
            
            echo '
                <script>
                    alert("Autenticado correctamente");
                    location.href ="index.php"; 

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


    function validar_sesion(){

        $_SESSION['correo'];        
        $_SESSION['password'];        
        $_SESSION['id'];        
        $_SESSION['rol'];        

        if($_SESSION['correo'] != NULL and $_SESSION['password'] != NULL){
            echo '
            <script>
               
                location.href ="index.php"; 

            </script>
            ';
        }else{
            echo '
            <script>
            
                // alert("Usuario o contraseña incorrectos");

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


    function quitar_sesion(){
        session_destroy();
        echo '
        <script>
        
            location.href ="login.php"; 

        </script>
        ';
    }

?>