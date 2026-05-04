
<?php
require_once dirname(__DIR__, 2) . '/app/config/database.php';
$stmt = $pdo->query('SELECT * FROM media WHERE destacada = 1 AND tipo = "foto" ORDER BY orden ASC LIMIT 6');
$fotos = $stmt->fetchAll();
?>

<section class="section-gallery" id="galeria">
    <div class="container">
        <h2 class="section-label">Reels <span>&</span> Imágenes</h2>
        <div class="photo-grid">
            <?php if(empty($fotos)): ?>
                <p style="color: var(--gray-mid); grid-column: 1/-1; text-align:center; padding: 40px 0;">No hay imágenes destacadas todavía.</p>
            <?php else: ?>
                <?php foreach($fotos as $foto): ?>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <img src="<?php echo htmlspecialchars($foto['archivo']); ?>" 
                                 alt="<?php echo htmlspecialchars($foto['titulo'] ?? ''); ?>"
                                 style="width:100%; height:100%; object-fit:cover; position:absolute; inset:0;">
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>