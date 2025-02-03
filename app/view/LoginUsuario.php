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
    
    <h1>BIENVENIDO</h1>
    <div class="containerDosElementos">
        <img src="ImagenesTienda/FondoSeleccionPC.png" alt="FondoSeleccion">
        <img src="ImagenesTienda/FondoSeleccionPC.png" alt="FondoSeleccion2">
    </div>

    <div class="formulario-php">
        <?php
        /**
         * LoginUsuario.php se encarga de trabajar con los formularios de login, el de registrar, y el de actualizar (éste último permite al usuario actualizar su nombre, edad, etc)
         *
         * @package TiendaMedieval
         */

        require_once "../controller/usuarioController.php";

        /**
         * Controlador que permite trabajar con los datos que ha introducido el usuario
         *
         * @var usuarioController $UsuarioController
         */
        $UsuarioController = new usuarioController();

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['Registrar'])) {
            /**
             *  Éste método maneja el registro de un nuevo usuario.
             *
             * htmlspecialchars => Sanea los datos de entrada y los envía al controlador.
             *
             * @param string $_POST['Nombre_Usuario'] Nombre del usuario.
             * @param int $_POST['Edad_Usuario'] Edad del usuario.
             * @param string $_POST['Correo_Usuario'] Correo del usuario.
             * @param string $_POST['Contrasenia_Usuario'] Contraseña del usuario.
             */
            $campoNombreSaneado = htmlspecialchars($_POST['Nombre_Usuario']);
            $campoEdadSaneado = htmlspecialchars($_POST['Edad_Usuario']);
            $campoCorreoUsuarioSaneado = htmlspecialchars($_POST['Correo_Usuario']);
            $campoContraseniaUsuarioSaneado = htmlspecialchars($_POST['Contrasenia_Usuario']);
            
            // Llamada al controlador para crear el nuevo usuario
            $UsuarioController->crearUsuario($campoNombreSaneado, $campoEdadSaneado, $campoCorreoUsuarioSaneado, $campoContraseniaUsuarioSaneado);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
            /**
             * Éste método maneja el inicio de sesión del usuario.
             *
             * htmlspecialchars => Sanea los datos de entrada y los envía al controlador.
             *
             * @param string $_POST['Correo_Usuario'] Correo del usuario.
             * @param string $_POST['Contrasenia_Usuario'] Contraseña del usuario.
             */
            $campoCorreoUsuarioSaneado = htmlspecialchars($_POST['Correo_Usuario']);
            $campoContraseniaUsuarioSaneado = htmlspecialchars($_POST['Contrasenia_Usuario']);
            
            // Llamada al controlador para iniciar sesión del usuario
            $UsuarioController->logearUsuario($campoCorreoUsuarioSaneado, $campoContraseniaUsuarioSaneado);
            header("Location: LoginUsuario.php");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['logout'])) {
            /**
             * Éste método maneja el cierre de sesión del usuario.
             *
             * Borra todos los datos de sesión, los elimina, y recarga la página.
             * 
             */
            session_unset();
            session_destroy();
            header("Refresh:0"); // Recarga la página
            exit();
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            /**
             * Éste método maneja la actualización de información del usuario.
             *
             * htmlspecialchars => Sanea los datos de entrada y los envía al controlador.
             *
             * @param int $_SESSION['usuario'] ID del usuario en sesión.
             * @param string $_POST['Nombre_Usuario'] Nombre actualizado del usuario.
             * @param int $_POST['Edad_Usuario'] Edad actualizada del usuario.
             * @param string $_POST['Correo_Usuario'] Correo actualizado del usuario.
             * @param string $_POST['Contrasenia_Usuario'] Contraseña actualizada del usuario.
             */
            $idUsuario = htmlspecialchars($_SESSION['usuario']);
            $nombreUsuario = htmlspecialchars($_POST['Nombre_Usuario']);
            $edadUsuario = htmlspecialchars($_POST['Edad_Usuario']);
            $correoUsuario = htmlspecialchars($_POST['Correo_Usuario']);
            $contraseniaUsuario = htmlspecialchars($_POST['Contrasenia_Usuario']);

            // Llamada al controlador para modificar los datos del usuario
            $UsuarioController->modificarUsuario($idUsuario, $nombreUsuario, $edadUsuario, $correoUsuario, $contraseniaUsuario);
        }
        ?>
        
        <!-- Registro de Usuario -->

        <div id="posicionRegistro">
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
        </div>

        <!-- Login de Usuario -->
        <div id="posicionLogin">
        <form action="" method="POST">
            <label>Correo:</label>
            <input type="email" name="Correo_Usuario" required>
            <label>Contraseña:</label>
            <input type="password" name="Contrasenia_Usuario" required>
            <input type="submit" name="login" value="LOG IN">
        </form>
        </div>

        <!-- Logout y Actualización -->
        <?php
        
        if (isset($_SESSION['nombre'])) {
            ?>
            <form action="" method="POST" id="posicionLogout">
                <input type="submit" name="logout" value="Cerrar sesión">
            </form>
            <form action="" method="POST" id="posicionUpdate">
                <input type="submit" name="update" value="Actualizar">
            </form>
            <?php
        }
        ?>
    </div>
</body>
</html>
