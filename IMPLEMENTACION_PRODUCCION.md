# Guía de Implementación en Producción - Micrositio Sinaloa 10+

Este documento detalla los pasos necesarios para desplegar las modificaciones realizadas en el proyecto para la sección **Sinaloa 10+** en el ambiente de producción.

## 1. Cambios en el Código Fuente
Se han realizado modificaciones en los siguientes archivos clave:
- `resources/assets/js/views/sinaloaDiezMas.vue`: Actualización de la estructura, links a YouTube, y datos hardcoded del **Equipo Técnico Multisectorial** (15 integrantes).
- `app/Http/Controllers/NoticiasController.php`: Adición del método `sinaloa10()` que filtra noticias por `category_id = 12`.
- `routes/api.php`: Nueva ruta `/api/sinaloa10noticias`.
- `resources/assets/js/components/navBarv2.vue`: Cambio de "Codesin Sinaloa Talent" a "Sinaloa 10+".

## 2. Modificaciones en la Base de Datos
Para que el sistema de noticias filtradas funcione correctamente, es necesario realizar las siguientes acciones en la base de datos de producción:

### Agregar Categoría "Sinaloa 10+"
Ejecutar el siguiente comando SQL para insertar la categoría necesaria:

```sql
-- Verificar si ya existe el ID 12 o insertar uno nuevo con nombre 'Sinaloa 10+'
INSERT INTO categories (id, name, created_at, updated_at) 
VALUES (12, 'Sinaloa 10+', NOW(), NOW());
```

> **Nota:** Si el ID 12 ya está en uso, se debe ajustar el `NoticiasController.php` con el ID correspondiente o forzar este ID si es posible. Las noticias de esta estrategia deben ser etiquetadas con esta categoría en el CMS.

## 3. Despliegue de Activos (Frontend)
El proyecto utiliza una versión antigua de Laravel Mix (compatible con Node.js 14 o superior vía Docker). Para compilar los cambios en producción:

1. Asegurarse de que el contenedor de Docker esté corriendo.
2. Ejecutar la compilación de producción para optimizar los archivos JS y CSS:
   ```bash
   docker-compose exec app npm run prod
   ```
3. Verificar que los archivos `public/js/app.js` y `public/css/app.css` se hayan actualizado.

## 4. Recursos Multimedia
Se deben asegurar que las siguientes imágenes existan en la carpeta `public/images/` del servidor:
- `s10_banner_main.jpg`
- `s10_banner_video.jpg`
- `s10_banner_descargas.jpg`

## 5. Resumen de Integrantes del Equipo Técnico (ETM)
Se agregaron 15 integrantes al arreglo `equipoTecnico` en el componente Vue:
1. Alberto Kousuke De la Herrán Arita
2. Diego Alonso Gastélum Chavira
3. Doris Ibel Gutiérrez Félix
4. Dra. Doris Teresita Mendoza López
5. Dulce Livier Pérez Gámez
6. Héctor Emanuel Ibarra Flores
7. Ismael Barraza Guzmán
8. Jorge Miller Benítez
9. Jorge Rafael Elenes Figueroa
10. José Antonio Penné Madrid
11. José Antonio Ríos Rojo
12. María del Rosario Godoy Alarcón
13. Pedro Flores Leal
14. Sergio Antonio Álvarez Torres
15. Dra. Yamel Guadalupe Rubio Rocha

## 6. Verificación Final
Acceder a la URL del micrositio y comprobar:
- El banner principal carga correctamente.
- El video se abre en un popup al hacer clic.
- La lista de 15 miembros del ETM es visible y tiene formato Flexbox.
- La sección de noticias carga las últimas 3 entradas de la categoría 12 (si existen).
- El banner de descargas redirige correctamente al Drive.
