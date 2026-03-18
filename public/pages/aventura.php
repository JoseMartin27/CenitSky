
<?php include '../partials/head.php'; ?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/pages.css">
<?php include '../partials/header.php'; ?>

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
            <div class="video-grid">

                <div class="video-card video-card--short">
                    <div class="video-thumb">
                        <video src="/public/assets/video/aventura_short1.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Sh<span class="dot">●</span>t 1</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Descenso en MTB</p>
                        <p class="video-stats">0:50 · Aventura</p>
                    </div>
                </div>

                <div class="video-card video-card--main">
                    <div class="video-thumb">
                        <video src="/public/assets/video/aventura_main.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Vídeo <span class="dot">●</span>incipal</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Ruta de trail running</p>
                        <p class="video-stats">4:10 · Aventura</p>
                    </div>
                </div>

                <div class="video-card video-card--short">
                    <div class="video-thumb">
                        <video src="/public/assets/video/aventura_short2.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Sh<span class="dot">●</span>t 2</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Kayak en el río</p>
                        <p class="video-stats">1:10 · Aventura</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="section-gallery">
        <div class="container">
            <h2 class="section-label">Fotos</h2>
            <div class="photo-grid">
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 1</span></div></div>
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 2</span></div></div>
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 3</span></div></div>
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 4</span></div></div>
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 5</span></div></div>
                <div class="photo-card"><div class="photo-placeholder"><span>Aventura 6</span></div></div>
            </div>
        </div>
    </section>

</main>

<?php include '../partials/footer.php'; ?>