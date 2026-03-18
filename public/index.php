<!-- Punto de entrada con los includes -->

<?php include 'partials/head.php';?>
<link rel="stylesheet" href="/MIS_PROYECTOS/CenitSky/public/assets/css/home.css">
<?php include 'partials/header.php';?>

<main>
    <?php include 'sections/hero.php';?>
    <?php include 'sections/videos.php';?>
    <?php include 'sections/galeria.php';?>
    <?php include 'sections/contacto.php';?>
</main>

<?php include 'partials/footer.php';?>

<!-- 
<!DOCTYPE html>
<html lan="es">

<head>
    <meta charset="utf-8">
    <title>Cenit-Sky</title>
    <meta name="author" content="JoseMartin">
    <meta name="description" content="Web dinamica de servicios de video con drones">
    <meta name="keywords" content="video,dron,aire,cielo,eventos,record,air,vista">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/style.css">
</head>

<body>
    <header>
        <div>
            <a href="index.html" class="logo">Cenit<span>Sky</span></a>
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M10 10 7 7" />
                <path d="m10 14-3 3" />
                <path d="m14 10 3-3" />
                <path d="m14 14 3 3" />
                <path d="M14.205 4.139a4 4 0 1 1 5.439 5.863" />
                <path d="M19.637 14a4 4 0 1 1-5.432 5.868" />
                <path d="M4.367 10a4 4 0 1 1 5.438-5.862" />
                <path d="M9.795 19.862a4 4 0 1 1-5.429-5.873" />
                <rect x="10" y="8" width="4" height="8" rx="1" />
            </svg>
            <nav>
                <a href="#">Paisajes</a>
                <a href="#">Aventura</a>
                <a href="#">Estructuras</a>
                <a href="#">Servicios</a>
                <a href="#">Contacto</a>
            </nav>
            <button class="menuPhone" aria-label="Menú">
                <span></span><span></span><span></span>
            </button>
        </div>
    </header>
    <main> -->
        <!-- 1. Sección contenedora del hero -->
      <!--  <section class="hero"> -->
            <!-- 2. Fondo: aquí irá tu imagen aérea -->
        <!--    <div class="hero-back">
                <img src="assets/img/hero_img.jpeg" alt="Fondo hero">
            </div> -->
            <!-- 3. Contenido centrado encima del fondo -->
       <!--     <div class="container hero-content"> -->
                <!-- 4. Título principal -->
        <!--        <h1 class="hero-title">
                    Eleva tu contenido<br>al <em>siguiente nivel</em>
                </h1> -->
                <!-- 5. Texto descriptivo -->
          <!--      <p class="hero-subtitle">
                    Transformamos ideas en imágenes que vuelan alto, capturando cada
                    detalle desde ángulos que inspiran y sorprenden.
                </p> -->
                <!-- 6. Botones -->
          <!--      <div class="hero-actions">
                    <a href="#galeria" class="btn btn--outline">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <circle cx="8.5" cy="8.5" r="1.5" />
                            <polyline points="21 15 16 10 5 21" />
                        </svg>
                        Ver imágenes
                    </a>
                    <a href="#videos" class="btn btn--outline">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="1.8">
                            <polygon points="5 3 19 12 5 21 5 3" />
                        </svg>
                        Ver vídeos
                    </a>
                </div>
            </div> -->
            <!-- 7. Barra de categorías -->
         <!--   <div class="services-bar">
                <div class="container">
                    <div class="services-grid">

                        <a href="paisajes.html" class="service-card">
                            <span class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-trees-icon lucide-trees">
                                    <path d="M10 10v.2A3 3 0 0 1 8.9 16H5a3 3 0 0 1-1-5.8V10a3 3 0 0 1 6 0Z" />
                                    <path d="M7 16v6" />
                                    <path d="M13 19v3" />
                                    <path
                                        d="M12 19h8.3a1 1 0 0 0 .7-1.7L18 14h.3a1 1 0 0 0 .7-1.7L16 9h.2a1 1 0 0 0 .8-1.7L13 3l-1.4 1.5" />
                                </svg>
                            </span>
                            <span class="service-label">Paisajes</span>
                        </a>

                        <a href="estructuras.html" class="service-card">
                            <span class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-castle-icon lucide-castle">
                                    <path d="M10 5V3" />
                                    <path d="M14 5V3" />
                                    <path d="M15 21v-3a3 3 0 0 0-6 0v3" />
                                    <path d="M18 3v8" />
                                    <path d="M18 5H6" />
                                    <path d="M22 11H2" />
                                    <path d="M22 9v10a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V9" />
                                    <path d="M6 3v8" />
                                </svg>
                            </span>
                            <span class="service-label">Estructuras</span>
                        </a>

                        <a href="aventura.html" class="service-card">
                            <span class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-motorbike-icon lucide-motorbike">
                                    <path d="m18 14-1-3" />
                                    <path d="m3 9 6 2a2 2 0 0 1 2-2h2a2 2 0 0 1 1.99 1.81" />
                                    <path d="M8 17h3a1 1 0 0 0 1-1 6 6 0 0 1 6-6 1 1 0 0 0 1-1v-.75A5 5 0 0 0 17 5" />
                                    <circle cx="19" cy="17" r="3" />
                                    <circle cx="5" cy="17" r="3" />
                                </svg>
                            </span>
                            <span class="service-label">Aventura</span>
                        </a>

                        <a href="noticias.html" class="service-card">
                            <span class="service-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="lucide lucide-newspaper-icon lucide-newspaper">
                                    <path d="M15 18h-5" />
                                    <path d="M18 14h-8" />
                                    <path
                                        d="M4 22h16a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v16a2 2 0 0 1-4 0v-9a2 2 0 0 1 2-2h2" />
                                    <rect width="8" height="4" x="10" y="6" rx="1" />
                                </svg>
                            </span>
                            <span class="service-label">Noticias</span>
                        </a>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- ══════════════════════════ VÍDEO & SHORTS ══════════════════════════ -->
      <!--  <section class="section-videos" id="videos">
            <div class="container">
                <h2 class="section-label light">Vídeo <span>&</span> Shorts</h2>
                <div class="video-grid"> -->
                    <!-- Short 1 --> 
               <!--     <div class="video-card video-card--short">
                        <div class="video-thumb"> -->

                            <!-- El vídeo -->
                    <!--        <video src="assets/video/short1.mp4" autoplay loop muted playsinline></video> -->

                            <!-- El botón de play encima -->
                            <!-- <button class="play-btn" aria-label="Reproducir">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3" />
                                </svg>
                            </button> -->

                 <!--           <span class="video-label">Sh<span class="dot">●</span>t 1</span>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">Short destacado</p>
                            <p class="video-stats">0:40 · 12k vistas</p>
                        </div>
                    </div> -->

                    <!-- Vídeo principal -->
              <!--      <div class="video-card video-card--main">
                        <div class="video-thumb">
                            <video src="assets/video/short2.mp4" autoplay loop muted playsinline></video> -->
                            <!-- <button class="play-btn" aria-label="Reproducir">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3" />
                                </svg>
                            </button> -->
                   <!--         <span class="video-label">Vídeo <span class="dot">●</span>incipal</span>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">Vídeo principal</p>
                            <p class="video-stats">3:20 · 46k vistas</p>
                        </div>
                    </div> -->

                    <!-- Short 2 -->
               <!--     <div class="video-card video-card--short">
                        <div class="video-thumb">
                            <video src="assets/video/short3.mp4" autoplay loop muted playsinline></video> -->
                            <!-- <button class="play-btn" aria-label="Reproducir">
                                <svg viewBox="0 0 24 24" fill="currentColor">
                                    <polygon points="5 3 19 12 5 21 5 3" />
                                </svg>
                            </button> -->
                      <!--      <span class="video-label">Sh<span class="dot">●</span>t 2</span>
                        </div>
                        <div class="video-meta">
                            <p class="video-title">Behind the scenes</p>
                            <p class="video-stats">1:15 · 8k vistas</p>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- ════════════════════════ REELS & IMÁGENES ════════════════════════ -->
    <!--    <section class="section-gallery" id="galeria">
            <div class="container">
                <h2 class="section-label">Reels <span>&</span> Imágenes</h2>
                <div class="photo-grid">
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 1</span>
                        </div>
                    </div>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 2</span>
                        </div>
                    </div>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 3</span>
                        </div>
                    </div>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 4</span>
                        </div>
                    </div>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 5</span>
                        </div>
                    </div>
                    <div class="photo-card">
                        <div class="photo-placeholder">
                            <span>Foto 6</span>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->

        <!-- ══════════════════════════ CONTACTO ══════════════════════════════ -->
    <!--    <section class="section-contact" id="contacto">
            <div class="container contact-inner">

                <div class="contact-left">
                    <h2 class="contact-title">Hablemos de<br>tu <em>proyecto</em></h2>
                    <p class="contact-desc">
                        Cuéntame qué necesitas y te preparo un presupuesto sin compromiso.
                        Trabajo en toda la península.
                    </p>
                    <label class="toggle-wrap">
                        <span class="toggle-text">Acepto la política de privacidad</span>
                        <div class="toggle">
                            <input type="checkbox" id="privacidad" />
                            <span class="toggle-track"></span>
                        </div>
                    </label>
                </div>

                <form class="contact-form" action="#" method="POST">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="hola@ejemplo.com" required />
                        </div>
                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <input type="text" id="direccion" name="direccion" placeholder="Calle, ciudad..." />
                    </div>
                    <div class="form-group">
                        <label for="mensaje">Mensaje</label>
                        <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntame en qué puedo ayudarte..." required></textarea>
                    </div>
                    <button type="submit" class="btn btn--dark btn--full">Enviar mensaje</button>
                </form>

            </div>
        </section>
    </main> -->
    <!-- ══════════════════════════════ FOOTER ══════════════════════════════ -->
  <!--  <footer class="site-footer">
        <div class="container footer-inner">
            <p>© 2026 Cenit-Sky — Todos los derechos reservados</p>
            <div class="footer-links">
                <a href="#">Privacidad</a>
                <a href="#">Aviso legal</a>
            </div>
        </div>
    </footer>
</body>

</html> -->