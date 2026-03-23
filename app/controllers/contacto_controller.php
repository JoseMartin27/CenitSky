<?php
require_once 'E:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre    = trim($_POST['nombre'] ?? '');
    $email     = trim($_POST['email'] ?? '');
    $direccion = trim($_POST['direccion'] ?? '');
    $mensaje   = trim($_POST['mensaje'] ?? '');
    if(empty($nombre) || empty($email) || empty($mensaje)) {
        header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=error#contacto');
        exit;
    }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=email#contacto');
        exit;
    }
    $stmt = $pdo->prepare('INSERT INTO mensajes (nombre, email, direccion, mensaje) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nombre, $email, $direccion, $mensaje]);
    header('Location: /MIS_PROYECTOS/CenitSky/public/index.php?contacto=ok#contacto');
    exit;
} else {
    header('Location: /MIS_PROYECTOS/CenitSky/public/index.php');
    exit;
}