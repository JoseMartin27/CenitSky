<?php
    session_start();
    require_once '../config/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        $email    = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');

        if(empty($email) || empty($password)) {
            header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php?error=campos');
            exit;
        }

        $stmt = $pdo->prepare('SELECT * FROM usuarios WHERE email = ? LIMIT 1');
        $stmt->execute([$email]);
        $usuario = $stmt->fetch();

        if($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['admin_logged']  = true;
            $_SESSION['admin_nombre']  = $usuario['nombre'];
            $_SESSION['admin_rol']     = $usuario['rol'];
            header('Location: /MIS_PROYECTOS/CenitSky/admin/index.php');
            exit;
        } else {
            header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php?error=credenciales');
            exit;
        }

    } else {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }
?>