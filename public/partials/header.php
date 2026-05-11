<header>
    <div>
        <span class="logo">Cenit-<span>Sky</span></span>
        <a href="/MIS_PROYECTOS/CenitSky/admin/login.php" aria-label="Acceso panel">
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
        </a>
        <nav>
            <a href="/MIS_PROYECTOS/CenitSky/public/index.php">Inicio</a>
            <a href="/MIS_PROYECTOS/CenitSky/public/pages/servicios.php">Servicios</a>
            <a href="/MIS_PROYECTOS/CenitSky/public/pages/acerca.php">Acerca de</a>
            <a href="/MIS_PROYECTOS/CenitSky/public/pages/equipo.php">Equipo</a>
            <a href="/MIS_PROYECTOS/CenitSky/public/index.php#contacto">Contacto</a>
        </nav>
        <button class="menuPhone" aria-label="Menú">
            <span></span><span></span><span></span>
        </button>
    </div>
</header>

<script>
    const menuBtn = document.querySelector('.menuPhone');
    const nav = document.querySelector('nav');
    menuBtn.addEventListener('click', () => {
        nav.classList.toggle('nav--open');
    });
</script>