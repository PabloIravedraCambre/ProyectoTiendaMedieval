<?php
require_once "../../config/dbConnection.php";

class idioma {
    private $idIdioma;
    private $nombreIdioma;

    public function __construct($idIdioma, $nombreIdioma) {
        $this->idIdioma = $idIdioma;
        $this->nombreIdioma = $nombreIdioma;
    }

    public function getIdIdioma() {
        return $this->idIdioma;
    }

    public function setIdIdioma($idIdioma) {
        $this->idIdioma = $idIdioma;
    }

    public function getNombreIdioma() {
        return $this->nombreIdioma;
    }

    public function setNombreIdioma($nombreIdioma) {
        $this->nombreIdioma = $nombreIdioma;
    }
}