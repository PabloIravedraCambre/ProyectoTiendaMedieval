<?php

require_once "../../config/dbConnection.php";

class Producto{
    private $nombre;
    private $precio;
    private $idProducto;
    private $cantidad;

    public function getNombre(){
        return $this -> nombre;
    }

    public function getPrecio(){
        return $this-> precio;
    }

    public function getidProducto(){
        return $this -> idProducto;
    }

    public function getcantidad(){
        return $this -> cantidad;
    }

  
    public function setNombre($nombreParam){
        $this -> nombre = $nombreParam;
    }

    public function setPrecio($precioParam){
        $this -> precio = $precioParam;
    }

    public function setIdproducto($idProductoParam){
        $this -> idProducto = $idProductoParam;
    }

    public function setCantidad($cantidadParam){
        $this -> cantidad = $cantidadParam;
    }
}

?>