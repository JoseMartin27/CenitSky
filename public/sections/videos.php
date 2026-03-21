
<section class="section-videos" id="videos">
    <div class="container">
        <h2 class="section-label light">Vídeo <span>&</span> Shorts</h2>
        <div class="video-grid">
            <div class="video-card video-card--short">
                <div class="video-thumb">
                    <video src="/public/assets/video/short1.mp4" autoplay loop muted playsinline></video>
                    <span class="video-label">Sh<span class="dot">●</span>t 1</span>
                </div>
                <div class="video-meta">
                    <p class="video-title">Short destacado</p>
                    <p class="video-stats">0:40 · 12k vistas</p>
                </div>
            </div>
            <div class="video-card video-card--main">
                <div class="video-thumb">
                    <video src="/public/assets/video/short2.mp4" autoplay loop muted playsinline></video>
                    <span class="video-label">Vídeo <span class="dot">●</span>incipal</span>
                </div>
                <div class="video-meta">
                    <p class="video-title">Vídeo principal</p>
                    <p class="video-stats">3:20 · 46k vistas</p>
                </div>
            </div>
            <div class="video-card video-card--short">
                <div class="video-thumb">
                    <video src="/public/assets/video/short3.mp4" autoplay loop muted playsinline></video>
                    <span class="video-label">Sh<span class="dot">●</span>t 2</span>
                </div>
                <div class="video-meta">
                    <p class="video-title">Behind the scenes</p>
                    <p class="video-stats">1:15 · 8k vistas</p>
                </div>
            </div>
        </div>
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