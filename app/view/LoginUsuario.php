<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Tienda medieval</title>
    <link rel="stylesheet" href="css/estiloLoginUsuario.css">
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
    
    <h1>BIENVENIDO</h1>
    <div class="containerDosElementos">
        <img src="ImagenesTienda/FondoSeleccionPC.png" alt="FondoSeleccion">
        <img src="ImagenesTienda/FondoSeleccionPC.png" alt="FondoSeleccion2">
    </div>

    <div class="formulario-php">
        <?php
        require_once "../controller/usuarioController.php";
        session_start();
        $UsuarioController = new usuarioController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Registrar'])) {
            $campoNombreSaneado = htmlspecialchars($_POST['Nombre_Usuario']);
            $campoEdadSaneado = htmlspecialchars($_POST['Edad_Usuario']);
            $campoCorreoUsuarioSaneado = htmlspecialchars($_POST['Correo_Usuario']);
            $campoContraseniaUsuarioSaneado = htmlspecialchars($_POST['Contrasenia_Usuario']);
            
            $UsuarioController->crearUsuario($campoNombreSaneado, $campoEdadSaneado, $campoCorreoUsuarioSaneado, $campoContraseniaUsuarioSaneado);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            $campoCorreoUsuarioSaneado = htmlspecialchars($_POST['Correo_Usuario']);
            $campoContraseniaUsuarioSaneado = htmlspecialchars($_POST['Contrasenia_Usuario']);
            
            $UsuarioController->logearUsuario($campoCorreoUsuarioSaneado, $campoContraseniaUsuarioSaneado);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
            session_unset();
            session_destroy();
            header("Refresh:0");
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $idUsuario = htmlspecialchars($_SESSION['usuario']);
            $nombreUsuario = htmlspecialchars($_POST['Nombre_Usuario']);
            $edadUsuario = htmlspecialchars($_POST['Edad_Usuario']);
            $correoUsuario = htmlspecialchars($_POST['Correo_Usuario']);
            $contraseniaUsuario = htmlspecialchars($_POST['Contrasenia_Usuario']);

            $UsuarioController->modificarUsuario($idUsuario, $nombreUsuario, $edadUsuario, $correoUsuario, $contraseniaUsuario);
        }
        ?>
        
        <!-- Registro de Usuario -->
        <form action="" method="POST">
            <label>Nombre Usuario:</label>
            <input type="text" name="Nombre_Usuario" required>
            <label>Edad:</label>
            <input type="number" name="Edad_Usuario" required>
            <label>Correo:</label>
            <input type="email" name="Correo_Usuario" required>
            <label>Contraseña:</label>
            <input type="password" name="Contrasenia_Usuario" required>
            <input type="submit" name="Registrar" value="REGISTRAR">
        </form>

        <!-- Login de Usuario -->
        <form action="" method="POST">
            <label>Correo:</label>
            <input type="email" name="Correo_Usuario" required>
            <label>Contraseña:</label>
            <input type="password" name="Contrasenia_Usuario" required>
            <input type="submit" name="login" value="LOG IN">
        </form>

        <!-- Logout y Actualización -->
        <?php
        if (isset($_SESSION['nombre'])) {
            ?>
            <form action="" method="POST">
                <input type="submit" name="logout" value="Cerrar sesión">
            </form>
            <form action="" method="POST">
                <input type="submit" name="update" value="Actualizar">
            </form>
            <?php
        }
        ?>
    </div>
</body>
</html>
