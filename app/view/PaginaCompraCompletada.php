<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra Exitosa- Tienda medieval</title>
    <link rel="stylesheet" href="css/completado.css">
</head>
<body>
    
        <div id="contenedorList">
            <a href="Inicio.php"><img id="imagenLogo"src="ImagenesTienda/LogoNav.png" alt="Logo tienda Medieval"></a>
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
    <div class="exito">
        <p>¡Su compra ha sido un éxito!</p>
    </div>
    <div class="volver">
        <a href="Inicio.php">¡Volver al inicio!</a>
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