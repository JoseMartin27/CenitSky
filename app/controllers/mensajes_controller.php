<?php
session_start();
if (!isset($_SESSION['admin_logged'])) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
    exit;
}
require_once 'E:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

$accion = $_GET['accion'] ?? '';
$id     = (int)($_GET['id'] ?? 0);

if ($id <= 0) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/mensajes.php');
    exit;
}

if ($accion === 'toggle') {
    $stmt = $pdo->prepare('UPDATE mensajes SET leido = IF(leido = 1, 0, 1) WHERE mensaje_id = ?');
    $stmt->execute([$id]);
} elseif ($accion === 'eliminar') {
    $stmt = $pdo->prepare('DELETE FROM mensajes WHERE mensaje_id = ?');
    $stmt->execute([$id]);
} elseif($accion === 'leer') {
    $stmt = $pdo->prepare('UPDATE mensajes SET leido = 1 WHERE mensaje_id = ?');
    $stmt->execute([$id]);
    exit;
}

header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/mensajes.php');
exit;
