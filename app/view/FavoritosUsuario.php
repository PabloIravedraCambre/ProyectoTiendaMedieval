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
        <a href="Inicio.html"><img id="imagenLogo" src="ImagenesTienda/LogoNav.png" alt="Logo tienda Medieval"></a>
        <ul>
            <li><a href="ArmasTienda.html">Armas de Larp</a></li>
            <li><a href="ArmadurasTienda.html">Armaduras y ropa Medieval</a></li>
            <li><a href="Contacto.html">Contacto</a></li>
            <li><a href="cestaUsuario.php"><img src="ImagenesTienda/carro.png" alt="carro"></a></li>
            <li><a href="FavoritosUsuario.php"><img src="ImagenesTienda/flecha 2.png" alt="favorito"></a></li>
            <li><a href="LoginUsuario.php"><img src="ImagenesTienda/personitaModificada 1.png" alt="loginUsuario"></a></li>
            <li><a href="#"><img src="ImagenesTienda/navidioma.png" alt="idioma"></a></li>
        </ul>
    </div>
    
    <h2>Tus favoritos</h2>
    <img src="ImagenesTienda/favoritoPergamino.png" alt="pergaminoFav" id="favoritoPergamino">

    <?php
    // Paso 1: Importamos la conexión y verificamos sesión
    require_once "../../config/dbConnection.php";
    session_start();

    if (!isset($_SESSION['usuario'])) {
        echo "<p>Error: Debes iniciar sesión para ver tus favoritos.</p>";
        exit;
    }

    try {
        // Paso 2: Obtenemos el ID del usuario desde la sesión
        $usuarioId = $_SESSION['usuario']; // Asegúrate de que este valor está disponible en la sesión

        // Paso 3: Establecemos conexión con la base de datos
        $conexion = getDBConnection();

        // Paso 4: Consultamos los favoritos del usuario logueado
        $consulta = $conexion->prepare(
            "SELECT p.Nombre_Producto, p.Precio, p.Cantidad_Producto 
             FROM favoritousuario f
             INNER JOIN producto p ON f.ID_Producto = p.ID_Producto
             WHERE f.ID_Usuario = :usuarioId"
        );
        $consulta->execute([':usuarioId' => $usuarioId]);

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
    } catch (PDOException $e) {
        echo "<p>Error al cargar los favoritos: " . $e->getMessage() . "</p>";
    }
    ?>
</body>
</html>
