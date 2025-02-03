<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda Medieval - Armaduras</title>
    <link rel="stylesheet" href="css/estilosArmaduraTienda.css">
</head>
<body>
    <div id="contenedorNavegacion">
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
    </div>

    <section>
        <div id="titulo1">
            <h2>Armaduras y ropa de época</h2>
        </div>
        <div id="armadura1">
            <a href="armadura1.php"><img class="imgArmaduras" src="ImagenesTienda/armadura1.png" alt="armadura1"></a>
            <div class="precioBoton">
                <figcaption>Price: 2500$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="5">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
        <div id="armadura2">
            <a href="armadura2.php"><img class="imgArmaduras" src="ImagenesTienda/armadura2.png" alt="armadura2"></a>
            <div class="precioBoton">
                <figcaption>Price: 2800$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="6">
                    <button type="submit">
                        <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
        <div id="ropa1">
            <a href="ropa1.php"><img class="imgArmaduras" src="ImagenesTienda/Ropa1.png" alt="ropa1"></a>
            <div class="precioBoton">
                <figcaption>Price: 500$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="7">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
        <div id="ropa2">
            <a href="ropa2.php"><img class="imgArmaduras" src="ImagenesTienda/Ropa3.png" alt="ropa2"></a>
            <div class="precioBoton">
                <figcaption>Price: 500$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="8">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
