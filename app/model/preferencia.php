<?php
require_once "../../config/dbConnection.php";

class preferencia {
    private $idIdioma;
    private $idPreferencia;
    private $idUsuario;

    public function __construct($idIdioma, $idPreferencia, $idUsuario) {
        $this->idIdioma = $idIdioma;
        $this->idPreferencia = $idPreferencia;
        $this->idUsuario = $idUsuario;
    }

    public function getIdIdioma() {
        return $this->idIdioma;
    }

    public function setIdIdioma($idIdioma) {
        $this->idIdioma = $idIdioma;
    }

    public function getIdPreferencia() {
        return $this->idPreferencia;
    }

    public function setIdPreferencia($idPreferencia) {
        $this->idPreferencia = $idPreferencia;
    }

    public function getIdUsuario() {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }
}