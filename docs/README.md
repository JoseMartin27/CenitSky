# Cenit-Sky
Web dinámica de servicios de vídeo y fotografía con drones.

## Tecnologías
- HTML / CSS / JavaScript
- PHP
- MySQL
- XAMPP (servidor local, apache)

## Rutas base
- Web local: http://localhost/MIS_PROYECTOS/CenitSky/public/index.php
- Panel admin: http://localhost/MIS_PROYECTOS/CenitSky/admin/login.php

## Estructura del proyecto
```
CENITSKY
│
├── public/
│   ├── index.php
│   ├── assets/
│   │   ├── css/
│   │   │   ├── base.css    ← variables, reset, botones, section-label
│   │   │   ├── layout.css  ← header, nav, footer
│   │   │   ├── home.css    ← hero, services-bar, vídeos, galería, contacto
│   │   │   ├── pages.css   ← categoria-hero, noticias, servicios, equipo, acerca
│   │   │   └── admin.css   ← panel de administración
│   │   └── images/
|   |          ├── cine_dron.jpg  
│   │          ├── deporte.png 
│   │          ├── drone_icon.png 
│   │          ├── estructura_dron.jpg
|   |          ├── foto_aerea.jpg
|   |          ├── hero.jpg                             
│   │          └── mini_4_pro.jpg 
│   ├── pages/
│   │   ├── acerca.php
│   │   ├── aventura.php
│   │   ├── equipo.php
│   │   ├── estructuras.php
│   │   ├── noticias.php
│   │   ├── paisajes.php
│   │   └── servicios.php
│   ├── partials/
│   │   ├── head.php ← base.css y layout.css
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
|           └── videos/
├── admin/
│   ├── login.php ← formulario de acceso
│   ├── index.php ← dashboard
│   ├── assets/
│   │   ├── css/
│   │   │   └── admin.css
│   │   └── js/
|   |       └── admin.js
│   └── pages/
│       ├── mensajes.php
│       ├── galeria.php
│       ├── noticias.php
│       └── configuracion.php
|       └── noticias_editar.php
├── app/
│   ├── controllers/
│   │   ├── configuracion_controller.php
│   │   ├── contacto_controller.php
│   │   ├── galeria_controller.php
│   |   ├── login_controller.php
│   │   ├── logout_controller.php
│   │   └── mensajes_controller.php
|   |   └── noticias_controller.php
│   └── config/
│       └── database.php
├── database/
│   └── Cenitsky.sql
│
├── docs/
│   ├── README.md
│   └── instalacion.md
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
---------------------------------
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
- Mensajes del formulario de contacto.
- Galería de fotos y vídeos por categoría.
- Creación de noticas y edición con publicación.
- Configuración general footer y placeholder forms.

## Base de datos SQL Y Schema
-- CENITSKY — Base de datos:

CREATE DATABASE IF NOT EXISTS cenitsky CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE cenitsky;

-- USUARIOS

CREATE TABLE usuarios (
    usuario_id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(100) NOT NULL,
    email         VARCHAR(150) NOT NULL UNIQUE,
    password      VARCHAR(255) NOT NULL,
    rol           ENUM('admin','superadmin') NOT NULL DEFAULT 'admin',
    fecha         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);


-- CATEGORIAS

CREATE TABLE categorias (
    categoria_id  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(100) NOT NULL,
    slug          VARCHAR(100) NOT NULL UNIQUE,
    activa        TINYINT(1) NOT NULL DEFAULT 1
);

-- Datos iniciales
INSERT INTO categorias (nombre, slug, activa) VALUES
('Paisajes',    'paisajes',    1),
('Aventura',    'aventura',    1),
('Estructuras', 'estructuras', 1);

-- MEDIA

CREATE TABLE media (
    media_id      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    categoria_id  INT UNSIGNED NOT NULL,
    tipo          ENUM('foto','video') NOT NULL,
    archivo       VARCHAR(255) NOT NULL,
    titulo        VARCHAR(150),
    descripcion   TEXT,
    destacada     TINYINT(1) NOT NULL DEFAULT 0,
    orden         INT UNSIGNED NOT NULL DEFAULT 0,
    fecha         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id) ON DELETE CASCADE
);

-- NOTICIAS

CREATE TABLE noticias (
    noticia_id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    titulo        VARCHAR(200) NOT NULL,
    slug          VARCHAR(200) NOT NULL UNIQUE,
    resumen       VARCHAR(300),
    contenido     TEXT NOT NULL,
    imagen        VARCHAR(255),
    publicada     TINYINT(1) NOT NULL DEFAULT 0,
    fecha         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- MENSAJES

CREATE TABLE mensajes (
    mensaje_id    INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre        VARCHAR(100) NOT NULL,
    email         VARCHAR(150) NOT NULL,
    direccion     VARCHAR(200),
    mensaje       TEXT NOT NULL,
    leido         TINYINT(1) NOT NULL DEFAULT 0,
    fecha         DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- CONFIGURACION

CREATE TABLE configuracion (
    configuracion_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clave            VARCHAR(100) NOT NULL UNIQUE,
    valor            TEXT
);

-- Datos iniciales
INSERT INTO configuracion (clave, valor) VALUES
('nombre_sitio',    'Cenit-Sky'),
('email_contacto',  'hola@cenitsky.com'),
('telefono',        ''),
('instagram',       ''),
('youtube',         ''),
('texto_footer',    '© 2026 Cenit-Sky — Todos los derechos reservados');

-- ESTADISTICAS

CREATE TABLE estadisticas (
    estadistica_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    pagina         VARCHAR(200) NOT NULL,
    categoria_id   INT UNSIGNED,
    ip             VARCHAR(45),
    fecha          DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (categoria_id) REFERENCES categorias(categoria_id) ON DELETE SET NULL
);

## Equipo técnico
- **Dron:** DJI Mini 4 Pro
- **Filtros:** ND4, ND8, ND16, ND64, ND256, ND-PL
- **Vídeo:** 4K / 100fps
- **Foto:** 48MP RAW + JPEG

## Autor
JoseMartin