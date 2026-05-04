<?php include '../partials/head.php'; ?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/pages.css">
<?php include '../partials/header.php'; ?>

<?php
require_once dirname(__DIR__, 2) . '/app/config/database.php';
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
                <p style="color: var(--gray-mid); text-align:center; padding: 60px 0;">No hay noticias publicadas todavía.</p>
            <?php else: ?>
                <div class="news-grid">
                    <?php foreach($noticias as $n): ?>
                        <article class="news-card">
                            <?php if($n['imagen']): ?>
                                <img src="<?php echo htmlspecialchars($n['imagen']); ?>" alt="<?php echo htmlspecialchars($n['titulo']); ?>" style="width:100%; aspect-ratio:16/9; object-fit:cover;">
                            <?php else: ?>
                                <div class="photo-placeholder" style="aspect-ratio:16/9;"><span><?php echo htmlspecialchars($n['titulo']); ?></span></div>
                            <?php endif; ?>
                            <div class="news-meta">
                                <p class="news-date"><?php echo date('F Y', strtotime($n['fecha'])); ?></p>
                                <h3 class="news-title"><?php echo htmlspecialchars($n['titulo']); ?></h3>
                                <p class="news-excerpt"><?php echo htmlspecialchars($n['resumen'] ?? ''); ?></p>
                                <a href="#" class="btn btn--outline">Leer más</a>
                            </div>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include '../partials/footer.php'; ?>