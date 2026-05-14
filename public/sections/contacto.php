<?php 
    // Recuperamos datos y errores de la sesión (si existen)
    $old = $_SESSION['old'] ?? [];
    $errores = $_SESSION['errores_validos'] ?? [];

    // Limpiamos los errores de la sesión para que no se vean al refrescar manualmente
    unset($_SESSION['errores_validos']); 
?>

<section class="section-contact" id="contacto">
    <div class="container contact-inner">
        <div class="contact-left">
            <h2 class="contact-title">Hablemos de<br>tu <em>proyecto</em></h2>
            <p class="contact-desc">
                Cuéntame qué necesitas y te preparo un presupuesto sin compromiso.
                Trabajo en toda la península.
            </p>
        </div>

        <form class="contact-form" action="/MIS_PROYECTOS/CenitSky/app/controllers/contacto_controller.php" method="POST" novalidate>
            <div class="form-row">
                <!-- Email -->
                <div class="form-group <?php echo isset($errores['email']) ? 'has-error' : ''; ?>">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="hola@ejemplo.com" 
                           value="<?php echo htmlspecialchars($old['email'] ?? ''); ?>" required />
                    <?php if(isset($errores['email'])): ?>
                        <span class="error-msg"><?php echo $errores['email']; ?></span>
                    <?php endif; ?>
                </div>

                <!-- Nombre -->
                <div class="form-group <?php echo isset($errores['nombre']) ? 'has-error' : ''; ?>">
                    <label for="nombre">Nombre</label>
                    <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" 
                           value="<?php echo htmlspecialchars($old['nombre'] ?? ''); ?>" required />
                    <?php if(isset($errores['nombre'])): ?>
                        <span class="error-msg"><?php echo $errores['nombre']; ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" id="direccion" name="direccion" placeholder="Calle, ciudad..." 
                       value="<?php echo htmlspecialchars($old['direccion'] ?? ''); ?>" />
            </div>

            <div class="form-group <?php echo isset($errores['mensaje']) ? 'has-error' : ''; ?>">
                <label for="mensaje">Mensaje</label>
                <textarea id="mensaje" name="mensaje" rows="4" placeholder="Cuéntame más..." required><?php echo htmlspecialchars($old['mensaje'] ?? ''); ?></textarea>
                <?php if(isset($errores['mensaje'])): ?>
                    <span class="error-msg"><?php echo $errores['mensaje']; ?></span>
                <?php endif; ?>
            </div>

            <!-- Checkbox de Privacidad -->
            <div class="form-group <?php echo isset($errores['privacidad']) ? 'has-error' : ''; ?>">
                <label class="toggle-wrap">
                    <span class="toggle-text">Acepto la política de privacidad</span>
                    <div class="toggle">
                        <input type="checkbox" name="privacidad" id="privacidad" <?php echo isset($old['privacidad']) ? 'checked' : ''; ?> />
                        <span class="toggle-track"></span>
                    </div>
                </label>
                <?php if(isset($errores['privacidad'])): ?>
                    <span class="error-msg"><?php echo $errores['privacidad']; ?></span>
                <?php endif; ?>
            </div>

            <!-- Mensaje de envío correcto -->
            <?php if (isset($_GET['contacto']) && $_GET['contacto'] === 'ok'): ?>
                <div class="form-alert form-alert--ok">
                    Mensaje enviado correctamente. Me pondré en contacto contigo pronto.
                </div>
            <?php endif; ?>

            <button type="submit" class="btn btn--dark btn--full">Enviar mensaje</button>
        </form>
    </div>
</section>