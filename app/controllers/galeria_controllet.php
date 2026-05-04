<?php
session_start();
if(!isset($_SESSION['admin_logged'])) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
    exit;
}
require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

$accion = $_GET['accion'] ?? 'subir';
$id     = (int)($_GET['id'] ?? 0);

// ── Subir archivo ──
if($accion === 'subir' && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $categoria_id = (int)$_POST['categoria_id'];
    $tipo         = $_POST['tipo'] === 'video' ? 'video' : 'foto';
    $titulo       = trim($_POST['titulo'] ?? '');
    $descripcion  = trim($_POST['descripcion'] ?? '');
    $destacada    = (int)$_POST['destacada'];

    // Obtener slug de la categoría
    $stmt = $pdo->prepare('SELECT slug FROM categorias WHERE categoria_id = ?');
    $stmt->execute([$categoria_id]);
    $cat = $stmt->fetch();

    if(!$cat || !isset($_FILES['archivo']) || $_FILES['archivo']['error'] !== 0) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php?error=archivo');
        exit;
    }

    $ext       = strtolower(pathinfo($_FILES['archivo']['name'], PATHINFO_EXTENSION));
    $permitidos_foto  = ['jpg','jpeg','png','webp'];
    $permitidos_video = ['mp4','mov','webm'];
    $permitidos = $tipo === 'foto' ? $permitidos_foto : $permitidos_video;

    if(!in_array($ext, $permitidos)) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php?error=formato');
        exit;
    }

    $nombre_archivo = uniqid() . '_' . time() . '.' . $ext;
    $subcarpeta     = $tipo === 'foto' ? 'fotos' : 'videos';
    $ruta_fisica    = "E:/xampp/htdocs/MIS_PROYECTOS/CenitSky/public/uploads/{$cat['slug']}/{$subcarpeta}/{$nombre_archivo}";
    $ruta_web       = "/MIS_PROYECTOS/CenitSky/public/uploads/{$cat['slug']}/{$subcarpeta}/{$nombre_archivo}";

    if(!move_uploaded_file($_FILES['archivo']['tmp_name'], $ruta_fisica)) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php?error=subida');
        exit;
    }

    $stmt = $pdo->prepare('INSERT INTO media (categoria_id, tipo, archivo, titulo, descripcion, destacada) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$categoria_id, $tipo, $ruta_web, $titulo, $descripcion, $destacada]);

    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php?ok=subida');
    exit;
}

// ── Destacar / quitar destacada ──
if($accion === 'destacar' && $id > 0) {
    $stmt = $pdo->prepare('UPDATE media SET destacada = IF(destacada = 1, 0, 1) WHERE media_id = ?');
    $stmt->execute([$id]);
    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php');
    exit;
}

// ── Eliminar ──
if($accion === 'eliminar' && $id > 0) {
    $stmt = $pdo->prepare('SELECT archivo FROM media WHERE media_id = ?');
    $stmt->execute([$id]);
    $item = $stmt->fetch();

    if($item) {
        $ruta_fisica = 'E:/xampp/htdocs' . $item['archivo'];
        if(file_exists($ruta_fisica)) unlink($ruta_fisica);
        $stmt = $pdo->prepare('DELETE FROM media WHERE media_id = ?');
        $stmt->execute([$id]);
    }

    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php');
    exit;
}

header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/galeria.php');
exit;