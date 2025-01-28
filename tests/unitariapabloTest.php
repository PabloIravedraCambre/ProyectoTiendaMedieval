<?php

use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

require_once "app/model/idioma.php";

class unitariapabloTest extends TestCase
{

    public function testIdioma(){

        //Creamos una instancia de idioma para el testeo

        $idiomaTest = new idioma(1, "Briasucés");

        //comprobamos que el idioma introducido es el proporcionado por el getNombre

        $this->assertEquals("Briasucés", $idiomaTest->getNombreIdioma());
  
    }

}





