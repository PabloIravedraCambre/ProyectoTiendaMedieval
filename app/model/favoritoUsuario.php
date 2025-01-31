<?php

/**
 * Esta clase define los datos de un producto favorito
 * Almacena información sobre un producto que un usuario ha guardado en favoritos
 *
 * @package TiendaMedieval
 * 
 */
class FavoritoUsuario {
    /**
     * @var int $idFavorito ID del favorito en la base de datos.
     */
    private $idFavorito;

    /**
     * @var int $idProducto ID del producto que el usuario ha marcado como favorito.
     */
    private $idProducto;

    /**
     * @var int $idUsuario ID del usuario que ha marcado el producto como favorito.
     */
    private $idUsuario;

    /**
     * Este es el constructor de la clase FavoritoUsuario, 
     * crea un objeto que tiene como parámetro los valores del producto, usuario y favorito
     * 
     * @param int $idProducto ID del producto favorito.
     * @param int $idUsuario ID del usuario que marca el producto como favorito.
     * @param int $idFavorito ID del favorito
     */
    public function __construct($idProducto, $idUsuario, $idFavorito) {
        $this->idProducto = $idProducto;
        $this->idUsuario = $idUsuario;
        $this->idFavorito = $idFavorito;
    }

    /**
     * esta función obtiene el ID del producto que se ha guardado en favoritos
     *
     * @return int El ID del producto.
     */
    public function getIdProducto() {
        return $this->idProducto;
    }

    /**
     *  esta función establece el ID del producto marcado como favorito.
     *
     * @param int $idProducto El nuevo ID del producto.
     * 
     * @return void
     */
    public function setIdProducto($idProducto) {
        $this->idProducto = $idProducto;
    }

    /**
     * Esta función obtiene el ID del usuario que marcó el producto como favorito.
     *
     * @return int El ID del usuario.
     */
    public function getIdUsuario() {
        return $this->idUsuario;
    }

    /**
     * Esta función establece el ID del usuario que marcó el producto como favorito.
     *
     * @param int $idUsuario El nuevo ID del usuario.
     * 
     * @return void
     */
    public function setIdUsuario($idUsuario) {
        $this->idUsuario = $idUsuario;
    }

    /**
     * Esta función obtiene el ID del favorito.
     *
     * @return int El ID del favorito.
     */
    public function getIdFavorito() {
        return $this->idFavorito;
    }

    /**
     * Esta función establece el ID del favorito.
     *
     * @param int $idFavorito El nuevo ID del favorito.
     * 
     * @return void
     */
    public function setIdFavorito($idFavorito) {
        $this->idFavorito = $idFavorito;
    }
}
?>
