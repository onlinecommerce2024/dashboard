<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lectura ,  Filtrado , Multi criterio y exportacion</title>
        <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.17.11/dist/js/uikit-icons.min.js"></script>
</head>
<body>
<style>

    .contenido-tabla {
        width: 80%;
        margin: 0 auto;
    }

    table {
        width: 100%; 
    }

    h1{
        text-align: center;
        color: aqua;
    }

    a{
        text-decoration: none !important;
        color: aqua;
    }

</style>

<?php

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

$carpeta = './include/';

$iterador = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($carpeta));

foreach ($iterador as $archivo) {
    if ($archivo->isFile() && $archivo->getExtension() == 'php') {
        include($archivo->getPathname());
    }
}


    $conexion = new Conexion();
    $conexion->create_conexion();

    $tabla = new tabla();

    if($_GET['tabla']){
        $metodo_tabla = $_GET['tabla'];
        $sql = $tabla->$metodo_tabla();
    }else if($_GET['dato']){
        $sql = $tabla->dato($_GET['dato']);
    }else if($_GET['view']){
        $view = $_GET['view'].'_view';
        $view = new $view();

    }
    else{
        $sql = $tabla->view();
    }


    if($_GET['action'] and $_GET['method']){

        $action = $_GET['action'];
        $method = $_GET['method'];

        $action = new $action();
        $action->$method();


    }   



?>
<center>
    <h1>   Lectura, Filtrado , Multi criterio y exportacion.</h1>   
</center>

<br><br>

<?php

    if($view != NULL and $_GET['method']){
        $metodo = $_GET['method'];

        $view->$metodo();

    }



?>


<p uk-margin>
    <button class="uk-button uk-button-primary"><a href="?view=usuario&method=crear">Crear usuario <i uk-icon="user"></i> </a></button>
    <button class="uk-button uk-button-secondary" onclick="copiarDatos()">Copiar <i uk-icon="copy"></i></button>
    <button class="uk-button uk-button-secondary"><a href="./include/actions/excel.php?action=excel&method=exportar&sql=<?php echo $sql; ?>">Excel <i uk-icon="file-text"></i> </a></button>
    <button class="uk-button uk-button-danger" onclick="generarPDF()">PDF <i uk-icon="file-pdf"></i></button>
    <button class="uk-button uk-button-danger" onclick="imprimir()">Print <i uk-icon="print"></i></button>
</p>






<nav class="uk-navbar-container" uk-navbar>
    <div class="uk-navbar-left">

        <div class="uk-navbar-item">
            <form action="?tabla=buscar" class="uk-search uk-search-navbar" method="post" >
                <span uk-search-icon></span>
                <input class="uk-search-input" type="search" name="buscar" placeholder="Buscar puedes buscar por datos" aria-label="Search">

            </form>
        </div>

    </div>
</nav>

<div class="contenido-tabla">
<table id="datos_usuarios" class="uk-table uk-table-responsive uk-table-divider">
    <thead>
        <tr>
            <th>id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Fecha</th>
            <th>Salario</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
<?php



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
    
            
            $salario = number_format($fila['salary'], 0, ',', '.');

?>



<?php

    echo "<tr> <td>{$fila['employee_id']}</td> <td>{$fila['first_name']}</td> <td>{$fila['last_name']}</td> <td>{$fila['email']}</td> <td>{$fila['phone_number']}</td> <td>{$fila['fecha']}</td> <td>$ {$salario}</td>  <td ><a href=\"?view=usuario&method=ver&registro={$fila['employee_id']}\"><i uk-icon=\"eye\"></i></a> </td>  <td><a href=\"?view=usuario&method=editar&registro={$fila['employee_id']}\"> <i uk-icon=\"pencil\"></i></a> </td> </tr>";



?>





<?php


        }
    } else {
        echo "<tr colspan=\"7\">No se encontraron resultados</tr>";
    }
    



?>
<a href=""></a>
<i uk-icon="view"></i>
    </tbody>
</table>

<?php

$resultados_por_pagina = 10;

$sql = $tabla->total_registros($sql);
$resultado = $conexion->consultar($sql);

$total_resultados = $resultado->num_rows;

$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$total_paginas = ceil($total_resultados / $resultados_por_pagina);



echo '<ul class="uk-pagination uk-flex-center" uk-margin>';
echo '<li><a href="?pagina=1"><span uk-pagination-previous></span></a></li>';

for ($i = 1; $i <= $total_paginas; $i++) {
    echo '<li' . ($pagina_actual == $i ? ' class="uk-active"' : '') . '><a href="?pagina=' . $i . '">' . $i . '</a></li>';
}

echo '<li><a href="?pagina=' . $total_paginas . '"><span uk-pagination-next></span></a></li>';
echo '</ul>';

    





?>
<script>
function copiarDatos() {


    var tabla_datos = document.getElementById('datos_usuarios');

            var datos = document.createRange();
            datos.selectNode(tabla_datos);

            window.getSelection().addRange(datos);

            try {
                document.execCommand('copy');
                alert('Tus datos han sido copiados correctamente');
            } catch (error) {
                console.error('Hubo un error en el proceso', error);
            }

            window.getSelection().removeAllRanges();
}


function generarPDF() {
    var tabla = document.getElementById('datos_usuarios');
    var estilos = '<style>' +
        'table { border-collapse: collapse; width: 100%; }' +
        'table, th, td { border: 1px solid black; }' +
        '</style>';

    var convertir_pdf = window.open('', '_blank');
    convertir_pdf.document.write('<html><head><title>PDF</title>' + estilos + '</head><body>');
    convertir_pdf.document.write('<h2>Tabla de Datos</h2>');
    convertir_pdf.document.write(tabla.outerHTML);
    convertir_pdf.document.write('</body></html>');
    convertir_pdf.document.close();
    convertir_pdf.print();
}

function imprimir(){
    window.print();
}


</script>
</body>
</html>