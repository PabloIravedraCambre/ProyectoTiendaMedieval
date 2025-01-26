<?php
require_once "../../config/dbConnection.php";

class FavoritoUsuario {
    private $idFavorito;
    private $idProducto;
    private $idUsuario;

    public function __construct($idProducto, $idUsuario, $idFavorito) {
        $this->idProducto = $idProducto;
        $this->idUsuario = $idUsuario;
        $this->idFavorito = $idFavorito;
    }

    public function getIdProducto() {
        return $this->idProducto;
    }

    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    public function getIdFavorito() {
        return $this->idFavorito;
    }

    public function setIdFavorito($idFavorito) {
        $this->idFavorito = $idFavorito;
    }
}