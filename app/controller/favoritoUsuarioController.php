<?php
/**
 * 
 * Este documento crea la solicitud para agregar un producto a la lista de favoritos del usuario logueado.
 * A su vez, el documento verifica que el producto favorito existe, que haya un usuario logueado, y que ese mismo
 * usuario no haya seleccionado anteriormente el mismo producto. 
 *
 * @package TiendaMedieval
 *
 */

// Paso 1: Importamos la conexión a la base de datos
require_once '../../config/dbConnection.php';

// Paso 2: Iniciamos la sesión para poder usar los datos del usuario logueado
session_start();

/**
 * Verifica si la solicitud es de tipo POST y agrega el producto a la lista de favoritos
 *
 * @return void
 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Paso 4: Obtenemos el ID del producto desde el formulario
    /**
     * @var int $productoId  esta variable es el ID del producto que el usuario desea agregar a favoritos.
     */
    $productoId = $_POST['productoId'];

    // Paso 5: Verificamos que el usuario está logueado
    if (!isset($_SESSION['usuario'])) {
        echo "Error: Debes iniciar sesión para agregar productos a favoritos.";
        exit;
    }

    // Paso 6: Obtenemos el ID del usuario desde la sesión
    /**
     * @var int $usuarioId  esta variable es el ID del usuario logueado.
     */
    $usuarioId = $_SESSION['usuario']; // Este ID debe haberse guardado al iniciar sesión

    try {
        // Paso 7: Establecemos conexión con la base de datos
        /**
         * @var PDO $conexion  aquí se llama a un Objeto PDO para solicitar conexión con la BBDD
         */
        $conexion = getDBConnection();

        // Paso 8: Verificamos que el producto existe en la base de datos
        /**
         * @var PDOStatement $verificarProducto Consulta preparada para verificar la existencia del producto.
         */
        $verificarProducto = $conexion->prepare("SELECT COUNT(*) FROM producto WHERE ID_Producto = ?");
        $verificarProducto->execute([$productoId]);

        if ($verificarProducto->fetchColumn() == 0) {
            echo "Error: El producto con ID $productoId no existe en la base de datos.";
            exit;
        }

        // Paso 9: Verificamos si el producto ya está en favoritos para el usuario actual
        /**
         * @var PDOStatement $consultaVerificar Consulta preparada para verificar si el producto ya está en favoritos.
         */
        $consultaVerificar = $conexion->prepare(
            "SELECT * FROM favoritousuario WHERE ID_Usuario = ? AND ID_Producto = ?"
        );
        $consultaVerificar->execute([$usuarioId, $productoId]);

        if ($consultaVerificar->rowCount() === 0) {
            // Paso 10: Si el producto no está en favoritos, lo agregamos
            /**
             * @var PDOStatement $consultaInsertar Consulta preparada para insertar el producto en favoritos.
             */
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
