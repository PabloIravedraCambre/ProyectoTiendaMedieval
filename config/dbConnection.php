<?php

/**
 * 
 * Este documento crea la conexión con la base de datos mysql que hemos creado, mediante el uso de PDO.
 * Si la conexión con la BBDD falla, se capturará la excepción y retornará un mensaje de error
 *
 * @return PDO|null Devuelve un objeto PDO si la conexión es exitosa, o null si hay un error de conexión.
 * 
 * @throws PDOException Si ocurre un error en la conexión con la base de datos.
 */
function getDBConnection() {
    // Configuración de la base de datos
    $host = 'localhost';
    $db_name = "tienda_medieval";
    $username = "brais";
    $password = "consolaps4";

    try {
        // Intentamos establecer la conexión con PDO
        $conn = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
        
        // Establecemos el modo de error para que PDO lance excepciones
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Retornamos la conexión PDO en caso de éxito
        return $conn;
    } catch (PDOException $e) {
        // Si ocurre un error, mostramos el mensaje de error
        echo 'Error de conexión: ' . $e->getMessage();
        
        // Devolvemos null en caso de error
        return null;
    }
}

?>
