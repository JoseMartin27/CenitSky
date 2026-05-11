<?php
session_start();
require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = trim($_POST['nombre'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $mensaje   = trim($_POST['mensaje'] ?? '');
    $privacidad = isset($_POST['privacidad']);

    // Guardar para repoblar campos
    $_SESSION['old'] = $_POST;
    $_SESSION['errores_validos'] = [];

    // Validaciones
    if(empty($nombre))  $_SESSION['errores_validos']['nombre'] = "El nombre es obligatorio.";
    if(empty($mensaje)) $_SESSION['errores_validos']['mensaje'] = "El mensaje no puede estar vacío.";
    if(!$privacidad)    $_SESSION['errores_validos']['privacidad'] = "Debes aceptar la privacidad.";
    
    if(empty($email)) {
        $_SESSION['errores_validos']['email'] = "El email es obligatorio.";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['errores_validos']['email'] = "Email no válido.";
    }

    // Si hay errores, volvemos al index en la sección contacto
    if(!empty($_SESSION['errores_validos'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=error#contacto');
        exit;
    }

    // Si todo está OK
    try {
        $stmt = $pdo->prepare('INSERT INTO mensajes (nombre, email, direccion, mensaje) VALUES (?, ?, ?, ?)');
        $stmt->execute([$nombre, $email, $direccion, $mensaje]);
        
        unset($_SESSION['old']); // Limpiar datos viejos tras éxito
        header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=ok#contacto');
    } catch (Exception $e) {
        header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=error_db#contacto');
    }
    exit;
}