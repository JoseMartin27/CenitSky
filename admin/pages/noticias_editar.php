<?php
    session_start();
    if(!isset($_SESSION['admin_logged'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }
    require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

    $id = (int)($_GET['id'] ?? 0);
    $stmt = $pdo->prepare('SELECT * FROM noticias WHERE noticia_id = ?');
    $stmt->execute([$id]);
    $n = $stmt->fetch();

    if(!$n) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/pages/noticias.php');
        exit;
    }
    include '../../public/partials/head.php'; 
?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/admin/assets/css/admin.css">

        <div class="admin-wrap">
            <aside class="admin-sidebar"></aside>

            <main class="admin-main">
                <div class="admin-topbar">
                    <h1 class="admin-page-title">Editar noticia</h1>
                    <div class="admin-topbar-right">
                        <a href="/MIS_PROYECTOS/CenitSky/admin/pages/noticias.php" class="btn-logout">← Volver</a>
                        <a href="/MIS_PROYECTOS/CenitSky/app/controllers/logout_controller.php" class="btn-logout">Cerrar sesión</a>
                    </div>
                </div>

                <div class="admin-section">
                    <div class="admin-section-header">
                        <h2 class="admin-section-title">Editando: <?php echo htmlspecialchars($n['titulo']); ?></h2>
                    </div>
                    <form class="upload-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/noticias_controller.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="accion" value="actualizar">
                        <input type="hidden" name="noticia_id" value="<?php echo $n['noticia_id']; ?>">
                        <div class="upload-grid">
                            <div class="upload-group">
                                <label>Título</label>
                                <input type="text" name="titulo" value="<?php echo htmlspecialchars($n['titulo']); ?>" required />
                            </div>
                            <div class="upload-group">
                                <label>Slug</label>
                                <input type="text" name="slug" value="<?php echo htmlspecialchars($n['slug']); ?>" required />
                            </div>
                            <div class="upload-group">
                                <label>Imagen <?php echo $n['imagen'] ? '(actual guardada)' : ''; ?></label>
                                <input type="file" name="imagen" accept="image/*" />
                            </div>
                            <div class="upload-group">
                                <label>Publicar</label>
                                <select name="publicada">
                                    <option value="0" <?php echo !$n['publicada'] ? 'selected' : ''; ?>>Borrador</option>
                                    <option value="1" <?php echo $n['publicada'] ? 'selected' : ''; ?>>Publicada</option>
                                </select>
                            </div>
                        </div>
                        <div class="upload-group">
                            <label>Resumen</label>
                            <textarea name="resumen" rows="2"><?php echo htmlspecialchars($n['resumen'] ?? ''); ?></textarea>
                        </div>
                        <div class="upload-group">
                            <label>Contenido</label>
                            <textarea name="contenido" rows="10" required><?php echo htmlspecialchars($n['contenido']); ?></textarea>
                        </div>
                        <button type="submit" class="btn-upload">Guardar cambios</button>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>