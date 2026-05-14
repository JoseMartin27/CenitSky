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
    $stmt->execute(['aventura']);
    $videos = $stmt->fetchAll();

    $stmt = $pdo->prepare('
        SELECT m.* FROM media m
        JOIN categorias c ON m.categoria_id = c.categoria_id
        WHERE c.slug = ? AND m.tipo = "foto"
        ORDER BY m.orden ASC, m.fecha DESC
        LIMIT 6
    ');
    $stmt->execute(['aventura']);
    $fotos = $stmt->fetchAll();
?>

<main>
    <section class="category-hero">
        <div class="container">
            <h1 class="category-title">Aventura</h1>
            <p class="category-desc">
                Adrenalina desde el aire. Grabamos competiciones, rutas extremas
                y deportes de aventura desde ángulos imposibles.
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

<!-- Modal Polivalente (Fotos y Vídeos) -->
<div id="mediaModal" class="image-modal">
    <span class="close-modal" id="closeBtnModal">&times;</span>
    <!-- Flechas (Solo se mostrarán si hay más de un elemento del mismo tipo) -->
    <span class="nav-btn prev" id="prevBtn">&#10094;</span>
    <div class="modal-container">
        <img id="modalImage" class="modal-content" style="display:none;">
        <video id="modalVideo" class="modal-content" controls style="display:none; background:#000;"></video>
    </div>
    <span class="nav-btn next" id="nextBtn">&#10095;</span>
</div>

<style>
.image-modal {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.95);
    justify-content: center;
    align-items: center;
    z-index: 99999;
}
.modal-content {
    max-width: 90%;
    max-height: 85%;
    border-radius: 8px;
    box-shadow: 0 0 20px rgba(0,0,0,0.5);
}
.close-modal {
    position: absolute;
    top: 20px;
    right: 30px;
    font-size: 60px;
    color: white;
    cursor: pointer;
    z-index: 100000;
    padding: 10px 20px;
    line-height: 1;
}
.close-modal:hover { color: #ff4d4d; }

.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    font-size: 50px;
    cursor: pointer;
    padding: 20px;
    background: rgba(0,0,0,0.2);
    border-radius: 5px;
    user-select: none;
    z-index: 100000;
}
.nav-btn:hover { background: rgba(255,255,255,0.1); }
.prev { left: 10px; }
.next { right: 10px; }

.photo-card { cursor: pointer; }

.modal-container {
    max-width: 90%;
    max-height: 85%;
    display: flex;
    justify-content: center;
    align-items: center;
}

#modalVideo {
    outline: none;
    max-width: 100%;
    max-height: 85vh;
    border-radius: 8px;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("mediaModal");
    const modalImg = document.getElementById("modalImage");
    const modalVideo = document.getElementById("modalVideo");
    const closeBtn = document.getElementById("closeBtnModal");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    // Seleccionamos tanto imágenes como vídeos
    const photoItems = document.querySelectorAll(".photo-grid img");
    const videoItems = document.querySelectorAll(".video-thumb video");

    let currentItems = [];
    let currentIndex = 0;
    let currentType = 'foto';

    // Función para abrir el modal
    function openMedia(items, index, type) {
        currentItems = items;
        currentIndex = index;
        currentType = type;

        modal.style.display = "flex";
        document.body.style.overflow = "hidden";
        updateContent();
    }

    // Función para actualizar el contenido
    function updateContent() {
        modalImg.style.display = "none";
        modalVideo.style.display = "none";
        modalVideo.pause(); 
        modalVideo.src = "";

        const source = currentItems[currentIndex].src;

        if (currentType === 'video') {
            modalVideo.style.display = "block";
            modalVideo.src = source;
            modalVideo.play();
        } else {
            modalImg.style.display = "block";
            modalImg.src = source;
        }
    }

    function closeModal() {
        modal.style.display = "none";
        modalVideo.pause();
        modalVideo.src = "";
        modalImg.src = "";
        document.body.style.overflow = "auto";
    }

    // VÍDEOS
    videoItems.forEach((vid, index) => {
        vid.parentElement.style.cursor = "pointer";
        vid.parentElement.addEventListener("click", (e) => {
            e.preventDefault();
            openMedia(videoItems, index, 'video');
        });
    });

    // FOTOS 
    photoItems.forEach((img, index) => {
        img.addEventListener("click", () => {
            openMedia(photoItems, index, 'foto');
        });
    });

    // NAVEGACIÓN 
    function next() {
        currentIndex = (currentIndex + 1) % currentItems.length;
        updateContent();
    }

    function prev() {
        currentIndex = (currentIndex - 1 + currentItems.length) % currentItems.length;
        updateContent();
    }

    nextBtn.onclick = (e) => { e.stopPropagation(); next(); };
    prevBtn.onclick = (e) => { e.stopPropagation(); prev(); };
    closeBtn.onclick = (e) => { e.stopPropagation(); closeModal(); };

    // Cerrar al pinchar fuera
    modal.onclick = (e) => {
        if (e.target === modal || e.target.classList.contains('modal-container')) {
            closeModal();
        }
    };

    // Teclado
    document.addEventListener("keydown", (e) => {
        if (modal.style.display !== "flex") return;
        if (e.key === "ArrowRight") next();
        if (e.key === "ArrowLeft") prev();
        if (e.key === "Escape") closeModal();
    });
});
</script>