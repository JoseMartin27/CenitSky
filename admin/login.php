<?php
session_start();
if (isset($_SESSION['admin_logged'])) {
    header('Location: /MIS_PROYECTOS/CenitSky/admin/index.php');
    exit;
}
?>

<?php include '../public/partials/head.php'; ?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/admin/assets/css/admin.css">

<div class="login-wrap">

    <!-- Fondo con imagen y degradado -->
    <div class="login-bg">
        <img src="/MIS_PROYECTOS/CenitSky/public/assets/images/hero.jpg" alt="Fondo">
    </div>

    <a href="/MIS_PROYECTOS/CenitSky/public/index.php" class="login-back">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m15 18-6-6 6-6" />
        </svg>
        Volver al inicio
    </a>

    <!-- Caja de login -->
    <div class="login-box">
        <!-- Logo -->
        <div class="login-logo">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
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
            <span class="login-logo-text">Cenit-<span>Sky</span></span>
        </div>

        <h1 class="login-title">Panel de administración</h1>
        <p class="login-subtitle">Accede con tus credenciales</p>

        <!-- Formulario -->
        <form class="login-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/login_controller.php" method="POST">
            <div class="login-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" placeholder="admin@cenitsky.com" required autofocus />
            </div>
            <div class="login-group">
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Password" required />
            </div>
            <?php if (isset($_GET['error'])): ?>
                <p class="login-error">
                    <?php if ($_GET['error'] === 'credenciales'): ?>
                        Email o contraseña incorrectos
                    <?php elseif ($_GET['error'] === 'campos'): ?>
                        Rellena todos los campos
                    <?php endif; ?>
                </p>
            <?php endif; ?>
            <button type="submit" class="btn-login">Entrar al panel</button>
        </form>

        <p class="login-footer">© 2026 Cenit-Sky</p>

    </div>
</div>

</body>

</html>