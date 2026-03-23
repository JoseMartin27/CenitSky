# Cenit-Sky
Web dinámica de servicios de vídeo y fotografía con drones.

## Tecnologías
- HTML / CSS / JavaScript
- PHP (sin framework)
- MySQL
- XAMPP (servidor local)

## Rutas base
- Web local: http://localhost/MIS_PROYECTOS/CenitSky/public/index.php
- Panel admin: http://localhost/MIS_PROYECTOS/CenitSky/admin/login.php

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
│   │   │   ├── pages.css       ← category-hero, noticias, servicios, equipo, acerca
│   │   │   └── admin.css       ← panel de administración
│   │   ├── js/
│   │   ├── images/
│   │   ├── video/
│   │   └── fonts/
│   ├── pages/
│   │   ├── paisajes.php
│   │   ├── aventura.php
│   │   ├── estructuras.php
│   │   ├── noticias.php
│   │   ├── servicios.php
│   │   ├── equipo.php
│   │   └── acerca.php
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
│       ├── paisajes/
│       │   ├── fotos/
│       │   └── videos/
│       ├── aventura/
│       │   ├── fotos/
│       │   └── videos/
│       ├── estructuras/
│       │   ├── fotos/
│       │   └── videos/
│       └── noticias/
│           └── fotos/
│
├── admin/
│   ├── login.php               ← formulario de acceso
│   ├── index.php               ← dashboard
│   ├── assets/
│   │   ├── css/
│   │   │   └── admin.css
│   │   └── js/
│   └── pages/
│       ├── mensajes.php
│       ├── galeria.php
│       ├── noticias.php
│       └── configuracion.php
│
├── app/
│   ├── controllers/
│   │   ├── login_controller.php
│   │   ├── logout_controller.php
│   │   └── contacto_controller.php  ← pendiente
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

## Navegación pública
| Enlace | Destino |
|--------|---------|
| Inicio | `public/index.php` |
| Servicios | `public/pages/servicios.php` |
| Acerca de | `public/pages/acerca.php` |
| Equipo | `public/pages/equipo.php` |
| Contacto | `public/index.php#contacto` |
| Icono dron | `admin/login.php` |

## Categorías de contenido
| Categoría | Página | Uploads |
|-----------|--------|---------|
| Paisajes | `pages/paisajes.php` | `uploads/paisajes/` |
| Aventura | `pages/aventura.php` | `uploads/aventura/` |
| Estructuras | `pages/estructuras.php` | `uploads/estructuras/` |
| Noticias | `pages/noticias.php` | `uploads/noticias/` |

## Panel de administración
- Acceso: `admin/login.php`
- Dashboard: `admin/index.php`
- Sesiones PHP con control de acceso
- Logout: `app/controllers/logout_controller.php`

Gestiona desde `admin/`:
- Mensajes del formulario de contacto
- Galería de fotos y vídeos por categoría
- Noticias
- Configuración general

## Base de datos
Nombre: `cenitsky`
Ver `docs/base-de-datos.md`

### Tablas
| Tabla | Descripción |
|-------|-------------|
| `usuarios` | Acceso al panel admin |
| `categorias` | Categorías de contenido |
| `media` | Fotos y vídeos por categoría |
| `noticias` | Artículos del blog |
| `mensajes` | Contactos del formulario |
| `configuracion` | Ajustes generales de la web |
| `estadisticas` | Registro de visitas |

## Equipo técnico
- **Dron:** DJI Mini 4 Pro
- **Filtros:** ND4, ND8, ND16, ND64, ND256, ND-PL
- **Vídeo:** 4K / 100fps
- **Foto:** 48MP RAW + JPEG

## Estado actual
- ✅ Portada completa
- ✅ Páginas de categoría: paisajes, aventura, estructuras, noticias
- ✅ Páginas nuevas: servicios, equipo, acerca
- ✅ Panel admin: login, dashboard, logout
- ✅ Base de datos conectada
- ⏳ Formulario de contacto pendiente de conectar
- ⏳ Páginas admin: mensajes, galería, noticias, configuración

## Instalación en XAMPP
Ver `docs/instalacion.md`

## Autor
JoseMartin