<?php
require_once "../../config/dbConnection.php";

class cesta {
    private $idCesta;
    private $idProducto;
    private $idUsuario;
    private $cantidadCesta;

    public function __construct($idProducto, $idUsuario, $idCesta, $cantidadCesta) {
        $this->idProducto = $idProducto;
        $this->idUsuario = $idUsuario;
        $this->idCesta = $idCesta;
        $this->cantidadCesta = $cantidadCesta;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getIdCesta() {
        return $this->idCesta;
    }

    public function setIdCesta($idCesta) {
        $this->idCesta = $idCesta;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getCantidadCesta() {
        return $this->cantidadCesta;
    }

    public function setCantidadCesta($cantidadCesta) {
        $this->cantidadCesta = $cantidadCesta;
    }

    public function createCesta(){
        try{
  
                $conn = getDBConnection();
                $sentencia = $conn->prepare('INSERT INTO cesta(Cantidad_Cesta) VALUES (?)');
                $sentencia->bindParam(1, $this -> cantidadCesta);
                $sentencia->execute();

            }catch(PDOException $e){
          echo "Error en la conexión a base de datos"; 
        }
  
      }

}
