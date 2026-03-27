// MODAL MENSAJES
const rows = document.querySelectorAll('.mensaje-row');
const overlay = document.getElementById('modalOverlay');
const modalClose = document.getElementById('modalClose');

if(overlay) {
    rows.forEach(row => {
        // Marcar como leído automáticamente
        if (row.classList.contains('mensaje-row--unread')) {
            row.classList.remove('mensaje-row--unread');
            row.querySelector('.mensaje-dot')?.remove();
            fetch(`/MIS_PROYECTOS/CenitSky/app/controllers/mensajes_controller.php?accion=leer&id=${row.dataset.id}`);
        }
        row.addEventListener('click', (e) => {
            if (e.target.closest('.mensaje-acciones')) return;
            document.getElementById('modalNombre').textContent = row.dataset.nombre;
            document.getElementById('modalEmail').textContent = row.dataset.email;
            document.getElementById('modalDireccion').textContent = row.dataset.direccion;
            document.getElementById('modalFecha').textContent = row.dataset.fecha;
            document.getElementById('modalMensaje').textContent = row.dataset.mensaje;
            overlay.classList.add('modal--open');
        });
    });

    modalClose.addEventListener('click', () => overlay.classList.remove('modal--open'));
    overlay.addEventListener('click', (e) => { 
        if(e.target === overlay) overlay.classList.remove('modal--open'); 
    });
}