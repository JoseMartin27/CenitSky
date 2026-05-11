<?php
    require_once dirname(__DIR__, 2) . '/app/config/database.php';
    $stmt = $pdo->query('SELECT clave, valor FROM configuracion');
    $config = [];
    foreach($stmt->fetchAll() as $row) {
        $config[$row['clave']] = $row['valor'];
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title><?php echo htmlspecialchars($config['nombre_sitio'] ?? 'Cenit-Sky'); ?></title>
    <meta name="author" content="JoseMartin">
    <link rel="icon" href="assets/images/drone_icon.png">
    <meta name="description" content="Web dinámica de servicios de vídeo con drones">
    <meta name="keywords" content="video,dron,aire,cielo,eventos,record,air,vista">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/base.css">
    <link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/layout.css">
</head>
<body>