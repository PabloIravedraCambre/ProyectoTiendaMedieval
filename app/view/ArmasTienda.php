<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo Productos / Tarjetas</title>
    <link rel="stylesheet" href="css/estilosArmasTienda.css">
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
            <h2>Espadas</h2>
        </div>
        <div id="espada1">
            <a href="espada1.php"><img class="imgArmas" src="ImagenesTienda/Espada1.png" alt="espada1"></a>
            <div class="precioBoton">
                <figcaption>Price: 550$</figcaption>
                <!-- Formulario para añadir producto a favoritos -->
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="1">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
        <div id="espada2">
            <a href="espada2.php"><img class="imgArmas" src="ImagenesTienda/Espada2.png" alt="espada2"></a>
            <div class="precioBoton">
                <figcaption>Price: 490$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="2">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito"> 
                    </button>
                </form>
            </div>
        </div>
        <div id="titulo2">
            <h2>Mazas</h2>
        </div>
        <div id="maza1">
            <a href="maza1.php"><img class="imgArmas" src="ImagenesTienda/Maza1a500.png" alt="maza1"></a>
            <div class="precioBoton">
                <figcaption>Price: 400$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="3">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
        <div id="maza2">
            <a href="maza2.php"><img class="imgArmas" src="ImagenesTienda/Maza2a500.png" alt="maza2"></a>
            <div class="precioBoton">
                <figcaption>Price: 250$</figcaption>
                <form action="../controller/favoritoUsuarioController.php" method="POST">
                    <input type="hidden" name="productoId" value="4">
                    <button type="submit">
                            <img src="ImagenesTienda/iconoFavo1.png" alt="iconoFavorito">
                    </button>
                </form>
            </div>
        </div>
    </section>
</body>
</html>
