<?php
require_once dirname(__DIR__, 2) . '/app/config/database.php';
$stmt = $pdo->query('SELECT * FROM media WHERE destacada = 1 AND tipo = "video" ORDER BY orden ASC LIMIT 3');
$videos = $stmt->fetchAll();
?>

<section class="section-videos" id="videos">
    <div class="container">
        <h2 class="section-label light">Vídeo <span>&</span> Shorts</h2>

        <?php if (empty($videos)): ?>
            <p style="color: var(--gray-mid); text-align:center; padding: 40px 0;">
                No hay vídeos destacados todavía.
            </p>
        <?php else: ?>

            <div class="video-grid">
                <?php foreach ($videos as $i => $v): ?>
                    <div class="video-card <?php echo $i === 1 ? 'video-card--main' : 'video-card--short'; ?>">

                        <div class="video-thumb">
                            <video class="video-item"
                                   src="<?php echo htmlspecialchars($v['archivo']); ?>"
                                   loop></video>

                            <button class="play-btn">▶</button>

                            <span class="video-label">
                                <?php echo htmlspecialchars($v['titulo'] ?? ''); ?>
                            </span>
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

<!-- ================= MODAL ================= -->
<div id="videoModal" class="video-modal">
    <div class="video-modal-content">
        <span class="close-modal">&times;</span>
        <video id="modalVideo" controls autoplay></video>
    </div>
</div>

<!-- ================= CSS ================= -->
<style>
.video-thumb{
    position:relative;
}

.play-btn{
    position:absolute;
    top:50%;
    left:50%;
    transform:translate(-50%,-50%);
    background:rgba(0,0,0,0.6);
    color:white;
    border:none;
    border-radius:50%;
    width:50px;
    height:50px;
    font-size:20px;
    cursor:pointer;
    z-index:2;
}

/* ===== MODAL ===== */
.video-modal{
    display:none;
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background:rgba(0,0,0,0.85);
    justify-content:center;
    align-items:center;
    z-index:9999;
}

.video-modal-content{
    position:relative;
    width:80%;
    max-width:900px;
}

.video-modal-content video{
    width:100%;
    border-radius:12px;
}

.close-modal{
    position:absolute;
    top:-40px;
    right:0;
    font-size:30px;
    color:white;
    cursor:pointer;
}
</style>

<!-- ================= JS ================= -->
<script>
// ================= PLAY BUTTONS =================
document.querySelectorAll(".video-thumb").forEach(container => {
    const video = container.querySelector("video");
    const btn = container.querySelector(".play-btn");

    const openModal = () => {
        const modal = document.getElementById("videoModal");
        const modalVideo = document.getElementById("modalVideo");

        modal.style.display = "flex";
        modalVideo.src = video.src;
        modalVideo.play();
    };

    btn.addEventListener("click", openModal);
    video.addEventListener("click", openModal);
});

// ================= MODAL CONTROL =================
const modal = document.getElementById("videoModal");
const modalVideo = document.getElementById("modalVideo");
const closeBtn = document.querySelector(".close-modal");

closeBtn.addEventListener("click", () => {
    modal.style.display = "none";
    modalVideo.pause();
    modalVideo.src = "";
});

modal.addEventListener("click", (e) => {
    if (e.target === modal) {
        modal.style.display = "none";
        modalVideo.pause();
        modalVideo.src = "";
    }
});
</script>