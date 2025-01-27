<?php
// Paso 1: Importamos la conexión a la base de datos
require_once '../../config/dbConnection.php';

// Paso 2: Iniciamos la sesión para poder usar los datos del usuario logueado
session_start();

// Paso 3: Verificamos que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Paso 4: Obtenemos el ID del producto desde el formulario
    $productoId = $_POST['productoId'];

    // Paso 5: Verificamos que el usuario está logueado
    if (!isset($_SESSION['usuario'])) {
        echo "Error: Debes iniciar sesión para agregar productos a favoritos.";
        exit;
    }

    // Paso 6: Obtenemos el ID del usuario desde la sesión
    $usuarioId = $_SESSION['usuario']; // Este ID debe haberse guardado al iniciar sesión

    try {
        // Paso 7: Establecemos conexión con la base de datos
        $conexion = getDBConnection();

        // Paso 8: Verificamos que el producto existe en la base de datos
        $verificarProducto = $conexion->prepare("SELECT COUNT(*) FROM producto WHERE ID_Producto = ?");
        $verificarProducto->execute([$productoId]);

        if ($verificarProducto->fetchColumn() == 0) {
            echo "Error: El producto con ID $productoId no existe en la base de datos.";
            exit;
        }

        // Paso 9: Verificamos si el producto ya está en favoritos para el usuario actual
        $consultaVerificar = $conexion->prepare(
            "SELECT * FROM favoritousuario WHERE ID_Usuario = ? AND ID_Producto = ?"

            //El signo de interrogación es un placeholder (o marcador de posición) que nos indica que ahí se 
            //insertará un valor más adelante. Vemos que ID_Usuario e ID_Producto tienen dos interrogaciones, por lo que
            //se introducirá (en orden según la línea anterior) los valores de "$usuarioID" y a continuación los de $productoID.
            //En resumidas cuentas, el signo de interrogación reemplazará ese signo por lo que haya después del "->execute"
        );
        $consultaVerificar->execute([$usuarioId, $productoId]);

        if ($consultaVerificar->rowCount() === 0) {
            //Aquí se busca al ID_Usuario e ID_Producto del anterior paso, si no encuentra esa combinación realizada por el
            //"rowCount", se insertará en favoritos
            // Paso 10: Si el producto no está en favoritos, lo agregamos
            $consultaInsertar = $conexion->prepare(
                "INSERT INTO favoritousuario (ID_Usuario, ID_Producto) 
                 VALUES (?, ?)"
            );
            $consultaInsertar->execute([$usuarioId, $productoId]);

            // Paso 11: Redirigimos a la página de favoritos tras insertar
            header('Location: FavoritosUsuario.php');
            exit;
        } else {
            // Paso 12: Si ya está en favoritos, mostramos un mensaje
            echo "Este producto ya está en tu lista de favoritos.";
        }

    } catch (PDOException $e) {
        // Paso 13: Mostramos un mensaje de error si algo falla
        echo "Error al guardar en favoritos: " . $e->getMessage();
    }
}
?>
