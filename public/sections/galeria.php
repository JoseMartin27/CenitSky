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

<!-- Imagen ampliada -->

<div id="imageModal" class="image-modal">

    <span class="close-modal">&times;</span>

    <img id="modalImage" class="modal-content">

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
.close-modal{
    position:absolute;
    top:20px;
    right:30px;
    font-size:40px;
    color:white;
    cursor:pointer;
    z-index:10000;
}
</style>

<!-- Lógica de apertura,cierre y movimiento -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const modal = document.getElementById("imageModal");
        const modalImg = document.getElementById("modalImage");
        const closeBtn = document.querySelector(".close-modal");
        const images = document.querySelectorAll(".photo-item");

        let currentIndex = 0;

        // Abrir
        images.forEach((img, index) => {

            img.addEventListener("click", function () {
                currentIndex = index;
                openModal(img.src);
            });
        });

        function openModal(src){
            modal.style.display = "flex";
            modalImg.src = src;
        }

        // Cerrar
        function closeModal(){
            modal.style.display = "none";
            modalImg.src = "";
        }

        closeBtn.addEventListener("click", closeModal);
        modal.addEventListener("click", function(e){

            if(e.target === modal){
                closeModal();
            }
        });

        // Captura de teclado para pasar de fotos
        document.addEventListener("keydown", function(e){

            if(modal.style.display !== "flex") return;
            // Derecha
            if(e.key === "ArrowRight"){
                currentIndex++;
                if(currentIndex >= images.length){
                    currentIndex = 0;
                }
                modalImg.src = images[currentIndex].src;
            }
            // Izquierda
            if(e.key === "ArrowLeft"){
                currentIndex--;
                if(currentIndex < 0){
                    currentIndex = images.length - 1;
                }
                modalImg.src = images[currentIndex].src;
            }
            // Escape
            if(e.key === "Escape"){
                closeModal();
            }
        });
    });
</script>