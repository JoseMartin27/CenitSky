<?php
    session_start();
    if(!isset($_SESSION['admin_logged'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }
    require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $campos = ['nombre_sitio', 'email_contacto', 'telefono', 'instagram', 'youtube', 'texto_footer'];

        $stmt = $pdo->prepare('UPDATE configuracion SET valor = ? WHERE clave = ?');
        foreach($campos as $campo) {
            $valor = trim($_POST[$campo] ?? '');
            $stmt->execute([$valor, $campo]);
        }
    }

    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/configuracion.php?ok=1');
    exit;
?>