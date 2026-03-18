
<?php include '../partials/head.php'; ?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/pages.css">
<?php include '../partials/header.php'; ?>

<main>
    <!-- Hero de categoría -->
    <section class="category-hero">
        <div class="container">
            <h1 class="category-title">Paisajes</h1>
            <p class="category-desc">
                Sobrevuela montañas, valles y costas desde una perspectiva única.
                Capturamos la naturaleza en su estado más puro desde el aire.
            </p>
        </div>
    </section>

    <!-- Vídeos de paisajes -->
    <section class="section-videos">
        <div class="container">
            <h2 class="section-label">Vídeos</h2>
            <div class="video-grid">

                <div class="video-card video-card--short">
                    <div class="video-thumb">
                        <video src="/public/assets/video/paisajes_short1.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Sh<span class="dot">●</span>t 1</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Amanecer en la sierra</p>
                        <p class="video-stats">0:45 · Paisajes</p>
                    </div>
                </div>

                <div class="video-card video-card--main">
                    <div class="video-thumb">
                        <video src="/public/assets/video/paisajes_main.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Vídeo <span class="dot">●</span>incipal</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Vuelo sobre el valle</p>
                        <p class="video-stats">3:40 · Paisajes</p>
                    </div>
                </div>

                <div class="video-card video-card--short">
                    <div class="video-thumb">
                        <video src="/public/assets/video/paisajes_short2.mp4" autoplay loop muted playsinline></video>
                        <span class="video-label">Sh<span class="dot">●</span>t 2</span>
                    </div>
                    <div class="video-meta">
                        <p class="video-title">Costa al atardecer</p>
                        <p class="video-stats">1:00 · Paisajes</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Fotos de paisajes -->
    <section class="section-gallery">
        <div class="container">
            <h2 class="section-label">Fotos</h2>
            <div class="photo-grid">

                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 1</span></div>
                </div>
                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 2</span></div>
                </div>
                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 3</span></div>
                </div>
                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 4</span></div>
                </div>
                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 5</span></div>
                </div>
                <div class="photo-card">
                    <div class="photo-placeholder"><span>Paisaje 6</span></div>
                </div>

            </div>
        </div>
    </section>

</main>

<?php include '../partials/footer.php'; ?>