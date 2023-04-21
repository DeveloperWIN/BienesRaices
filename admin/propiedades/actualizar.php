<?php 

    require '../../includes/funciones.php';

    $auth = estaAutenticado();
    if (!$auth) {
        header('Location: /');
    }
    
    // VALIDAR URL POR ID
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    
    if (!$id) {
        header('Location: /admin');        
    }

    //Base de datos
    require '../../includes/config/database.php';
    $db = conectarDB();

    // OBTENER DATOS DE LA PROPIEDAD
    $consulta = "SELECT * FROM propiedades WHERE id = {$id}";
    $resultado = mysqli_query($db, $consulta);
    $propiedad = mysqli_fetch_assoc($resultado);

    // OBTENER TODOS LOS VENDEDORES
    $consulta = "SELECT * FROM vendedores";
    $resultado = mysqli_query($db, $consulta);

    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorId = $propiedad['vendedores_id'];
    $imagenPropiedad = $propiedad['imagen'];

    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        $titulo = mysqli_real_escape_string( $db, $_POST['titulo'] );
        $precio = mysqli_real_escape_string( $db, $_POST['precio'] );
        $descripcion = mysqli_real_escape_string( $db, $_POST['descripcion'] );
        $habitaciones = mysqli_real_escape_string( $db, $_POST['habitaciones'] );
        $wc = mysqli_real_escape_string( $db, $_POST['wc'] );
        $estacionamiento = mysqli_real_escape_string( $db, $_POST['estacionamiento'] );
        $vendedorId = mysqli_real_escape_string( $db, $_POST['vendedor'] );
        $creado = date('Y/m/d');
        $imagen = $_FILES['imagen'];

        //VALIDACIONES
        if (!$titulo) {
            $errores[] = "Debes añadir título";
        }
        if (!$precio) {
            $errores[] = "El precio es obligatorio";
        }
        if ( strlen($descripcion) < 50) {
            $errores[] = "La descripción es obligatoria y debes tener al menos 50 caracteres";
        }
        if (!$habitaciones) {
            $errores[] = "El número de habitaciones es obligatorio";
        }
        if (!$wc) {
            $errores[] = "El número de baños es obligatorio";
        }
        if (!$estacionamiento) {
            $errores[] = "El número de lugares de estacionamiento es obligatorio";
        }
        if (!$vendedorId) {
            $errores[] = "Elige un vendedor";
        }

        $medida = 1000 * 1000;
        if ($imagen['size'] > $medida) {
            $errores[] = "La imagen es muy pesada";
        }

        if (empty($errores)) {

            //CREAR CARPETA
            $carpetaImagenes = '../../imagenes/';
            if (!is_dir($carpetaImagenes)) {
                mkdir($carpetaImagenes);
            }

            //SUBIDA DE ARCHIVO
            if ($imagen['name']) {
                //SI SUBIO UNA IMAGEN, SE ELIMINA EL ARCHIVO PREVIO
                unlink($carpetaImagenes . $propiedad['imagen']);
                //GENERAR NOMBRE UNICO (md5 ya fue hackeado)
                $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";
                //SUBIR LA IMAGEN
                move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);           
            } else  {
                $nombreImagen = $propiedad['imagen'];
            }
            
            //UPDATE EN LA BD
            $query = "UPDATE propiedades SET titulo = '{$titulo}', 
                                             precio = '{$precio}', 
                                             imagen = '{$nombreImagen}', 
                                             descripcion = '{$descripcion}',        
                                             habitaciones = {$habitaciones}, 
                                             wc = {$wc}, 
                                             estacionamiento = {$estacionamiento}, 
                                             vendedores_id = {$vendedorId} 
                      WHERE id = {$id}";
            $resultado = mysqli_query($db, $query);
            if ($resultado) {
                //REDIRECCIONAR AL USUARIO
                header('Location: /admin?resultado=2');
            }
        }

        
    }

    incluirTemplate('header');

?>

    <main class="contenedor seccion">
        <h1>Actualizar Propiedad</h1>

        <a href="/admin" class="boton - boton-verde">Volver</a>

        <?php foreach($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título Propiedad" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio Propiedad" value="<?php echo $precio; ?>">

                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">
                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">

                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo $descripcion; ?></textarea>

            </fieldset>

            <fieldset>
                <legend>Información Propiedad</legend>

                <label for="habitaciones">Habitaciones:</label>
                <input type="number" id="habitaciones" name="habitaciones" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $habitaciones; ?>">

                <label for="wc">Baños:</label>
                <input type="number" id="wc" name="wc" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $wc; ?>">

                <label for="estacionamiento">Estacionamiento:</label>
                <input type="number" id="estacionamiento" name="estacionamiento" placeholder="Ej: 3" min="1" max="9"  value="<?php echo $estacionamiento; ?>">

            </fieldset>

            <fieldset>
                <legend>Vendedor</legend>

                <select name="vendedor">
                    <option value="">-- Seleccione --</option>   

                    <?php while($vendedor = mysqli_fetch_assoc($resultado) ): ?>

                        <option <?php echo $vendedorId === $vendedor['id'] ? 'selected' : ''; ?> value="<?php echo $vendedor['id']; ?>"> 
                                <?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?> </option>                            

                    <?php endwhile; ?>    
                    
                </select>
            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>
    </main>

<?php
    incluirTemplate('footer');
?>