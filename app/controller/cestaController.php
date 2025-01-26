<?php
require_once "../../config/dbConnection.php";

class cestaController {

    public function __construct() {
        // Iniciar la sesión solo si no ha sido iniciada
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }

        // Inicializar la variable de sesión 'favoritos' si no existe
        if (!isset($_SESSION['cesta'])) {
            $_SESSION['cesta'] = []; // Asegúrate de que es un array
        }
    }

    public function addCesta($idProducto,$idUsuario,$nombreProducto) {
        $cesta = new Cesta($idProducto,$idUsuario,$nombreProducto);
        array_push($_SESSION['favoritos'], $cesta);
    }

    public function saveFavoritos() {
        // Favorito::save($_SESSION['favoritos']);
        unset($_SESSION['favoritos']);
    }
}
