<?php

require_once "../../app/model/usuario.php";

class usuarioController{

    public function crearUsuario($nombreUsuario, $edadUsuario, $correoUsuario, $contraseniaUsuario){


        $nuevoUsuario = new Usuario();

          if ($nuevoUsuario->emailExists($correoUsuario)) {
            echo "YA EXISTE ESTE CORREO ELECTRONICO EN NUESTRA BASE DE DATOS.";
            return false;
        }


        $nuevoUsuario = new Usuario();
        $nuevoUsuario -> setNombreUsuario($nombreUsuario);
        $nuevoUsuario -> setEdadUsuario($edadUsuario);
        $nuevoUsuario -> setCorreoUsuario($correoUsuario);
        $nuevoUsuario -> setContraseniaUsuario($contraseniaUsuario);

        $nuevoUsuario -> createUser();
    }

    public function logearUsuario($correoUsuario, $contraseniaUsuario){

        $logearUsuario = new Usuario();

        $logearUsuario -> setCorreoUsuario($correoUsuario);
        $logearUsuario -> setContraseniaUsuario($contraseniaUsuario);

        $usuario = $logearUsuario->loginUser();

        
        if ($usuario) {
            $_SESSION['usuario'] = $usuario['ID_Usuario'];
            $_SESSION['nombre'] = $usuario['Nombre_Usuario'];
            $_SESSION['correo'] = $usuario['Correo_Usuario'];
            $_SESSION['contrasenia'] = $usuario['Contrasenia_Usuario'];

            echo "Bienvenid@, " . $_SESSION['nombre']. "<br>";
        } else {
            echo "Correo electronico o contraseña incorrectos.";
        }
        
    }

    public function modificarUsuario($idUsuario, $nombreUsuario, $edadUsuario, $correoUsuario, $contraseniaUsuario) {
        $modificarUsuario = new Usuario();
        $modificarUsuario->setIdUsuario($idUsuario);
        $modificarUsuario->setNombreUsuario($nombreUsuario);
        $modificarUsuario->setEdadUsuario($edadUsuario);
        $modificarUsuario->setCorreoUsuario($correoUsuario);
        $modificarUsuario->setContraseniaUsuario($contraseniaUsuario);

        if ($modificarUsuario->updateUser()) {
            echo "Datos actualizados correctamente.";
            $_SESSION['nombre'] = $nombreUsuario;
            echo "Bienvenid@, " . $_SESSION['nombre'] . "<br>";
        } else {
            echo "Error al actualizar los datos.";
        }
    }

}


?>