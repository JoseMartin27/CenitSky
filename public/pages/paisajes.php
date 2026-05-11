<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/pages.css">
<?php 
    include '../partials/head.php'; 
    include '../partials/header.php';
    $stmt = $pdo->prepare('
            SELECT m.* FROM media m
            JOIN categorias c ON m.categoria_id = c.categoria_id
            WHERE c.slug = ? AND m.tipo = "video"
            ORDER BY m.orden ASC, m.fecha DESC
            LIMIT 3
    ');
    $stmt->execute(['paisajes']);
    $videos = $stmt->fetchAll();

    $stmt = $pdo->prepare('
            SELECT m.* FROM media m
            JOIN categorias c ON m.categoria_id = c.categoria_id
            WHERE c.slug = ? AND m.tipo = "foto"
            ORDER BY m.orden ASC, m.fecha DESC
            LIMIT 6
    ');
    $stmt->execute(['paisajes']);
    $fotos = $stmt->fetchAll();
?>

<main>
    <section class="category-hero">
        <div class="container">
            <h1 class="category-title">Paisajes</h1>
            <p class="category-desc">
                Sobrevuela montañas, valles y costas desde una perspectiva única.
                Capturamos la naturaleza en su estado más puro desde el aire.
            </p>
        </div>
    </section>

    <section class="section-videos">
        <div class="container">
            <h2 class="section-label">Vídeos</h2>
            <?php if(empty($videos)): ?>
                <p style="color: var(--gray-mid); text-align:center; padding: 40px 0;">No hay vídeos todavía.</p>
            <?php else: ?>
                <div class="video-grid">
                    <?php foreach($videos as $i => $v): ?>
                        <div class="video-card <?php echo $i === 1 ? 'video-card--main' : 'video-card--short'; ?>">
                            <div class="video-thumb">
                                <video src="<?php echo htmlspecialchars($v['archivo']); ?>" autoplay loop muted playsinline></video>
                                <span class="video-label"><?php echo htmlspecialchars($v['titulo'] ?? ''); ?></span>
                            </div>
                            <div class="video-meta">
                                <p class="video-title"><?php echo htmlspecialchars($v['titulo'] ?? ''); ?></p>
                                <p class="video-stats"><?php echo htmlspecialchars($v['descripcion'] ?? ''); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <section class="section-gallery">
        <div class="container">
            <h2 class="section-label">Fotos</h2>
            <?php if(empty($fotos)): ?>
                <p style="color: var(--gray-mid); text-align:center; padding: 40px 0;">No hay fotos todavía.</p>
            <?php else: ?>
                <div class="photo-grid">
                    <?php foreach($fotos as $foto): ?>
                        <div class="photo-card">
                            <div class="photo-placeholder">
                                <img src="<?php echo htmlspecialchars($foto['archivo']); ?>"
                                     alt="<?php echo htmlspecialchars($foto['titulo'] ?? ''); ?>"
                                     style="width:100%; height:100%; object-fit:cover; position:absolute; inset:0;">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>
</main>

<?php include '../partials/footer.php'; ?>