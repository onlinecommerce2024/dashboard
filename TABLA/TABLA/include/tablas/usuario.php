<?php

class usuario_view{

    public function ver(){
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
        
    
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                // print_r($fila);
        
                


        ?>
        <form action="#" method="post">
            <fieldset class="uk-fieldset">
                <center>
                <legend class="uk-legend">Ver usuario</legend>
                </center>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="first_name" disabled value="<?php echo $fila['first_name'] ?>" placeholder="Nombre" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="last_name" disabled value="<?php echo $fila['last_name'] ?>" placeholder="Apellido" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" name="email" disabled value="<?php echo $fila['email'] ?>" placeholder="Correo" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" name="phone_number" disabled value="<?php echo $fila['phone_number'] ?>" placeholder="Telefono" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="date" name="fecha" disabled value="<?php echo $fila['fecha'] ?>" placeholder="fecha" aria-label="Input">
                </div>

                <div class="uk-margin">
                    <select class="uk-select" required name="department_id"  disabled aria-label="Select">
                    <option value="<?php echo $fila['department_id'] ?>"><?php echo $fila['department_name'] ?></option>
                <?php
                    $listas = new listas();
                    $listas->department();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <select class="uk-select" required name="trabajo_id" disabled aria-label="Select">
                    <option value="<?php echo $fila['job_id'] ?>"><?php echo $fila['job_title'] ?></option>

                <?php
                    $listas = new listas();
                    $listas->trabajo();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" disabled name="salary" value="<?php echo $fila['salary'] ?>" placeholder="Salario" aria-label="Input">
                </div>
                <center>
                <div class="uk-margin">
                </div>
                </center>

            </fieldset>
        </form>
    <?php
            }
        }
    ?>

    <?php

    }

    public function editar(){

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
        
    
        if ($resultado->num_rows > 0) {
            while ($fila = $resultado->fetch_assoc()) {
                // print_r($fila);
        
                


        ?>
        <form action="?action=usuario&method=editar&registro=<?php echo $_GET['registro']; ?>" method="post">
            <fieldset class="uk-fieldset">
                <center>
                <legend class="uk-legend">Editar usuario</legend>
                </center>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="first_name" value="<?php echo $fila['first_name'] ?>" placeholder="Nombre" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="last_name" value="<?php echo $fila['last_name'] ?>" placeholder="Apellido" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" name="email" value="<?php echo $fila['email'] ?>" placeholder="Correo" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" name="phone_number" value="<?php echo $fila['phone_number'] ?>" placeholder="Telefono" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="date" name="fecha" value="<?php echo $fila['fecha'] ?>" placeholder="fecha" aria-label="Input">
                </div>

                <div class="uk-margin">
                    <select class="uk-select" required name="department_id"  aria-label="Select">
                    <option value="<?php echo $fila['department_id'] ?>"><?php echo $fila['department_name'] ?></option>
                <?php
                    $listas = new listas();
                    $listas->department();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <select class="uk-select" required name="trabajo_id" aria-label="Select">
                    <option value="<?php echo $fila['job_id'] ?>"><?php echo $fila['job_title'] ?></option>

                <?php
                    $listas = new listas();
                    $listas->trabajo();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" name="salary" value="<?php echo $fila['salary'] ?>" placeholder="Salario" aria-label="Input">
                </div>
                <center>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary" type="submit">Editar</button>
                </div>
                </center>

            </fieldset>
        </form>
    <?php
            }
        }

    }

    public function crear(){

    ?>
        <form action="?action=usuario&method=crear" method="post">
            <fieldset class="uk-fieldset">
                <center>
                <legend class="uk-legend">Crear usuario</legend>
                </center>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="first_name" placeholder="Nombre" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="text" name="last_name" placeholder="Apellido" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="email" name="email" placeholder="Correo" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" name="phone_number" placeholder="Telefono" aria-label="Input">
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="date" name="fecha" placeholder="fecha" aria-label="Input">
                </div>

                <div class="uk-margin">
                    <select class="uk-select" required name="department_id" aria-label="Select">
                    <option >Departamento</option>
                <?php
                    $listas = new listas();
                    $listas->department();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <select class="uk-select" required name="trabajo_id" aria-label="Select">
                    <option >Trabajo</option>

                <?php
                    $listas = new listas();
                    $listas->trabajo();
                ?>
                    </select>
                </div>
                <div class="uk-margin">
                    <input class="uk-input" type="number" name="salary" placeholder="Salario" aria-label="Input">
                </div>
                <center>
                <div class="uk-margin">
                    <button class="uk-button uk-button-primary" type="submit">Crear</button>
                </div>
                </center>

            </fieldset>
        </form>
    <?php


    }

}


?>