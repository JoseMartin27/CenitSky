<?php
    session_start();
    if (!isset($_SESSION['admin_logged'])) {
        header('Location: /MIS_PROYECTOS/CenitSky/admin/login.php');
        exit;
    }

    require_once 'C:/xampp/htdocs/MIS_PROYECTOS/CenitSky/app/config/database.php';
    // Estadísticas
    $total_mensajes = $pdo->query('SELECT COUNT(*) FROM mensajes')->fetchColumn();
    $sin_leer       = $pdo->query('SELECT COUNT(*) FROM mensajes WHERE leido = 0')->fetchColumn();
    $total_media    = $pdo->query('SELECT COUNT(*) FROM media')->fetchColumn();
    $total_noticias = $pdo->query('SELECT COUNT(*) FROM noticias WHERE publicada = 1')->fetchColumn();
    // Últimos 5 mensajes
    $ultimos = $pdo->query('SELECT * FROM mensajes ORDER BY fecha DESC LIMIT 5')->fetchAll();

    include '../public/partials/head.php';
    //Se mueve este enlace al head para evitar recargas lentas del css <link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/admin/assets/css/admin.css">
?>
        <div class="admin-wrap">
            <!-- Menú lateral -->
            <aside class="admin-sidebar">
                <div class="sidebar-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10 10 7 7" />
                        <path d="m10 14-3 3" />
                        <path d="m14 10 3-3" />
                        <path d="m14 14 3 3" />
                        <path d="M14.205 4.139a4 4 0 1 1 5.439 5.863" />
                        <path d="M19.637 14a4 4 0 1 1-5.432 5.868" />
                        <path d="M4.367 10a4 4 0 1 1 5.438-5.862" />
                        <path d="M9.795 19.862a4 4 0 1 1-5.429-5.873" />
                        <rect x="10" y="8" width="4" height="8" rx="1" />
                    </svg>
                    <span>Cenit-<span>Sky</span></span>
                </div>

                <nav class="sidebar-nav">
                    <a href="/MIS_PROYECTOS/CenitSky/admin/index.php" class="sidebar-link active">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="7" height="9" x="3" y="3" rx="1" />
                            <rect width="7" height="5" x="14" y="3" rx="1" />
                            <rect width="7" height="9" x="14" y="12" rx="1" />
                            <rect width="7" height="5" x="3" y="16" rx="1" />
                        </svg>
                        Dashboard
                    </a>
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/mensajes.php" class="sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                        </svg>
                        Mensajes
                        <?php if ($sin_leer > 0): ?>
                            <span class="sidebar-badge"><?php echo $sin_leer; ?></span>
                        <?php endif; ?>
                    </a>
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/galeria.php" class="sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                            <circle cx="9" cy="9" r="2" />
                            <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                        </svg>
                        Galería
                    </a>
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/noticias.php" class="sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 18h-5" />
                            <path d="M18 14h-8" />
                            <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2" />
                            <rect width="8" height="4" x="10" y="6" rx="1" />
                        </svg>
                        Noticias
                    </a>
                    <a href="/MIS_PROYECTOS/CenitSky/admin/pages/configuracion.php" class="sidebar-link">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                        Configuración
                    </a>
                </nav>

                <a href="/MIS_PROYECTOS/CenitSky/public/index.php" class="sidebar-web">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                        <polyline points="9 22 9 12 15 12 15 22" />
                    </svg>
                    Ver web
                </a>
            </aside>

            <!-- Contenido principal -->
            <main class="admin-main">

                <!-- Cabecera -->
                <div class="admin-topbar">
                    <h1 class="admin-page-title">Dashboard</h1>
                    <div class="admin-topbar-right">
                        <span class="admin-user">Admin</span>
                        <a href="/MIS_PROYECTOS/CenitSky/app/controllers/logout_controller.php" class="btn-logout">Cerrar sesión</a>
                    </div>
                </div>

                <!-- Tarjetas de estadísticas -->
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-value"><?php echo $total_mensajes; ?></span>
                            <span class="stat-label">Mensajes totales</span>
                        </div>
                    </div>
                    <div class="stat-card stat-card--alert">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z" />
                                <circle cx="12" cy="10" r="1" fill="currentColor" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-value"><?php echo $sin_leer; ?></span>
                            <span class="stat-label">Sin leer</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="18" height="18" x="3" y="3" rx="2" ry="2" />
                                <circle cx="9" cy="9" r="2" />
                                <path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-value"><?php echo $total_media; ?></span>
                            <span class="stat-label">Archivos subidos</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M15 18h-5" />
                                <path d="M18 14h-8" />
                                <path d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2" />
                                <rect width="8" height="4" x="10" y="6" rx="1" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-value"><?php echo $total_noticias; ?></span>
                            <span class="stat-label">Noticias publicadas</span>
                        </div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 3v18h18" />
                                <path d="m19 9-5 5-4-4-3 3" />
                            </svg>
                        </div>
                        <div class="stat-info">
                            <span class="stat-value">12</span>
                            <span class="stat-label">Visitas hoy</span>
                        </div>
                    </div>
                </div>

                <!-- Últimos mensajes -->
                <div class="admin-section">
                    <div class="admin-section-header">
                        <h2 class="admin-section-title">Últimos mensajes</h2>
                        <a href="/MIS_PROYECTOS/CenitSky/admin/pages/mensajes.php" class="admin-section-link">Ver todos</a>
                    </div>
                    <div class="messages-table">
                        <div class="messages-head">
                            <span>Nombre</span>
                            <span>Email</span>
                            <span>Mensaje</span>
                            <span>Fecha</span>
                            <span>Estado</span>
                        </div>
                        <?php if (empty($ultimos)): ?>
                            <div class="messages-empty">
                                <p>No hay mensajes todavía</p>
                            </div>
                        <?php else: ?>
                            <?php foreach ($ultimos as $m): ?>
                                <div class="messages-row <?php echo $m['leido'] == 0 ? 'messages-row--unread' : ''; ?>">
                                    <span><?php echo htmlspecialchars($m['nombre']); ?></span>
                                    <span><?php echo htmlspecialchars($m['email']); ?></span>
                                    <span><?php echo htmlspecialchars(substr($m['mensaje'], 0, 80)) . '...'; ?></span>
                                    <span><?php echo date('d/m/Y H:i', strtotime($m['fecha'])); ?></span>
                                    <span><?php echo $m['leido'] == 0 ? '<span class="sidebar-badge">Sin leer</span>' : 'Leído'; ?></span>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </main>
        </div>
    </body>
</html>