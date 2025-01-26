<?php
require_once "../../config/dbConnection.php";

class usuario {
    private $idUsuario;
    private $nombreUsuario;
    private $edadUsuario;
    private $correoUsuario;
    private $contraseniaUsuario;


    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getNombreUsuario() {
        return $this->nombreUsuario;
    }

    public function setNombreUsuario($nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function getEdadUsuario() {
        return $this->edadUsuario;
    }

    public function setEdadUsuario($edadUsuario) {
        $this->edadUsuario = $edadUsuario;
    }

    public function getCorreoUsuario() {
        return $this->correoUsuario;
    }

    public function setCorreoUsuario($correoUsuario) {
        $this->correoUsuario = $correoUsuario;
    }

    public function getContraseniaUsuario() {
        return $this->contraseniaUsuario;
    }

    public function setContraseniaUsuario($contraseniaUsuario) {
        $this->contraseniaUsuario = $contraseniaUsuario;
    }

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

    public function createUser(){
        try{
  
                $conn = getDBConnection();
                $sentencia = $conn->prepare('INSERT INTO usuario(Nombre_Usuario, Edad_Usuario, Correo_Usuario, Contrasenia_Usuario) VALUES (?,?,?,?)');
                $sentencia->bindParam(1, $this -> nombreUsuario);
                $sentencia->bindParam(2, $this -> edadUsuario);
                $sentencia->bindParam(3, $this -> correoUsuario);
                $sentencia->bindParam(4, $this -> contraseniaUsuario);
                $sentencia->execute();

                $id = $conn->lastInsertId();
                return $id;

            }catch(PDOException $e){
          echo "Error en la conexión a base de datos";
        }
  
      }

      public function loginUser(){
        try{
  
                $conn = getDBConnection();
                $sentencia = $conn->prepare('SELECT `ID_Usuario`, `Nombre_Usuario`, `Correo_Usuario`, `Contrasenia_Usuario` FROM `usuario` WHERE Correo_Usuario = ? AND Contrasenia_Usuario = ?');
                $sentencia->bindParam(1, $this -> correoUsuario);
                $sentencia->bindParam(2, $this -> contraseniaUsuario);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

                if ($resultado) {
                    return $resultado[0];
                } else {
                    return false;
                }

            }catch(PDOException $e){
          echo "Error en la conexión a base de datos";
        }
  
      }

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