# Cenit-Sky

Web dinámica de servicios de vídeo y fotografía con drones.

## Tecnologías

- HTML / CSS / JavaScript
- PHP
- MySQL
- XAMPP (servidor local)

## Estructura del proyecto
```
drone-services/
│
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   │   ├── base.css        ← variables, reset, botones, section-label
│   │   │   ├── layout.css      ← header, nav, footer, responsive general
│   │   │   ├── home.css        ← hero, services-bar, vídeos, galería, contacto
│   │   │   ├── pages.css       ← category-hero, noticias
│   │   │   └── admin.css       ← panel de administración
│   │   ├── js/
│   │   ├── images/
│   │   ├── video/
│   │   └── fonts/
│   ├── pages/
│   │   ├── paisajes.php
│   │   ├── aventura.php
│   │   ├── estructuras.php
│   │   └── noticias.php
│   ├── partials/
│   │   ├── head.php            ← carga base.css y layout.css
│   │   ├── header.php
│   │   └── footer.php
│   ├── sections/
│   │   ├── hero.php
│   │   ├── videos.php
│   │   ├── galeria.php
│   │   └── contacto.php
│   └── uploads/
│
├── admin/
│   ├── index.php               ← dashboard
│   ├── assets/
│   │   ├── css/
│   │   └── js/
│   └── pages/
│       ├── mensajes.php
│       ├── galeria.php
│       ├── noticias.php
│       └── presupuestos.php
│
├── app/
│   ├── controllers/
│   ├── models/
│   ├── helpers/
│   ├── config/
│   │   ├── database.php
│   │   └── config.php
│   └── api/
│       ├── v1/
│       │   ├── contact.php
│       │   ├── quote.php
│       │   └── gallery.php
│       └── middleware/
│           ├── auth.php
│           └── cors.php
│
├── database/
│   └── schema.sql
│
├── docs/
│   ├── README.md
│   ├── instalacion.md
│   ├── base-de-datos.md
│   └── api.md
│
└── .htaccess
```

## Carga de CSS por página

| Página | CSS cargado |
|--------|-------------|
| Todas | `base.css` + `layout.css` (en `head.php`) |
| `index.php` | + `home.css` |
| `pages/*.php` | + `pages.css` |
| `admin/*.php` | + `admin.css` |

## Lógica de contenido

- **Portada** — 3 vídeos destacados + 6 fotos destacadas (mezcla de categorías) + contacto
- **Páginas de categoría** — hero descriptivo + vídeos propios + fotos propias
- **Noticias** — tarjetas con fecha, título, resumen y enlace

## Panel de administración

Gestiona desde `admin/`:
- Mensajes del formulario de contacto
- Galería de fotos y vídeos por categoría
- Noticias
- Presupuestos

## Instalación en XAMPP

Ver `docs/instalacion.md`

## Base de datos

Ver `docs/base-de-datos.md`

## API

Ver `docs/api.md`

## Autor

JoseMartin