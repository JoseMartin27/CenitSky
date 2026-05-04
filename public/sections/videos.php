
<?php
require_once dirname(__DIR__, 2) . '/app/config/database.php';
$stmt = $pdo->query('SELECT * FROM media WHERE destacada = 1 AND tipo = "video" ORDER BY orden ASC LIMIT 3');
$videos = $stmt->fetchAll();
?>

<section class="section-videos" id="videos">
    <div class="container">
        <h2 class="section-label light">Vídeo <span>&</span> Shorts</h2>
        <?php if(empty($videos)): ?>
            <p style="color: var(--gray-mid); text-align:center; padding: 40px 0;">No hay vídeos destacados todavía.</p>
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

<script>
const grid = document.querySelector('.video-grid');
const cards = () => [...grid.querySelectorAll('.video-card')];

grid.querySelectorAll('.video-card--short').forEach(card => {
    card.addEventListener('mouseenter', () => {
        const all = cards();
        const idx = all.indexOf(card);

        grid.style.transition = 'all 0.5s ease';

        if (idx === 0) {
            // hover izquierda → la izquierda pasa al centro
            grid.insertBefore(all[1], all[0]);
        } else if (idx === 2) {
            // hover derecha → la derecha pasa al centro
            grid.insertBefore(all[2], all[1]);
        }

        // actualiza clases
        cards().forEach((c, i) => {
            c.classList.remove('video-card--short', 'video-card--main');
            c.classList.add(i === 1 ? 'video-card--main' : 'video-card--short');
        });
    });
});
</script>