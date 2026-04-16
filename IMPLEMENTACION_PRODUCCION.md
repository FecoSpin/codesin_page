# Guía de Implementación en Producción - Micrositio Sinaloa 10+

Este documento detalla los pasos necesarios para desplegar las modificaciones realizadas en el proyecto para la sección **Sinaloa 10+** en el ambiente de producción.

## 0. Despliegue Inicial del Repositorio (desde cero)

Si se va a descargar y poner en línea este repositorio por primera vez, seguir estos pasos:

### 0.1 Requisitos del servidor
- **PHP 7.4** (con extensiones: `pdo_mysql`, `mbstring`, `exif`, `pcntl`, `bcmath`, `gd`, `zip`)
- **Composer 2.x**
- **Node.js 14+** y **npm** (solo si se compilarán assets en el servidor)
- **MySQL 5.7+** o MariaDB equivalente
- **Nginx** o **Apache** con mod_rewrite
- **Git**

### 0.2 Clonar el repositorio
```bash
git clone <URL_DEL_REPOSITORIO> codesin
cd codesin
```

### 0.3 Instalar dependencias PHP
```bash
composer install --no-dev --optimize-autoloader --no-interaction
```

### 0.4 Configurar archivo `.env`
```bash
cp .env.example .env
php artisan key:generate
```

Editar `.env` con los valores de producción:
```env
APP_NAME=Codesin
APP_ENV=production
APP_DEBUG=false
APP_URL=https://tudominio.com

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_bd
DB_USERNAME=usuario_bd
DB_PASSWORD=password_bd
```

### 0.5 Permisos de directorios
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

### 0.6 Migrar base de datos
```bash
php artisan migrate --force
```

### 0.7 Enlace simbólico de storage
```bash
php artisan storage:link
```

### 0.8 Optimizar para producción
```bash
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### 0.9 Compilar assets (si no vienen pre-compilados)
> Nota: Los assets Vue ya vienen compilados en `public/js/app.js`. Este paso solo es necesario si se realizan cambios al frontend.
```bash
npm install
npm run prod
```

### 0.10 Configurar servidor web
Apuntar el document root a `public/` del proyecto.

**Ejemplo Nginx:**
```nginx
server {
    listen 80;
    server_name tudominio.com;
    root /var/www/codesin/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }
}
```

### 0.11 Despliegue con Docker / CapRover (opcional)
Si se despliega con CapRover, el proyecto ya incluye:
- `Dockerfile` (PHP 7.4-FPM + Nginx + Supervisor)
- `captain-definition`
- `docker/` con configuraciones de Nginx, Supervisor y entrypoint

Comando para desplegar en CapRover:
```bash
caprover deploy
```

---

## 1. Cambios en el Código Fuente
Se han realizado modificaciones en los siguientes archivos clave:

### Backend & Modelos
- `app/Post.php`: Adición de `news_strategy_id` al fillable y relación `strategy()`.
- `app/NewsStrategy.php`: Nuevo modelo para las sub-categorías de noticias.
- `app/Http/Controllers/NoticiasController.php`: Métodos `sinaloa10()` y `sinaloa10All()` filtrando por `news_strategy_id = 2`.
- `app/Http/Controllers/Admin/NoticiasController.php`: Manejo del nuevo campo en el panel de administración.
- `routes/api.php`: Rutas `/api/sinaloa10noticias` y `/api/sinaloa10all`.

### Frontend (Vue)
- `resources/assets/js/views/sinaloaDiezMas.vue`: Estructura del micrositio y link a la nueva sección de noticias.
- `resources/assets/js/views/NoticiasSinaloaDiez.vue`: Nueva vista para el listado completo de noticias de Sinaloa 10+.
- `resources/assets/js/routes/routes.js`: Registro de la nueva ruta `/sinaloa10mas-noticias`.
- `resources/assets/js/components/navBarv2.vue`: Enlace "Noticias Sinaloa 10+" en el menú de Comunicación.

### Vistas Admin
- `resources/views/dashboard/noticias/edit.blade.php`: Selector de Sub-categoría (Estrategia).

## 2. Modificaciones en la Base de Datos
Es **imprescindible** ejecutar estos comandos SQL en la base de datos de producción:

```sql
-- 1. Crear tabla de estrategias
CREATE TABLE IF NOT EXISTS news_strategies (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL, 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- 2. Insertar valores iniciales
INSERT INTO news_strategies (id, name) VALUES (1, 'General'), (2, 'Sinaloa 10+') 
ON DUPLICATE KEY UPDATE name=name;

-- 3. Agregar campo a la tabla de posts
ALTER TABLE posts ADD COLUMN news_strategy_id INT DEFAULT 1;

-- 4. Actualizar noticias referentes a Sinaloa 10+
UPDATE posts SET news_strategy_id = 2 WHERE url IN (
    'codesin-convoca-a-sinaloa-10-la-estrategia-para-acelerar-el-crecimiento',
    'sinaloa-consolida-alianza-con-el-programa-de-las-naciones-unidas-para-el-desarrollo-para-construir-el-plan-economico-de-largo-plazo-rumbo-al-2050',
    'empresarios-del-norte-de-sinaloa-conocen-la-convocatoria-de-codesin-para-el-plan-economico-de-largo-plazo-rumbo-a-2050',
    'sinaloa-necesita-construir-desde-ahora-una-vision-economica-de-largo-plazo',
    'intercamaral-culiacan-se-suma-a-la-convocatoria-para-disenar-el-plan-economico-de-largo-plazo-de-sinaloa',
    'intercamaral-de-guasave-participara-en-el-diseno-del-plan-economico-de-largo-plazo-de-sinaloa',
    'cierra-convocatoria-para-integrar-el-equipo-que-disenara-el-plan-economico-de-largo-plazo-de-sinaloa',
    'inician-trabajos-del-equipo-tecnico-multisectorial-para-elaborar-el-plan-economico-de-largo-plazo-de-sinaloa'
);
```

## 3. Despliegue de Activos (Frontend)
Para que los cambios en Vue y el Menú sean visibles, se deben compilar los assets:

1. Ejecutar la compilación de producción:
   ```bash
   npm run prod
   ```
   *(O vía Docker si el entorno lo requiere: `docker-compose exec app npm run prod`)*

2. Verificar la actualización de `public/js/app.js` y `public/css/app.css`.

## 4. Recursos Multimedia
Asegurar la existencia de estas imágenes en `public/images/`:
- `s10_banner_main.jpg`, `s10_banner_video.jpg`, `s10_banner_descargas.jpg`.

## 5. Configuración de Correo (SMTP)
Agregar/actualizar las siguientes variables en el archivo `.env` de producción para el envío de correos mediante **Brevo (Sendinblue)**:

```env
MAIL_DRIVER=smtp
MAIL_HOST=smtp-relay.brevo.com
MAIL_PORT=587
MAIL_FROM_NAME="${APP_NAME}"
MAIL_FROM_ADDRESS=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=tls

QUEJAS_EMAIL_RECIPIENT=Admon.finanzas@codesin.mx
```

> **Importante:** Los campos `MAIL_FROM_ADDRESS`, `MAIL_USERNAME` y `MAIL_PASSWORD` deben completarse con las credenciales propias del cliente/servidor de producción.

Después de modificar el `.env`, limpiar la caché de configuración:
```bash
php artisan config:clear
php artisan config:cache
```

## 6. Verificación Final
1. En el Admin, editar una noticia y verificar que aparezca el selector "Sub-categoría".
2. Comprobar que el menú "Comunicación" tiene el nuevo enlace.
3. El micrositio `sinaloa10mas` debe mostrar las noticias marcadas con la estrategia "Sinaloa 10+".
4. Enviar un correo de prueba (por ejemplo, desde el formulario de quejas) para validar la configuración SMTP.
