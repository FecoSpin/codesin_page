# Codesin - Página Web

Este proyecto es una aplicación web desarrollada con el framework **Laravel 5.6** y **Vue.js 2**.

## Requisitos Previos

- **PHP**: ^7.1.3
- **Composer**: Para gestionar dependencias de PHP.
- **Node.js**: Recomendado version 12 o superior (para Laravel Mix).
- **NPM**: Para gestionar dependencias de JavaScript.
- **Laragon/XAMPP**: Entorno de servidor local.

## Instalación y Configuración

Sigue estos pasos para poner en marcha el proyecto en tu entorno local:

1. **Clonar el repositorio**:
   ```bash
   git clone <URL_DEL_REPOSITORIO>
   ```

2. **Instalar dependencias de PHP**:
   ```bash
   composer install
   ```

3. **Instalar dependencias de JavaScript**:
   ```bash
   npm install
   ```

4. **Configurar el archivo de entorno**:
   Copia el archivo `.env.example` a `.env` y configura tus credenciales de base de datos.
   ```bash
   cp .env.example .env
   ```

5. **Generar la clave de la aplicación**:
   ```bash
   php artisan key:generate
   ```

6. **Migraciones de Base de Datos**:
   (Asegúrate de haber creado la base de datos en tu servidor MySQL antes de este paso).
   ```bash
   php artisan migrate
   ```

7. **Compilar recursos (Frontend)**:
   ```bash
   # Para desarrollo
   npm run dev
   # Para ver cambios en tiempo real
   npm run watch
   # Para producción
   npm run prod
   ```

## Comandos con Docker (Recomendado)

Dado que este proyecto usa Node.js 14 y PHP 7.4 (versiones antiguas), es altamente recomendado usar Docker. El contenedor `app` ya tiene todo lo necesario (Composer, Node.js, NPM y PHP) preconfigurado.

Para interactuar con la consola usa estos prefijos:

```bash
# Entrar temporalmente dentro del contenedor para correr comandos a gusto
docker-compose exec app bash

# ====== NODE / NPM ======
# Instalar los paquetes Javascript (ejecutar este comando completo es clave)
docker-compose exec app sh -c "rm -rf node_modules && npm install --no-audit --no-fund --legacy-peer-deps"

# Compilar para desarrollo local
docker-compose exec app npm run dev

# Compilar para producción (antes de subir por FTP)
docker-compose exec app npm run prod

# ====== PHP / ARTISAN ======
# Correr migraciones o cache
docker-compose exec app php artisan migrate
docker-compose exec app php artisan cache:clear

# Instalar Composer
docker-compose exec app composer install

# ====== MYSQL / BD ======
# Entrar a la base de datos (password: O3W3rvvZ~@z?kTJ%zx)
docker-compose exec db mysql -u wwcode_codesin -p wwcode_codesin
```

## Características Principales

- **Backend**: Laravel 5.6
- **Frontend**: Vue.js 2 & Vue Router
- **Estilos**: Sass & Bootstrap 4
- **Extras**: 
  - Integración con Mailchimp.
  - Exportación con Maatwebsite Excel.
  - Galería con Magnific Popup.
  - Owl Carousel para sliders.

## Estructura de Rutas Importantes

- `routes/web.php`: Rutas web de la aplicación.
- `routes/api.php`: Rutas de la API.
- `resources/assets/js/app.js`: Punto de entrada de Vue.js.
- `resources/views/`: Plantillas Blade y estructura de vistas.

## Notas Adicionales

- Si usas Laragon, el nombre del dominio local configurado en `webpack.mix.js` es `http://codesin_mx.test/`. Puedes cambiarlo si el tuyo es diferente.
- Los archivos en `/storage` y `/public/storage` deben tener permisos de escritura.

---
© 2026 Codesin
