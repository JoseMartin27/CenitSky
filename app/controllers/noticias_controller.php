<?php
    session_start();

    // Verificación de seguridad
    if(!isset($_SESSION['admin_logged'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }

    // Conexión a la base de datos
    require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

    // Función para limpiar el texto y evitar espacios o saltos de línea excesivos
    function limpiarContenido($texto) {
        if (!$texto) return '';
        // Eliminar espacios al inicio y final
        $texto = trim($texto);
        // Convertir 3 o más saltos de línea seguidos en solo 2 (evitar huecos gigantes)
        $texto = preg_replace("/(\r\n|\r|\n){3,}/", "\n\n", $texto);
        return $texto;
    }

    // Captura de variables iniciales
    $accion = $_POST['accion'] ?? $_GET['accion'] ?? '';
    $id     = (int)($_GET['id'] ?? 0);

    // ACCIÓN: CREAR NOTICIA
    if($accion === 'crear' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $titulo    = trim($_POST['titulo'] ?? '');
        $slug      = trim($_POST['slug'] ?? '');
        $resumen   = limpiarContenido($_POST['resumen'] ?? '');
        $contenido = limpiarContenido($_POST['contenido'] ?? '');
        $publicada = (int)($_POST['publicada'] ?? 0);
        $imagen    = null;

        // Validación básica
        if(empty($titulo) || empty($slug) || empty($contenido)) {
            header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?error=campos');
            exit;
        }

        // Procesar Imagen
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            $permitidos = ['jpg','jpeg','png','webp'];
            
            if(in_array($ext, $permitidos)) {
                $nombre = uniqid() . '_' . time() . '.' . $ext;
                $ruta_directorio = 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/';
                
                // Crear carpeta si no existe
                if (!is_dir($ruta_directorio)) {
                    mkdir($ruta_directorio, 0777, true);
                }

                $ruta_fisica = $ruta_directorio . $nombre;
                $imagen = '/MIS_PROYECTOS/CenitSky/public/uploads/noticias/fotos/' . $nombre;
                
                move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_fisica);
            }
        }

        $stmt = $pdo->prepare('INSERT INTO noticias (titulo, slug, resumen, contenido, imagen, publicada) VALUES (?, ?, ?, ?, ?, ?)');
        $stmt->execute([$titulo, $slug, $resumen, $contenido, $imagen, $publicada]);

        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?ok=creada');
        exit;
    }

    // ACCIÓN: ACTUALIZAR NOTICIA
    if($accion === 'actualizar' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id        = (int)$_POST['noticia_id'];
        $titulo    = trim($_POST['titulo'] ?? '');
        $slug      = trim($_POST['slug'] ?? '');
        $resumen   = limpiarContenido($_POST['resumen'] ?? '');
        $contenido = limpiarContenido($_POST['contenido'] ?? '');
        $publicada = (int)($_POST['publicada'] ?? 0);

        // Obtener imagen actual por si no se cambia
        $stmt = $pdo->prepare('SELECT imagen FROM noticias WHERE noticia_id = ?');
        $stmt->execute([$id]);
        $noticia = $stmt->fetch();
        $imagen = $noticia['imagen'];

        // Procesar nueva imagen si se sube una
        if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] === 0) {
            $ext = strtolower(pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION));
            $permitidos = ['jpg','jpeg','png','webp'];

            if(in_array($ext, $permitidos)) {
                // Eliminar imagen anterior si existe
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

    // ACCIÓN: PUBLICAR / DESPUBLICAR
    if($accion === 'toggle' && $id > 0) {
        $stmt = $pdo->prepare('UPDATE noticias SET publicada = IF(publicada = 1, 0, 1) WHERE noticia_id = ?');
        $stmt->execute([$id]);
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
        exit;
    }

    // ACCIÓN: ELIMINAR
    if($accion === 'eliminar' && $id > 0) {
        // 1. Buscar la imagen para borrar el archivo físico
        $stmt = $pdo->prepare('SELECT imagen FROM noticias WHERE noticia_id = ?');
        $stmt->execute([$id]);
        $noticia = $stmt->fetch();

        if($noticia && $noticia['imagen']) {
            $ruta_fisica = 'C:/xampp/htdocs' . $noticia['imagen'];
            if(file_exists($ruta_fisica)) unlink($ruta_fisica);
        }

        // 2. Borrar de la base de datos
        $stmt = $pdo->prepare('DELETE FROM noticias WHERE noticia_id = ?');
        $stmt->execute([$id]);
        
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php?ok=eliminada');
        exit;
    }

    // Redirección por defecto si no entra en ninguna acción
    header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
    exit;
?>