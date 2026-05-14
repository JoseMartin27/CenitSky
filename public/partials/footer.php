<footer class="site-footer">
    <div class="container footer-inner">
        <p><?php echo htmlspecialchars($config['texto_footer'] ?? '© 2026 Cenit-Sky — Todos los derechos reservados'); ?></p>
        <div class="footer-links">
            <?php if(!empty($config['instagram'])): ?>
                <a href="<?php echo htmlspecialchars($config['instagram']); ?>" target="_blank">
                    Instagram
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect width="20" height="20" x="2" y="2" rx="5" ry="5"/>
                        <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/>
                        <line x1="17.5" x2="17.51" y1="6.5" y2="6.5"/>
                    </svg>
                </a>
            <?php endif; ?>
            <?php if(!empty($config['youtube'])): ?>
                <a href="<?php echo htmlspecialchars($config['youtube']); ?>" target="_blank">
                    YouTube
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M2.5 17a24.12 24.12 0 0 1 0-10 2 2 0 0 1 1.4-1.4 49.56 49.56 0 0 1 16.2 0A2 2 0 0 1 21.5 7a24.12 24.12 0 0 1 0 10 2 2 0 0 1-1.4 1.4 49.55 49.55 0 0 1-16.2 0A2 2 0 0 1 2.5 17"/>
                        <path d="m10 15 5-3-5-3z"/>
                    </svg>
                </a>
            <?php endif; ?>
            <a href="/MIS_PROYECTOS/CenitSky/public/index.php#contacto">Privacidad</a>
            <a href="/MIS_PROYECTOS/CenitSky/public/pages/acerca.php">Aviso legal</a>
        </div>
    </div>
</footer>
</body>
</html>
