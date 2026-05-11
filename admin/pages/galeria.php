
<?php
    session_start();
    if(!isset($_SESSION['admin_logged'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }
    require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';

    $categorias = $pdo->query('SELECT * FROM categorias WHERE activa = 1')->fetchAll();

    $media = $pdo->query('
        SELECT m.*, c.nombre as cat_nombre, c.slug as cat_slug
        FROM media m
        JOIN categorias c ON m.categoria_id = c.categoria_id
        ORDER BY m.categoria_id, m.orden ASC, m.fecha DESC
    ')->fetchAll();

    $media_por_categoria = [];
    foreach($media as $item) {
        $media_por_categoria[$item['cat_slug']][] = $item;
    }
    include '../../public/partials/head.php'; 
?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/admin/assets/css/admin.css">

        <div class="admin-wrap">
            <!-- Barra de estado -->
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
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/galeria.php" class="sidebar-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
                        Galería
                    </a>
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/noticias.php" class="sidebar-link">
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
                    <h1 class="admin-page-title">Galería</h1>
                    <div class="admin-topbar-right">
                        <span class="admin-user"><?php echo htmlspecialchars($_SESSION['admin_nombre']); ?></span>
                        <a href="/MIS_PROYECTOS/CenitSky/app/controllers/logout_controller.php" class="btn-logout">Cerrar sesión</a>
                    </div>
                </div>

                <!-- Mensajes de estado -->
                <?php if(isset($_GET['ok'])): ?>
                    <div class="admin-alert admin-alert--ok">
                        <?php
                        echo $_GET['ok'] === 'editado'
                            ? 'Datos actualizados correctamente'
                            : 'Archivo subido correctamente';
                        ?>
                    </div>
                <?php endif; ?>
                <?php if(isset($_GET['error'])): ?>
                    <div class="admin-alert admin-alert--error">
                        <?php
                        $errores = [
                            'archivo'  => 'Error al recibir el archivo',
                            'formato'  => 'Formato de archivo no permitido',
                            'subida'   => 'Error al guardar el archivo en el servidor',
                        ];
                        echo $errores[$_GET['error']] ?? 'Error desconocido';
                        ?>
                    </div>
                <?php endif; ?>

                <!-- Formulario de subida de archivos -->
                <div class="admin-section">
                    <div class="admin-section-header">
                        <h2 class="admin-section-title">Subir archivo</h2>
                    </div>
                    <form class="upload-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/galeria_controller.php" method="POST" enctype="multipart/form-data">
                        <div class="upload-grid">
                            <div class="upload-group">
                                <label>Categoría</label>
                                <select name="categoria_id">
                                    <?php foreach($categorias as $cat): ?>
                                        <option value="<?php echo $cat['categoria_id']; ?>"><?php echo htmlspecialchars($cat['nombre']); ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="upload-group">
                                <label>Tipo</label>
                                <select name="tipo">
                                    <option value="foto">Foto</option>
                                    <option value="video">Vídeo</option>
                                </select>
                            </div>
                            <div class="upload-group">
                                <label>Título</label>
                                <input type="text" name="titulo" placeholder="Título del archivo" />
                            </div>
                            <div class="upload-group">
                                <label>Destacada en portada</label>
                                <select name="destacada">
                                    <option value="0">No</option>
                                    <option value="1">Sí</option>
                                </select>
                            </div>
                        </div>
                        <div class="upload-group upload-group--full">
                            <label>Descripción</label>
                            <textarea name="descripcion" placeholder="Descripción opcional..." rows="2"></textarea>
                        </div>
                        <div class="upload-file-wrap">
                            <label class="upload-file-label" for="archivo">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="17 8 12 3 7 8"/><line x1="12" x2="12" y1="3" y2="15"/></svg>
                                <span id="uploadFileName">Seleccionar archivo</span>
                            </label>
                            <input type="file" id="archivo" name="archivo" accept="image/*,video/*" required style="display:none" />
                        </div>
                        <button type="submit" class="btn-upload">Subir archivo</button>
                    </form>
                </div>

                <!-- Archivos por categoría -->
                <?php if(empty($media)): ?>
                    <div class="admin-section">
                        <div class="messages-empty"><p>No hay archivos subidos todavía</p></div>
                    </div>
                <?php else: ?>
                    <?php foreach($categorias as $cat): ?>
                        <?php if(!empty($media_por_categoria[$cat['slug']])): ?>
                            <div class="admin-section">
                                <div class="admin-section-header">
                                    <h2 class="admin-section-title"><?php echo htmlspecialchars($cat['nombre']); ?></h2>
                                </div>
                                <div class="galeria-grid">
                                    <?php foreach($media_por_categoria[$cat['slug']] as $item): ?>
                                        <div class="galeria-item <?php echo $item['destacada'] ? 'galeria-item--destacada' : ''; ?>">
                                            <?php if($item['tipo'] === 'foto'): ?>
                                                <img src="<?php echo htmlspecialchars($item['archivo']); ?>" alt="<?php echo htmlspecialchars($item['titulo'] ?? ''); ?>">
                                            <?php else: ?>
                                                <video src="<?php echo htmlspecialchars($item['archivo']); ?>" muted></video>
                                            <?php endif; ?>
                                            <?php if($item['destacada']): ?>
                                                <span class="galeria-badge">Destacada</span>
                                            <?php endif; ?>
                                            <div class="galeria-overlay">
                                                <span class="galeria-titulo"><?php echo htmlspecialchars($item['titulo'] ?? 'Sin título'); ?></span>
                                                <div class="galeria-acciones">
                                                    <button
                                                        class="btn-accion"
                                                        onclick="abrirModal(<?php echo $item['media_id']; ?>, '<?php echo addslashes(htmlspecialchars($item['titulo'] ?? '')); ?>', '<?php echo addslashes(htmlspecialchars($item['descripcion'] ?? '')); ?>')">
                                                        Editar
                                                    </button>
                                                    <a href="/MIS_PROYECTOS/CenitSky/app/controllers/galeria_controller.php?accion=destacar&id=<?php echo $item['media_id']; ?>" class="btn-accion">
                                                        <?php echo $item['destacada'] ? 'Quitar destacada' : 'Destacar'; ?>
                                                    </a>
                                                    <a href="/MIS_PROYECTOS/CenitSky/app/controllers/galeria_controller.php?accion=eliminar&id=<?php echo $item['media_id']; ?>"
                                                        class="btn-accion btn-accion--danger"
                                                        onclick="return confirm('¿Eliminar este archivo?')">
                                                        Eliminar
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php endif; ?>

            </main>
        </div>

        <!-- ── Modal editar ── -->
        <div id="modalEditar" class="modal-overlay">
            <div class="modal-box">
                <div class="modal-header">
                    <div class="modal-info">
                        <h3 class="modal-nombre">Editar archivo</h3>
                        <p class="modal-email">Edita los detalles de publicaciones.</p>
                    </div>
                    <button type="button" class="modal-close" onclick="cerrarModal()">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                    </button>
                </div>

                <form method="POST" action="/MIS_PROYECTOS/CenitSky/app/controllers/galeria_controller.php?accion=editar" class="login-form" style="margin:0; gap:20px;">
                    <input type="hidden" id="modal_media_id" name="media_id">
                    
                    <div class="upload-group">
                        <label>Título</label>
                        <input type="text" id="modal_titulo" name="titulo" placeholder="Ej. Atardecer en la costa">
                    </div>

                    <div class="upload-group">
                        <label>Descripción</label>
                        <textarea id="modal_descripcion" name="descripcion" rows="4" placeholder="Escribe una breve descripción..."></textarea>
                    </div>

                    <div class="modal-actions">
                        <button type="button" class="btn-modal-cancel" onclick="cerrarModal()">Cancelar</button>
                        <button type="submit" class="btn-modal-save">Guardar cambios</button>
                    </div>
                </form>
            </div>
        </div>

        <script>
            document.getElementById('archivo').addEventListener('change', function() {
                const name = this.files[0]?.name || 'Seleccionar archivo';
                document.getElementById('uploadFileName').textContent = name;
            });

            function abrirModal(id, titulo, descripcion) {
                document.getElementById('modal_media_id').value = id;
                document.getElementById('modal_titulo').value = titulo;
                document.getElementById('modal_descripcion').value = descripcion;
                document.getElementById('modalEditar').classList.add('modal--open');
            }

            function cerrarModal() {
                document.getElementById('modalEditar').classList.remove('modal--open');
            }

            // Cerrar al hacer clic fuera del recuadro
            document.getElementById('modalEditar').addEventListener('click', function(e) {
                if(e.target === this) cerrarModal();
            });
        </script>
    </body>
</html>
