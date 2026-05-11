<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/pages.css">
<?php
    include '../partials/head.php';
    include '../partials/header.php'; 

    require_once dirname(__DIR__, 2) . '/app/config/database.php';
    // Obtenemos las noticias publicadas
    $stmt = $pdo->query('SELECT * FROM noticias WHERE publicada = 1 ORDER BY fecha DESC');
    $noticias = $stmt->fetchAll();
?>

<main>
    <section class="category-hero">
        <div class="container">
            <h1 class="category-title">Noticias</h1>
            <p class="category-desc">
                Últimas novedades sobre proyectos, equipos y normativa de vuelo.
                Todo lo que pasa en el mundo de los drones.
            </p>
        </div>
    </section>

    <section class="section-news">
        <div class="container">
            <?php if(empty($noticias)): ?>
                <p class="news-empty-message">No hay noticias publicadas todavía.</p>
            <?php else: ?>
                <div class="news-grid">
                    <?php foreach($noticias as $n): ?>
                        <article class="news-card" id="news-<?php echo $n['noticia_id']; ?>">
                            <div class="news-img-wrapper">
                                <?php if($n['imagen']): ?>
                                    <img src="<?php echo htmlspecialchars($n['imagen']); ?>" alt="<?php echo htmlspecialchars($n['titulo']); ?>" class="news-img">
                                <?php else: ?>
                                    <div class="photo-placeholder">
                                        <span><?php echo htmlspecialchars($n['titulo']); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>
                            
                            <div class="news-meta">
                                <p class="news-date"><?php echo date('d M, Y', strtotime($n['fecha'])); ?></p>
                                <h3 class="news-title"><?php echo htmlspecialchars($n['titulo']); ?></h3>
                                <p class="news-excerpt"><?php echo htmlspecialchars($n['resumen'] ?? ''); ?></p>
                                
                                <div class="full-content-hidden" style="display:none;">
                                    <?php echo nl2br(htmlspecialchars($n['contenido'])); ?>
                                </div>

                                <button class="btn btn--outline" onclick="abrirModalNoticia(<?php echo $n['noticia_id']; ?>)">
                                    Leer más
                                </button>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<div id="modalNoticia" class="news-modal-overlay">
    <div class="news-modal-box">
        <button class="news-modal-close" onclick="cerrarModalNoticia()">&times;</button>
        
        <div class="news-modal-body">
            <div id="modal-img-container" class="modal-img-holder"></div>
            
            <div class="news-modal-content">
                <p id="modal-date" class="modal-date-text"></p>
                <h2 id="modal-title" class="modal-title-text"></h2>
                <div class="modal-divider"></div>
                <div id="modal-text" class="modal-article-body"></div>
            </div>
        </div>
    </div>
</div>

<?php include '../partials/footer.php'; ?>

<script>
    function abrirModalNoticia(id) {
        const card = document.getElementById('news-' + id);
        if (!card) return;
        // Obtener datos de la card (usamos trim para limpiar espacios accidentales)
        const titulo = card.querySelector('.news-title').innerText.trim();
        const fecha = card.querySelector('.news-date').innerText.trim();
        const contenido = card.querySelector('.full-content-hidden').innerHTML.trim();
        const imgElement = card.querySelector('.news-img');
        // Rellenar modal
        document.getElementById('modal-title').innerText = titulo;
        document.getElementById('modal-date').innerText = fecha;
        document.getElementById('modal-text').innerHTML = contenido;

        const imgContainer = document.getElementById('modal-img-container');
        if(imgElement) {
            imgContainer.innerHTML = `<img src="${imgElement.src}" alt="${titulo}" class="modal-featured-img">`;
        } else {
            imgContainer.innerHTML = '';
        }
        // Mostrar modal
        document.getElementById('modalNoticia').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function cerrarModalNoticia() {
        document.getElementById('modalNoticia').classList.remove('active');
        document.body.style.overflow = 'auto';
    }
    // Cerrar al hacer clic fuera o con Escape
    window.addEventListener('click', (e) => {
        const modal = document.getElementById('modalNoticia');
        if (e.target === modal) cerrarModalNoticia();
    });

    document.addEventListener('keydown', (e) => {
        if (e.key === "Escape") cerrarModalNoticia();
    });
</script>