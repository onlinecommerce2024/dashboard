<style>
    
    /*custom font*/
    .contenedor-form-register {
  width: 90%;
  margin: 1rem auto;
  padding: 1rem;
  background-color: white;
  border-radius: 8px;
}
/* Título del formulario */
h1 {
  text-align: center;
  padding: 1rem;
  margin-bottom: 1rem;
  border-bottom: 2px solid #ccc;
}
form {
  padding-top: 1rem;
}
form ul {
  list-style: none;
}
/* Placehoder */
::placeholder {
  color: green;
}
/* Selección de texto dentro de los campo */
::selection {
  color: white;
  background-color: green;
}
/* Los campos */
input,
output,
button {
  /* Para que el texto sea más pequeño */
  font-size: 0.9rem;
  /* Para que el texto no quede tan pegado al borde del input */
  padding: 0.3rem;
}
/* Botones */
button {
  background: #026aa7;
  box-shadow: inset 0 -4px 0 0 rgba(0, 0, 0, 0.2);
  padding: 0.5rem 1rem;
  color: #ddd;
  outline: none;
  border: none;
  cursor: pointer;
}
button:hover {
  box-shadow: inset 0 -4px 0 0 rgba(0, 0, 0, 0.6), 0 0 8px 0 rgba(0, 0, 0, 0.5);
}
button:active {
  box-shadow: inset 0 3px 5px 0 rgba(0, 0, 0, 0.2);
}
/* Opciones */
option {
  font-size: 0.9rem;
  padding: 5px 1rem;
}
/* Los inputs numéricos deben mostrar el texto alineado a la derecha */
input[type="number"] {
  text-align: right;
}
/* Los campos no válidos se muestran con el borde y el fondo de color rojo */
:invalid:not(form) {
  background-color: #ffeded;
  border: 1px solid red;
  outline: none;
}
/* Cuando un input no válido recibe el foco se muestra una sombra roja */
:invalid:focus {
  box-shadow: 0 0 5px red;
  outline: none;
}
/* Fila del formulario */
.fila {
  margin-bottom: 2rem;
  /* Caja flexible con hijos formando filas */
  display: flex;
  flex-wrap: wrap;
  /* Para que en cada fila se alinee verticalmente al centro */
  align-items: center;
  /* Para poder posicionar los mensajes de error de forma absoluta respecto a la fila */
  position: relative;
}
/* Labels de propiedades */
.propiedad {
  /* Para que esté centrado horizontalmente dentro de la fila hacemos que su ancho mínimo sea el 50% y alineamos su texto a la derecha */
  min-width: 50%;
  text-align: right;
  padding-right: 1rem;
  /* Para que el label se sitúe antes de los input le damos un orden menor de 0 */
  order: -1;
}
/* El label de propiedad cuyo campo tiene el foco o está activado */
:focus ~ .propiedad,
:active ~ .propiedad {
  font-weight: bold;
}
/* La propiedad cuyo campo no está vacío, tiene el foco o está activado y es válido */
:valid:focus:not(:placeholder-shown) ~ .propiedad,
.fila :valid:active:not(:placeholder-shown) ~ .propiedad {
  color: teal;
}
/* La propiedad cuyo campo tiene el foco o está activado y no es válido */
.fila :invalid:focus ~ .propiedad,
.fila :invalid:active ~ .propiedad {
  color: red;
}
/* Si hay más de un elemento en la fila se deja
un margen a la izquierda (menos en la propiedad) */
.fila > *:not(.propiedad) {
  margin-right: 1rem;
}
/* Las propiedad correspondientes a select múltiples */
.fila select[multiple] ~ .propiedad {
  align-self: flex-start;
}
/* La fila de botones */
.botonera {
  /* Centrados en una fila */
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: center;
}
/* Los campos pequeños */
.small {
  width: 3rem;
}
/* Las propiedades de campos válidos con validación que no estén vacíos deben mostrar un icono de aceptación antes */
:required:valid:not(:placeholder-shown) ~ .propiedad:before,
input[type="email"]:valid:not(:placeholder-shown) ~ .propiedad:before,
input[type="url"]:valid:not(:placeholder-shown) ~ .propiedad:before,
input[type="tel"]:valid:not(:placeholder-shown) ~ .propiedad:before {
  content: "\2713";
  color: teal;
  vertical-align: middle;
  display: inline;
  padding-right: 0.5rem;
}
/* Las propiedades de campos inválidos deben mostrar un icono de error antes */
:invalid ~ .propiedad:before {
  content: "\26A0";
  color: red;
  vertical-align: middle;
  display: inline;
  padding-right: 0.5rem;
}
/* Las propiedades de campos inválidos deben mostrar un mensaje de valor incorrecto debajo del campo. */
:invalid ~ .propiedad:after {
  content: "Valor incorrecto";
  color: red;
  font-size: 0.8rem;
  /* Se posiciona de forma absoluta respecto a la fila para colocarlo debajo de input */
  position: absolute;
  top: 100%;
  left: 50%;
  text-align: left;
}
/* Mensaje de error para los campos obligatorios */
:required:invalid ~ .propiedad:after {
  content: "Campo obligatorio";
}
/* Mensaje de error para email no válido */
input[type="email"]:invalid ~ .propiedad:after {
  content: "El email debe llevar @ y .";
}
/* Mensaje de error para teléfono no válido */
input[type="tel"]:invalid ~ .propiedad:after {
  content: "El teléfono debe ser numérico, contener  9 dígitos y comenzar por 6, 7, 8 o 9";
}
/* Mensaje de error para URL no válida */
input[type="url"]:invalid ~ .propiedad:after {
  content: "La URL debe comenzar por http:// y contener al menos un nombre de dominio";
}
/* Mensaje de error para número de hermanos no válido */
#hermanos:invalid ~ .propiedad:after {
  content: "Debe estar entre 1 y 50";
}
/* Media queries */
@media (max-width: 720px) {
  /* Los li alinean su hijos al comienzo */
  .fila {
    justify-content: flex-start;
  }
  /* Los labels ocupan toda la fila */
  .fila .propiedad {
    flex-basis: 100%;
    text-align: left;
    margin-bottom: 0.3rem;
  }
  /* Las propiedades de campos no válidos deben mostrar un mensaje de valor incorrecto debajo del campo. */
  :invalid ~ .propiedad:after {
    left: 0;
  }
}



</style>

<?php 


switch ($_GET['tipo']) {
    case 'tendero':
        # code...
        tendero();
        break;
    case 'domiciliario':
        # code...
        domiciliario();
        break;
    default:
        # code...
        echo '<script>
        var notifications = UIkit.notification(\'Perfil incorrecto\', \'danger\');
        setTimeout(function() {

            window.location.href = "?module=perfil";

        }, 1000);
        </script>';


        break;
}



?>




<?php 

    function tendero(){
        
        ?>

<div class="contenedor-form-register">
  <h1>Perfil de usuario</h1>
  <form method="POST" action="?module=register&actions=crear&tipo=tendero" id="formulario" enctype="multipart/form-data">
    <!-- Lista de campos -->
    <ul>
      <li class="fila">
        <input type="text" id="nombre" name="nombreLocal" maxlength="30" size="30" placeholder="(nombre local)" required autofocus="autofocus" />
        <label for="nombre" class="propiedad">Nombre Local</label>
      </li>
      <li class="fila">
        <input type="text" id="nombre" name="direccion" maxlength="30" size="30" placeholder="(Dirección Calle 80 i # 60c - 24)" required="required" autofocus="autofocus" />
        <label for="nombre" class="propiedad">Dirección</label>
      </li>
      <li class="fila">
        <input type="text" id="nombre" name="barrio" maxlength="30" size="30" placeholder="(Nueva roma)" required="required" autofocus="autofocus" />
        <label for="nombre" class="propiedad">Barrio</label>
      </li>

      <li class="fila">
        <input type="email" id="email" name="correo" maxlength="30" size="30" required placeholder="(Correo)" />
        <label for="email" class="propiedad">Correo</label>
      </li>

      <!-- tel -->
      <li class="fila">
        <input type="tel" id="telefono" name="telefono" maxlength="10" size="11" required placeholder="(teléfono)" pattern="[0-9]{10}" />
        <label for="telefono" class="propiedad">Teléfono</label>
      </li>

      <li class="fila">
        <select id="estudios" name="categoria_local" required="required">

        <?php
                    $conexion = new Conexion();

                    $conexion->create_conexion();

                    $sql = "SELECT * FROM categorias_locales";
                    $result = $conexion->consultar($sql);
            
            
                    if ($result->num_rows > 0) {
            
                        // Recorrer los resultados y crear filas y columnas HTML
                        while($row = $result->fetch_assoc()) {

                            echo '<option value="'.$row['idCategoriaLocal'].'">'.$row['nombreCategoria'].'</option>';

                        }
                    }else{
                        echo '<option value="0">Ninguna categoria creada.</option>';
                    }

        ?>

        </select>
        <label for="estudios" class="propiedad">Categoria del local</label>
      </li>

      <!-- readonly disabled -->
      <li class="fila">
        <input type="number" id="edad" name="nit_empresa"   required/>
        <label for="edad" class="propiedad">Nit empresa</label>
      </li>
      <li class="fila">
        <textarea type="number" id="edad" name="descripcion_tienda" placeholder="Descripción de la empresa"></textarea>
        <label for="edad" class="propiedad">Descripción empresa</label>
      </li>
      <li class="fila">
        <input type="file" id="edad" name="imagen"  placeholder="Archivo" />
        <label for="edad" class="propiedad">Sube tu archivo</label>
      </li>

      <!-- url -->
      <li class="fila">
        <input type="url" id="web" name="facebook" maxlength="10" size="30" placeholder="(url)" value="https://" />
        <label for="web" class="propiedad">Facebook de la tienda</label>
      </li>
      <li class="fila">
        <input type="url" id="web" name="instagram" maxlength="10" size="30" placeholder="(url)" value="https://" />
        <label for="web" class="propiedad">Instagram de la tienda</label>
      </li>
  
      <!-- Botonera -->
      <li class="fila botonera">
        <button type="submit">Crear</button>
        <button type="reset">Reiniciar</button>
      </li>
    </ul>
  </form>
</div>

        <?php



    }



?>




<?php 

    function domiciliario(){
        



    }



?>
