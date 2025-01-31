<?php
require_once "../../config/dbConnection.php";

/**
 * Esta clase representa a un usuario que esta logeado.
 * Esta clase contiene métodos para interactuar con la base de datos para que el usuario pueda hacer tareas como registrarse, loguearse, modificar o cerrar sesión
 *
 * @package TiendaMedieval
 * 
 */
class usuario {
    /**
     * @var int $idUsuario ID único del usuario.
     */
    private $idUsuario;

    /**
     * @var string $nombreUsuario Nombre del usuario.
     */
    private $nombreUsuario;

    /**
     * @var int $edadUsuario Edad del usuario.
     */
    private $edadUsuario;

    /**
     * @var string $correoUsuario Correo electrónico del usuario.
     */
    private $correoUsuario;

    /**
     * @var string $contraseniaUsuario Contraseña del usuario.
     */
    private $contraseniaUsuario;

    /**
     * Obtiene el ID del usuario.
     *
     * @return int El ID del usuario.
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * Establece el ID del usuario.
     *
     * @param int $idUsuario El ID del usuario.
     * @return void
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Obtiene el nombre del usuario.
     *
     * @return string El nombre del usuario.
     */
    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    /**
     * Establece el nombre del usuario.
     *
     * @param string $nombreUsuario El nombre del usuario.
     * @return void
     */
    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    /**
     * Obtiene la edad del usuario.
     *
     * @return int La edad del usuario.
     */
    public function getEdadUsuario() {
        return $this->edadUsuario;
    }

    /**
     * Establece la edad del usuario.
     *
     * @param int $edadUsuario La edad del usuario.
     * @return void
     */
    public function setEdadUsuario($edadUsuario) {
        $this->edadUsuario = $edadUsuario;
    }

    /**
     * Obtiene el correo electrónico del usuario.
     *
     * @return string El correo electrónico del usuario.
     */
    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    /**
     * Establece el correo electrónico del usuario.
     *
     * @param string $correoUsuario El correo electrónico del usuario.
     * @return void
     */
    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }

    /**
     * Obtiene la contraseña del usuario.
     *
     * @return string La contraseña del usuario.
     */
    public function getContraseniaUsuario() {
        return $this->contraseniaUsuario;
    }

    /**
     * Establece la contraseña del usuario.
     *
     * @param string $contraseniaUsuario La contraseña del usuario.
     * @return void
     */
    public function setContraseniaUsuario($contraseniaUsuario) {
        $this->contraseniaUsuario = $contraseniaUsuario;
    }

    /**
     * Esta función verifica si un correo electrónico ya está disponible en la BBDD
     *
     * @param string $correoUsuario El correo electrónico a verificar.
     * @return bool esta variable retorna 'true' si el correo ya existe, 'false' si no existe
     */
    public function emailExists($correoUsuario) {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare('SELECT COUNT(*) FROM usuario WHERE Correo_Usuario = ?');
            $sentencia->bindParam(1, $correoUsuario);
            $sentencia->execute();

            return $sentencia->fetchColumn() > 0;
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
            return false;
        }
    }

    /**
     *  Esta función crea un nuevo usuario en la base de datos.
     *
     * @return int El ID del nuevo usuario insertado.
     */
    public function createUser(){
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare('INSERT INTO usuario(Nombre_Usuario, Edad_Usuario, Correo_Usuario, Contrasenia_Usuario) VALUES (?,?,?,?)');
            $sentencia->bindParam(1, $this->nombreUsuario);
            $sentencia->bindParam(2, $this->edadUsuario);
            $sentencia->bindParam(3, $this->correoUsuario);
            $sentencia->bindParam(4, $this->contraseniaUsuario);
            $sentencia->execute();

            $id = $conn->lastInsertId();
            return $id;

        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

    /**
     * Esta función inicia sesión con los datos que ingresó el usuario.
     *
     * @return array|bool  esta variable retorna los datos del usuario si el inicio de sesión es correcto, o false si las credenciales son incorrectas.
     */
    public function loginUser() {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare('SELECT `ID_Usuario`, `Nombre_Usuario`, `Correo_Usuario`, `Contrasenia_Usuario` FROM `usuario` WHERE Correo_Usuario = ? AND Contrasenia_Usuario = ?');
            $sentencia->bindParam(1, $this->correoUsuario);
            $sentencia->bindParam(2, $this->contraseniaUsuario);
            $sentencia->execute();

            $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

            if ($resultado) {
                return $resultado[0];
            } else {
                return false;
            }

        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
        }
    }

    /**
     * Esta función actualiza los datos del usuario en la base de datos.
     *
     * @return bool  esta variable retorna 'true' si la actualización fue exitosa, o 'false' en caso contrario.
     */
    public function updateUser() {
        try {
            $conn = getDBConnection();
            $sentencia = $conn->prepare('UPDATE usuario SET Nombre_Usuario = ?, Edad_Usuario = ?, Correo_Usuario = ?, Contrasenia_Usuario = ? WHERE ID_Usuario = ?');
            $sentencia->bindParam(1, $this->nombreUsuario);
            $sentencia->bindParam(2, $this->edadUsuario);
            $sentencia->bindParam(3, $this->correoUsuario);
            $sentencia->bindParam(4, $this->contraseniaUsuario);
            $sentencia->bindParam(5, $this->idUsuario);
            return $sentencia->execute();
        } catch (PDOException $e) {
            echo "Error en la conexión a base de datos";
            return false;
        }
    }
}
?>
