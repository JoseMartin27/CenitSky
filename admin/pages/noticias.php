<?php
session_start();
if(!isset($_SESSION['admin_logged'])) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
    exit;
}
require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

$noticias = $pdo->query('SELECT * FROM noticias ORDER BY fecha DESC')->fetchAll();
?>

<?php include '../../public/partials/head.php'; ?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/admin/assets/css/admin.css">

<div class="admin-wrap">

    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 10 7 7"/><path d="m10 14-3 3"/><path d="m14 10 3-3"/>
                <path d="m14 14 3 3"/><path d="M14.205 4.139a4 4 0 1 1 5.439 5.863"/>
                <path d="M19.637 14a4 4 0 1 1-5.432 5.868"/><path d="M4.367 10a4 4 0 1 1 5.438-5.862"/>
                <path d="M9.795 19.862a4 4 0 1 1-5.429-5.873"/>
                <rect x="10" y="8" width="4" height="8" rx="1"/>
            </svg>
            <span>Cenit-<span>Sky</span></span>
        </div>
        <nav class="sidebar-nav">
            <a href="/MIS_PROYECTOS/CenitSky/admin/index.php" class="sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
                Dashboard
            </a>
            <a href="/MIS_PROYECTOS/CenitSky/admin/pages/mensajes.php" class="sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>
                Mensajes
            </a>
            <a href="/MIS_PROYECTOS/CenitSky/admin/pages/galeria.php" class="sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                Galería
            </a>
            <a href="/MIS_PROYECTOS/CenitSky/admin/pages/noticias.php" class="sidebar-link active">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 18h-5"/><path d="M18 14h-8"/><path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2"/><rect width="8" height="4" x="10" y="6" rx="1"/></svg>
                Noticias
            </a>
            <a href="/MIS_PROYECTOS/CenitSky/admin/pages/configuracion.php" class="sidebar-link">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z"/><circle cx="12" cy="12" r="3"/></svg>
                Configuración
            </a>
        </nav>
        <a href="/MIS_PROYECTOS/CenitSky/public/index.php" class="sidebar-web">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
            Ver web
        </a>
    </aside>

    <!-- Contenido -->
    <main class="admin-main">
        <div class="admin-topbar">
            <h1 class="admin-page-title">Noticias</h1>
            <div class="admin-topbar-right">
                <span class="admin-user"><?php echo htmlspecialchars($_SESSION['admin_nombre']); ?></span>
                <a href="/MIS_PROYECTOS/CenitSky/app/controllers/logout_controller.php" class="btn-logout">Cerrar sesión</a>
            </div>
        </div>

        <!-- Formulario nueva noticia -->
        <div class="admin-section">
            <div class="admin-section-header">
                <h2 class="admin-section-title">Nueva noticia</h2>
            </div>
            <form class="upload-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/noticias_controller.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="accion" value="crear">
                <div class="upload-grid">
                    <div class="upload-group">
                        <label>Título</label>
                        <input type="text" name="titulo" placeholder="Título de la noticia" required />
                    </div>
                    <div class="upload-group">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" placeholder="titulo-de-la-noticia" required />
                    </div>
                    <div class="upload-group">
                        <label>Imagen</label>
                        <input type="file" name="imagen" accept="image/*" />
                    </div>
                    <div class="upload-group">
                        <label>Publicar</label>
                        <select name="publicada">
                            <option value="0">Borrador</option>
                            <option value="1">Publicada</option>
                        </select>
                    </div>
                </div>
                <div class="upload-group">
                    <label>Resumen</label>
                    <textarea name="resumen" placeholder="Texto corto para la tarjeta..." rows="2"></textarea>
                </div>
                <div class="upload-group">
                    <label>Contenido</label>
                    <textarea name="contenido" placeholder="Contenido completo de la noticia..." rows="8" required></textarea>
                </div>
                <button type="submit" class="btn-upload">Crear noticia</button>
            </form>
        </div>

        <!-- Listado de noticias -->
        <div class="admin-section">
            <div class="admin-section-header">
                <h2 class="admin-section-title">Todas las noticias</h2>
            </div>
            <?php if(empty($noticias)): ?>
                <div class="messages-empty"><p>No hay noticias todavía</p></div>
            <?php else: ?>
                <div class="noticias-list">
                    <?php foreach($noticias as $n): ?>
                        <div class="noticia-row">
                            <div class="noticia-info">
                                <?php if($n['imagen']): ?>
                                    <img src="<?php echo htmlspecialchars($n['imagen']); ?>" class="noticia-thumb" alt="">
                                <?php else: ?>
                                    <div class="noticia-thumb noticia-thumb--empty"></div>
                                <?php endif; ?>
                                <div class="noticia-datos">
                                    <span class="noticia-titulo"><?php echo htmlspecialchars($n['titulo']); ?></span>
                                    <span class="noticia-resumen"><?php echo htmlspecialchars(substr($n['resumen'] ?? '', 0, 80)) . '...'; ?></span>
                                </div>
                            </div>
                            <div class="noticia-meta">
                                <span class="noticia-fecha"><?php echo date('d/m/Y', strtotime($n['fecha'])); ?></span>
                                <span class="noticia-estado <?php echo $n['publicada'] ? 'noticia-estado--publicada' : 'noticia-estado--borrador'; ?>">
                                    <?php echo $n['publicada'] ? 'Publicada' : 'Borrador'; ?>
                                </span>
                                <div class="mensaje-acciones">
                                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/noticias_editar.php?id=<?php echo $n['noticia_id']; ?>" class="btn-accion">Editar</a>
                                    <a href="/MIS_PROYECTOS/CenitSky/app/controllers/noticias_controller.php?accion=toggle&id=<?php echo $n['noticia_id']; ?>" class="btn-accion">
                                        <?php echo $n['publicada'] ? 'Despublicar' : 'Publicar'; ?>
                                    </a>
                                    <a href="/MIS_PROYECTOS/CenitSky/app/controllers/noticias_controller.php?accion=eliminar&id=<?php echo $n['noticia_id']; ?>"
                                        class="btn-accion btn-accion--danger"
                                        onclick="return confirm('¿Eliminar esta noticia?')">
                                        Eliminar
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </main>
</div>

<script>
// Auto-generar slug desde el título
document.querySelector('[name="titulo"]').addEventListener('input', function() {
    const slug = this.value
        .toLowerCase()
        .normalize('NFD').replace(/[\u0300-\u036f]/g, '')
        .replace(/[^a-z0-9\s-]/g, '')
        .trim()
        .replace(/\s+/g, '-');
    document.getElementById('slug').value = slug;
});
</script>

</body>
</html>