<?php
    //Credenciales y conexion bd 
    $host = 'localhost'; //Ruta de la base de datos
    $dbname = 'cenitsky'; //Nombre de la base de datos
    $username = 'root'; //Usuario 
    $password = 'Shelbygt500@'; //Password

    #Intentamos conectar contra la base de datos de mysql 
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    } catch (PDOException $e){
        die("Error en la conexión: " .$e->getMessage());
    }
?>
