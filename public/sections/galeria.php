<?php
require_once dirname(__DIR__, 2) . '/app/config/database.php';
$stmt = $pdo->query('SELECT * FROM media WHERE destacada = 1 AND tipo = "foto" ORDER BY orden ASC LIMIT 6');
$fotos = $stmt->fetchAll();
?>

<section class="section-gallery" id="galeria">
    <div class="container">
        <h2 class="section-label">
            Reels <span>&</span> Imágenes
        </h2>
        <div class="photo-grid">
            <?php if(empty($fotos)): ?>
                <p style="color: var(--gray-mid); grid-column:1/-1; text-align:center; padding:40px 0;">
                    No hay imágenes destacadas todavía.
                </p>
            <?php else: ?>
                <?php foreach($fotos as $foto): ?>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <img
                                class="photo-item"
                                src="<?php echo htmlspecialchars($foto['archivo']); ?>"
                                alt="<?php echo htmlspecialchars($foto['titulo'] ?? ''); ?>"
                            >
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>


<div id="imageModal" class="image-modal">
    <!-- Botón de cerrar con ID único -->
    <span class="close-modal" id="closeBtnModal">&times;</span>
    <span class="nav-btn prev" id="prevBtn">&#10094;</span>
    <img id="modalImage" class="modal-content">
    <span class="nav-btn next" id="nextBtn">&#10095;</span>
</div>

<!-- Imagenes y videos -->

<style>

.photo-card{
    cursor:pointer;
}
.photo-placeholder{
    position:relative;
    width:100%;
    padding-top:75%;
    overflow:hidden;
    border-radius:12px;
}
.photo-item{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    object-fit:cover;
}

/* Modal */
.image-modal{
    display:none;
    position:fixed;
    inset:0;
    background:rgba(0,0,0,0.92);
    justify-content:center;
    align-items:center;
    z-index:9999;
}
.modal-content{
    max-width:90%;
    max-height:90%;
    border-radius:12px;
}
.close-modal {
    position: absolute;
    top: 10px;
    right: 20px;
    font-size: 60px;
    font-weight: bold;
    color: white;
    cursor: pointer;
    z-index: 99999;
    padding: 20px; 
    line-height: 0.8;
    user-select: none;
    transition: transform 0.2s;
}
.close-modal:hover {
    color: #ff4d4d;
    transform: scale(1.2);
}
.nav-btn {
    z-index: 99998;
}
/* Botones de navegación */
.nav-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    color: white;
    font-size: 60px;
    font-weight: bold;
    cursor: pointer;
    padding: 16px;
    user-select: none;
    transition: 0.3s;
    z-index: 10001;
}

.nav-btn:hover {
    color: #bbb;
}

.prev {
    left: 20px;
}

.next {
    right: 20px;
}

@media (max-width: 768px) {
    .nav-btn {
        font-size: 40px;
        padding: 10px;
    }
}
</style>

<!-- Lógica de apertura,cierre y movimiento -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const modal = document.getElementById("imageModal");
    const modalImg = document.getElementById("modalImage");
    const closeBtn = document.getElementById("closeBtnModal"); 
    const images = document.querySelectorAll(".photo-item");
    const prevBtn = document.getElementById("prevBtn");
    const nextBtn = document.getElementById("nextBtn");

    let currentIndex = 0;

    function openModal(index) {
        currentIndex = index;
        modal.style.display = "flex";
        modalImg.src = images[currentIndex].src;
        document.body.style.overflow = "hidden";
    }

    function closeModal() {
        console.log("Cerrando modal..."); 
        modal.style.display = "none";
        modalImg.src = "";
        document.body.style.overflow = "auto";
    }

    // Evento de la X
    if (closeBtn) {
        closeBtn.onclick = function(e) {
            e.preventDefault();
            e.stopPropagation();
            closeModal();
        };
    }

    // Cerrar 
    modal.onclick = function(e) {
        if (e.target === modal) {
            closeModal();
        }
    };

    // Navegación y apertura 
    images.forEach((img, index) => {
        img.onclick = () => openModal(index);
    });

    prevBtn.onclick = (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex - 1 + images.length) % images.length;
        modalImg.src = images[currentIndex].src;
    };

    nextBtn.onclick = (e) => {
        e.stopPropagation();
        currentIndex = (currentIndex + 1) % images.length;
        modalImg.src = images[currentIndex].src;
    };

    // Tecla Escape
    document.onkeydown = function(e) {
        if (e.key === "Escape") closeModal();
    };
});
</script>