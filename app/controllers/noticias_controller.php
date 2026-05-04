<?php
session_start();
if(!isset($_SESSION['admin_logged'])) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
    exit;
}
require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

$accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
$id     = (int)($_GET['id'] ?? 0);

// ── Crear noticia ──
if($accion === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo    = trim($_POST['titulo'] ?? '');
    $slug      = trim($_POST['slug'] ?? '');
    $resumen   = trim($_POST['resumen'] ?? '');
    $contenido = trim($_POST['contenido'] ?? '');
    $publicada = (int)($_POST['publicada'] ?? 0);
    $imagen    = null;

    if(empty($titulo) || empty($slug) || empty($contenido)) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?error=campos');
        exit;
    }

    // Subir imagen si existe
    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg','jpeg','png','webp'];
        if(in_array($ext, $permitidos)) {
            $nombre = uniqid() . '_' . time() . '.' . $ext;
            $ruta_fisica = 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/' . $nombre;
            $imagen = '/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/' . $nombre;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_fisica);
        }
    }

    $stmt = $pdo->prepare('INSERT INTO noticias (titulo, slug, resumen, contenido, imagen, publicada) VALUES (?, ?, ?, ?, ?, ?)');
    $stmt->execute([$titulo, $slug, $resumen, $contenido, $imagen, $publicada]);

    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?ok=creada');
    exit;
}

// ── Publicar/despublicar ──
if($accion === 'toggle' && $id > 0) {
    $stmt = $pdo->prepare('UPDATE noticias SET publicada = IF(publicada = 1, 0, 1) WHERE noticia_id = ?');
    $stmt->execute([$id]);
    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
    exit;
}

// ── Eliminar ──
if($accion === 'eliminar' && $id > 0) {
    $stmt = $pdo->prepare('SELECT imagen FROM noticias WHERE noticia_id = ?');
    $stmt->execute([$id]);
    $noticia = $stmt->fetch();

    if($noticia && $noticia['imagen']) {
        $ruta_fisica = 'C:/xampp/htdocs' . $noticia['imagen'];
        if(file_exists($ruta_fisica)) unlink($ruta_fisica);
    }

    $stmt = $pdo->prepare('DELETE FROM noticias WHERE noticia_id = ?');
    $stmt->execute([$id]);
    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
    exit;
}

// ── Actualizar (desde editar) ──
if($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = (int)$_POST['noticia_id'];
    $titulo    = trim($_POST['titulo'] ?? '');
    $slug      = trim($_POST['slug'] ?? '');
    $resumen   = trim($_POST['resumen'] ?? '');
    $contenido = trim($_POST['contenido'] ?? '');
    $publicada = (int)($_POST['publicada'] ?? 0);

    $stmt = $pdo->prepare('SELECT imagen FROM noticias WHERE noticia_id = ?');
    $stmt->execute([$id]);
    $noticia = $stmt->fetch();
    $imagen = $noticia['imagen'];

    if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
        $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
        $permitidos = ['jpg','jpeg','png','webp'];
        if(in_array($ext, $permitidos)) {
            if($imagen) {
                $ruta_vieja = 'C:/xampp/htdocs' . $imagen;
                if(file_exists($ruta_vieja)) unlink($ruta_vieja);
            }
            $nombre = uniqid() . '_' . time() . '.' . $ext;
            $ruta_fisica = 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/' . $nombre;
            $imagen = '/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/' . $nombre;
            move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_fisica);
        }
    }

    $stmt = $pdo->prepare('UPDATE noticias SET titulo=?, slug=?, resumen=?, contenido=?, imagen=?, publicada=? WHERE noticia_id=?');
    $stmt->execute([$titulo, $slug, $resumen, $contenido, $imagen, $publicada, $id]);

    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?ok=actualizada');
    exit;
}

header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
exit;