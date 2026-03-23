<section class="section-contact" id="contacto">
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

        <form class="contact-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/contacto_controller.php" method="POST">
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
            <?php if (isset($_GET['contacto'])): ?>
                <div class="form-alert <?php echo $_GET['contacto'] === 'ok' ? 'form-alert--ok' : 'form-alert--error'; ?>">
                    <?php if ($_GET['contacto'] === 'ok'): ?>
                        ✅ Mensaje enviado correctamente. Me pondré en contacto contigo pronto.
                    <?php elseif ($_GET['contacto'] === 'error'): ?>
                        ❌ Rellena todos los campos obligatorios.
                    <?php elseif ($_GET['contacto'] === 'email'): ?>
                        ❌ El email introducido no es válido.
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            <button type="submit" class="btn btn--dark btn--full">Enviar mensaje</button>
        </form>
    </div>
</section>