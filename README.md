# Aplicación Web SiCultura

**v2.0** — Sistema de Información de la Cultura

Aplicación web para la gestión administrativa del Sistema de Información de la Cultura del Ministerio de Cultura de Colombia. Permite administrar activos de información, lenguas nativas, salas de cine, bibliotecas públicas e índices de información clasificada.

---

## Tecnologías

| Componente        | Tecnología               |
| ----------------- | ------------------------ |
| **Backend**       | PHP 8.x                  |
| **Frontend**      | AdminLTE v4, Bootstrap 5 |
| **Base de datos** | MySQL / MariaDB          |
| **Gráficos**      | Chart.js                 |
| **Tablas**        | DataTables               |
| **Alertas**       | SweetAlert2              |
| **Iconos**        | Font Awesome 6           |

---

## Estructura del Proyecto

```
Aplicacion-Web-SiCultura/
├── ajax/                  # Endpoints AJAX (CRUD)
├── controladores/         # Lógica de negocio (MVC - Controladores)
├── modelos/               # Acceso a datos (MVC - Modelos)
├── vistas/
│   ├── css/               # Estilos personalizados
│   ├── img/               # Imágenes del sistema
│   ├── js/                # Scripts propios (plantilla, módulos)
│   ├── modulos/           # Vistas parciales (PHP)
│   │   └── inicio/        # Componentes del dashboard
│   └── vendor/            # Dependencias frontend (AdminLTE, Bootstrap, etc.)
├── index.php              # Punto de entrada
├── sicultura.sql          # Base de datos
├── .htaccess              # Reescritura de URLs
└── README.md
```

---

## Requisitos

- **XAMPP** u otro stack LAMP/WAMP (Apache + PHP 8.x + MySQL)
- **Navegador** compatible con ES6

---

## Instalación

1. Clonar el repositorio en `htdocs`:

   ```bash
   git clone https://github.com/mauriciomejiae/Aplicacion-Web-SiCultura.git
   ```

2. Importar la base de datos `sicultura.sql` en phpMyAdmin.

3. Configurar la conexión en `modelos/conexion.php`.

4. Acceder desde el navegador:
   ```
   http://localhost/Aplicacion-Web-SiCultura
   ```

---

## Módulos

| Módulo                     | Descripción                                           |
| -------------------------- | ----------------------------------------------------- |
| **Tablero**                | Dashboard con estadísticas y gráficos                 |
| **Lenguas nativas**        | Gestión de lenguas indígenas de Colombia              |
| **Salas de cine**          | Registro de salas de cine                             |
| **Activos de información** | Inventario de activos (categorías, activos, índices)  |
| **Bibliotecas**            | Directorio de la Red Nacional de Bibliotecas Públicas |
| **Geoportal**              | Visualización geográfica                              |
| **Usuarios**               | Administración de usuarios y roles                    |

---

## Datos Abiertos

Este sistema se alimenta de datos abiertos del Gobierno de Colombia:

- [Activos de Información — Ministerio de Cultura](https://www.datos.gov.co/Cultura/Activos-Informaci-n-Ministerio-de-Cultura/twn6-25p8)
- [Mapa Sonoro — Lenguas Nativas de Colombia](https://www.datos.gov.co/Cultura/Mapa-Sonoro-Lenguas-Nativas-de-Colombia/734h-gxtn)
- [Salas de Cine Registradas en Colombia](https://www.datos.gov.co/Cultura/Salas-de-cine-registradas-en-Colombia-Publicaci-n-/cs7h-z5dy)
- [Directorio de la Red Nacional de Bibliotecas Públicas](https://www.datos.gov.co/Cultura/Directorio-de-la-Red-Nacional-de-Bibliotecas-P-bli/a5h9-fqe9)

---

## Licencia

[MIT License](https://opensource.org/licenses/MIT)
