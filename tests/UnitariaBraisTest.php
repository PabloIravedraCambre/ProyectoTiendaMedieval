<?php

use PHPUnit\Framework\TestCase;

require_once "app/model/FavoritoUsuario.php";

class UnitariaBraisTest extends TestCase{
    
    public function testSeteoIdUsuario(){
        // 1º Crear una instancia de FavoritoUsuario
        // vemos el constructor de FavoritoUsuario.php
        // Primero va idProducto
        // Segundo va idUsuario
        // Tercero va idFavorito
        $favorito = new FavoritoUsuario(1, 2, 3);

        // 2º Comprobamos que el id del usuario esta bien seteado
        $this->assertEquals(2, $favorito->getIdUsuario());
    }
    
}

?>