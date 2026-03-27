# Guía de Implementación en Producción - Micrositio Sinaloa 10+

Este documento detalla los pasos necesarios para desplegar las modificaciones realizadas en el proyecto para la sección **Sinaloa 10+** en el ambiente de producción.

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

-- 4. (Opcional) Si hay noticias que deban ser Sinaloa 10+ por defecto, actualizar su ID
-- UPDATE posts SET news_strategy_id = 2 WHERE ...;
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

## 5. Verificación Final
1. En el Admin, editar una noticia y verificar que aparezca el selector "Sub-categoría".
2. Comprobar que el menú "Comunicación" tiene el nuevo enlace.
3. El micrositio `sinaloa10mas` debe mostrar las noticias marcadas con la estrategia "Sinaloa 10+".
