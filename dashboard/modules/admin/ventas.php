<?php 
include('../config.php');



$conexion = new Conexion();
$conexion->create_conexion();

?>

<style>
    body {
        background-color: #ffffff;
    }

    .navbar {
        background-color: #fcbf4f;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: solid 2px #dfdede;
        margin-bottom: 20px;
        max-width: 100%;
    }

    .search {
        display: inline-block;
        position: relative;
        margin-top: 0px;
    }

    .search input[type="text"] {
        width: 300px;
        height: 30px;
        padding: 10px;
        border: none;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .search button[type="submit"] {
        background-color: #f8a232;
        height: 50px;
        border: none;
        color: #fff;
        cursor: pointer;
        padding: 10px 20px;
        border-radius: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        position: absolute;
        top: 0;
        right: 0;
        transition: .9s ease;
    }

    .search button[type="submit"]:hover {
        transform: scale(1.1);
        color: rgb(255, 255, 255);
        background-color: blue;
    }

    .button-container {
        display: flex;
        background-color: transparent;
        width: 230px;
        height: 50px;
        align-items: center;
        justify-content: space-around;
        border-radius: 10px;
        margin-top: -5px;

    }

    .button {
        outline: 0 !important;
        border: 0 !important;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background-color: transparent;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #000000;
        transition: all ease-in-out 0.3s;
        cursor: pointer;
    }

    .button:hover {
        transform: translateY(-3px);
    }

    .icon {
        font-size: 10px;
    }

    /* Contenedor Contenido */

    .ContainerTotal {
        display: flex;
        background-color: #ffffff;
        max-width: 90%;
        max-height: 100%;
        margin: auto;
    }

    @media screen and (max-width: 768px) {
        .ContainerTotal {

            display: block;
        }
    }

    .ContainerLeft {
        background-color: #ffffff;
        max-width: 70%;
        max-height: 50%;
        margin-right: 50px;
    }

    @media screen and (max-width: 768px) {
        .ContainerLeft {

            Max-width: 100%;

        }
    }

    .ContainerRight {
        background-color: rgb(255, 255, 255);
        max-width: 30%;
        max-height: 50%;
        margin-top: 60px;
        margin-right: 80px;
    }

    @media screen and (max-width: 768px) {
        .ContainerRight {

            max-width: 100%;

        }
    }

    .Envio {
        background-color: #ECEFF1;
        padding: 10px;
        margin-bottom: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);

    }

    /* Detalles de compras */
    .carrito {
        background-color: #ffffff;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        width: 100%;
    }

    h2,
    h3 {
        color: #333;
    }

    ul {
        list-style: none;
        padding: 0;
    }

    li {
        margin: 10px 0;
    }

    .subtotal {
        border-top: 1px solid #ddd;
        margin-top: 20px;
        padding-top: 10px;
    }

    .subtotal h3 {
        font-weight: bold;
        color: #333;
    }

    .opciones-pago {
        display: flex;
        flex-direction: row;
        align-items: normal;
        margin-top: 20px;

    }

    .opcion {
        margin-bottom: 10px;
        text-align: center;
        margin-left: 20px;

    }

    .logos img {
        width: 50px;
        height: 30px;

    }

    .logos img:not(:last-child) {
        margin-right: 10px;
    }

    .boton-pagar {
        background-color: #f1a635;
        color: white;
        padding: 10px 20px;
        border-radius: 4px;
        cursor: pointer;
        font-size: 30px;
        margin-top: 20px;
        max-width: 100%;
        margin-left: 30px;
    }

    .boton-pagar:hover {
        background-color: #39b143;
    }

    /* Tabla Producto info */

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);

    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    img {
        max-width: 100px;
    }

    button.eliminar {
        background-color: #da1111;
        color: #fff;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
        width: 100px;
        height: 40px;
        border-radius: 10px;
    }

    /* Barra Productos */

    .Barra-Recomienda {

        font-weight: 700;
        margin-left: 75px;
        margin-top: 20px;

    }

    .barra-productos {
        display: flex;
        max-width: 100%;
        margin: auto;

    }

    @media screen and (max-width: 768px) {
        .barra-productos {
            max-width: 100%;
            margin-left: -10px;
            flex-direction: column;
        }
    }

    .producto {
        margin: auto;
        text-align: center;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);
        padding: 20px;

    }

    .producto img {
        max-width: 120px;
    }

    .agregar {
        background-color: #f8a232;
        color: #fff;
        border: none;
        padding: 10px 10px;
        cursor: pointer;
        margin-top: 10px;
        font-size: 20px;
        margin-bottom: 20px;
        box-shadow: 0 10px 10px rgba(0, 0, 0, 0.1);

    }


    /* Footer */
    .checkout .footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px 10px 10px 20px;
        background-color: #ECEFF1;
    }

    .price {
        position: relative;
        font-size: 22px;
        color: #2B2B2F;
        font-weight: 900;
    }


    .page {
        background-color: #f8f8f8;
        padding: 20px;
        text-align: center;
        font-family: Arial, sans-serif;
        color: #333;
        border-top: 1px solid #ccc;
        margin-top: 20px;
    }

    .type {
        margin-top: 20px;
    }

    .text-center {
        text-align: center;
        margin-bottom: 10px;
    }

    /* Estilos para pantallas más pequeñas (menos de 768px) */
    @media screen and (max-width: 768px) {
        .page {
            width: 120%;
        }
    }
    a{
        text-decoration: none;
        color: white;
    }
</style>



<h1>Ventas</h1>
<center>
    <?php 
                if($_REQUEST['filtro'] == 'buscar'){

                    $sql = "SELECT * FROM ventas WHERE Local_idLocal = 2";
    
                }else{
                    $sql = "SELECT * FROM ventas WHERE Local_idLocal = 2";
    
                }
    

    ?>

    <!-- <button class="add-store-button" uk-icon="file-edit" uk-toggle="target: #modal-productos" onclick="agregar_producto()">Crear producto</button> -->
    <button class="add-store-button" onclick="copiarDatos()">Copiar <i uk-icon="copy"></i></button>
    <button class="add-store-button"><a href="dashboard/include/actions/excel.php?action=excel&method=exportar&sql=<?php echo $sql; ?>">Excel <i uk-icon="file-text"></i> </a></button>
    <button class="add-store-button" onclick="generarPDF()">PDF <i uk-icon="file-pdf"></i></button>
    <button class="add-store-button" onclick="imprimir()">Print <i uk-icon="print"></i></button>

            <form action="?module=tienda&tipo=productos" method="post" class="uk-search uk-search-navbar">
                <span uk-search-icon></span>
                <input type="text" hidden name="filtro" value="buscar">
                <input class="uk-search-input" type="search" placeholder="Nombre del cliente" name="dato" aria-label="Search">
                <button type="submit">Filtrar</button>

            </form>


</center>

<br><br>


<div id="modal-productos" uk-modal>
    <div class="uk-modal-dialog">
        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div id="contenido-producto">
            <!-- Aqui se cargara el archivo modals producto.php -->
        </div>


    </div>
</div>

<!--ContenedorContenido-->
<div class="ContainerTotal" id="datos_usuarios">

    <!--Contenedor Izquierdo-->

    <!--Encabezado-->


    <!--Informacion de Los Productos-->
    <table>
        <tr>
            <th>Numero de venta</th>
            <th>Cliente</th>
            <th>Descripcion</th>
            <th>Total compra</th>
            <th>Acciones</th>
        </tr>

        <?php






            $result = $conexion->consultar($sql);
    
    
            if ($result->num_rows > 0) {
    
                // Recorrer los resultados y crear filas y columnas HTML
                while($row = $result->fetch_assoc()) {

                    if($row['imagen'] == '' || $row['imagen'] == NULL){
                        $imagen = './dashboard/assets/images/Logo.png';
                    }else{
                        $imagen = "{$row['imagen']}";

                    }

        ?>

        <tr>
            <td><img src="<?php echo $imagen; ?>" alt="Producto 1"></td>
            <td><?php echo $row['nombreProducto']; ?></td>
            <td>$  <?php echo $row['precio']; ?></td>
            <td><a href="?actions=quitar&module=tienda&id_producto=<?php echo $row['idProducto'] ?>"><button class="eliminar" >Eliminar</button></a></td>
        </tr>
        

        <?php

        }
            }else {



            }   

        ?>
        
        


        <!-- Añade más filas según necesites -->
    </table>

    <script src="script.js"></script>


</div>

<script>
    function agregar_producto() {


        $.get('dashboard/include/modals/productos.php?action=agregar', function(data) {
            $('#contenido-producto').html(data);
        });



    }

</script>

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