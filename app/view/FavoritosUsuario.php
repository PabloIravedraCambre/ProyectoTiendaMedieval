<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Favoritos - Tienda Medieval</title>
    <link rel="stylesheet" href="css/estilosFavoritosUsuario.css">
</head>
<body>
    <div id="contenedorList">
        <a href="Inicio.php"><img id="imagenLogo" src="ImagenesTienda/LogoNav.png" alt="Logo tienda Medieval"></a>
        <ul>
            <li><a href="ArmasTienda.php">Armas de Larp</a></li>
            <li><a href="ArmadurasTienda.php">Armaduras y ropa Medieval</a></li>
            <li><a href="Contacto.php">Contacto</a></li>
            <li><a href="cestaUsuario.php"><img src="ImagenesTienda/carro.png" alt="carro"></a></li>
            <li><a href="FavoritosUsuario.php"><img src="ImagenesTienda/flecha 2.png" alt="favorito"></a></li>
            <li><a href="LoginUsuario.php"><img src="ImagenesTienda/personitaModificada 1.png" alt="loginUsuario"></a></li>
            <li><a href="#"><img src="ImagenesTienda/navidioma.png" alt="idioma"></a></li>
            <?php

                session_start();
                 if (isset($_SESSION['nombre'])) {
                    echo "<li>Bienvenid@, " . $_SESSION['nombre'] . "</li>";
                 }
                 
            ?>
        </ul>
    </div>
    
    <h2>Tus favoritos</h2>
    <img src="ImagenesTienda/favoritoPergamino.png" alt="pergaminoFav" id="favoritoPergamino">

    <?php

    /**
     * FavoritosUsuario.php mostrará la lista de selección de productos favoritos que el usuario
     * logueado en ese momento tiene
     * 
     * @package  TiendaMedieval
     */

    // Paso 1: Importamos la conexión y verificamos sesión
    require_once "../../config/dbConnection.php";
    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo "<p>Error: Debes iniciar sesión para ver tus favoritos.</p>";
        exit;
    }

    try {
        // Paso 2: Obtenemos el ID del usuario desde la sesión
        /**
         * @var int $usuarioId es el ID del usuario logueado en la sesión actual
         */

        $usuarioId = $_SESSION['usuario']; 


        // Paso 3: Establecemos conexión con la base de datos
        /**
         * @var PDO $conexion esto es para hacer la conexión con la base de datos
         */
        $conexion = getDBConnection();

        /**
         * Aquí es dónde se va a obtener, de la base de datos, la lista de los productos
         * favoritos que seleccionó el usuario
         * 
         * @var PDOStatement $consulta
         */

        // Paso 4: Consultamos los favoritos del usuario logueado
        $consulta = $conexion->prepare(
            "SELECT p.Nombre_Producto, p.Precio, p.Cantidad_Producto 
             FROM favoritousuario f
             INNER JOIN producto p ON f.ID_Producto = p.ID_Producto
             WHERE f.ID_Usuario = ?"
        );
        $consulta->execute([$usuarioId]);

        /**
         * @var array $favoritos es un array asociativo que contiene los favoritos del usuario
         * que esté logueado en ese momento, para luego mostrarlos en la página
         */

        $favoritos = $consulta->fetchAll(PDO::FETCH_ASSOC);

        // Paso 5: Mostramos los favoritos si existen
        if (!empty($favoritos)) {
            foreach ($favoritos as $favorito) {
                echo "<div class='favorito-item'>";
                echo "<p><strong>Producto:</strong> {$favorito['Nombre_Producto']}</p>";
                echo "<p><strong>Precio:</strong> {$favorito['Precio']}€</p>";
                echo "<p><strong>Cantidad disponible:</strong> {$favorito['Cantidad_Producto']}</p>";
                echo "<hr>";
                echo "</div>";
            }
        } else {
            echo "<p>No tienes productos en favoritos.</p>";
        }
         /**
         * En caso de que haya algún tipo de error, se cargará un mensaje que alerta
         * de ese posible error a la hora de cargar los favoritos
         * 
         * @var string $e Mensaje de error
         */
    } catch (PDOException $e) {
        echo "<p>Error al cargar los favoritos: " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>
