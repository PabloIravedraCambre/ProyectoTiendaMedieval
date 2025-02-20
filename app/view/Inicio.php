<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Tienda medieval</title>
    <link rel="stylesheet" href="css/inicio.css">
</head>
<body>
     
        <div id="contenedorList">
            <img id="imagenLogo"src="ImagenesTienda/LogoNav.png" alt="Logo tienda Medieval">
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

    
    
    <h1>¡Las mejores armas y armaduras!</h1>
    <div id="escaparate">
        <h2 id="titulo1">Armas Larp</h2>
        <h2 id="titulo2">Armaduras y ropa Medieval</h2>
        <ul id="lista1">
            <a href="espada1.php"><li class="listar">Destello de Acero</li></a>
            <a href="espada2.php"><li class="listar">Hoja de la Justicia</li></a>
            <a href="maza1.php"><li class="listar">La aplastante</li></a>
            <a href="maza2.php"><li class="listar">Rompecráneos</li></a>
        </ul>
        <ul id="lista2">
            <a href="armadura1.php"><li class="listar">Escudo del león</li></a>
            <a href="armadura2.php"><li class="listar">Coraza de viento</li></a>
            <a href="ropa1.php"><li class="listar">Capa del gran duque</li></a>
            <a href="ropa2.php"><li class="listar">Abrigo de zafiro real</li></a>
        </ul>
        <img src="ImagenesTienda/Espada1.png" alt="destello de acero" class="ajustarImagen">
        <img src="ImagenesTienda/Maza1a500.png" alt="aplastante" class="ajustarImagen">
        <img src="ImagenesTienda/armadura1.png" alt="escudo del león" class="ajustarImagen">
        <img src="ImagenesTienda/Ropa1.png" alt="capa del gran duque" class="ajustarImagen">

    </div>
    
</body>
<footer>
    <img src="ImagenesTienda/EscudoFooter.png" alt="Logo izquierda" class="footer-img">
    <div id="footer-info">
        <div class="contact-info">
            <h3>Contacto</h3>
            <p>Teléfono: +34 123 456 789</p>
            <p>Email: Contacto@tiendamedieval.com</p>
            <p>Dirección: Rúa Meira(A Coruña)</p>
        </div>
        <div id="team-info">
            <p>Adrián Fariña</p>
            <p>Brais Alonso</p>
            <p>Pablo Iravedra</p>
        </div>
    </div>
    <img src="ImagenesTienda/EscudoFooter.png" alt="Logo derecha" class="footer-img">
</footer>
</html>
