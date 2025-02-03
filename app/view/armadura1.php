<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Armadura - Escudo del león</title>
    <link rel="stylesheet" href="css/estilosCompraArmadura.css">
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
    
    <section>
    <div id="maza1">
        <img id="imgArma" src="ImagenesTienda/armadura1.png" alt="armadura1">
        <figcaption>"Escudo del león"</figcaption>
            <button>Comprar</button>
            <a href="ArmadurasTienda.php"><img src="ImagenesTienda/regresar.png" alt="Volver" id="regresar"></a>
            <p>Price: 2500$</p>
    </div>
    </section>
</body>
</html>