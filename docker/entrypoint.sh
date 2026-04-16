#!/bin/sh
set -e

echo "==> Generando .env desde variables de entorno..."
cat > /var/www/.env << EOF
APP_NAME=${APP_NAME:-Codesin}
APP_ENV=${APP_ENV:-production}
APP_KEY=${APP_KEY}
APP_DEBUG=${APP_DEBUG:-false}
APP_URL=${APP_URL:-http://localhost}

LOG_CHANNEL=stack

DB_CONNECTION=${DB_CONNECTION:-mysql}
DB_HOST=${DB_HOST}
DB_PORT=${DB_PORT:-3306}
DB_DATABASE=${DB_DATABASE}
DB_USERNAME=${DB_USERNAME}
DB_PASSWORD=${DB_PASSWORD}

BROADCAST_DRIVER=log
CACHE_DRIVER=${CACHE_DRIVER:-file}
SESSION_DRIVER=${SESSION_DRIVER:-file}
SESSION_LIFETIME=120
QUEUE_DRIVER=sync

MAIL_DRIVER=${MAIL_DRIVER:-smtp}
MAIL_HOST=${MAIL_HOST:-smtp-relay.brevo.com}
MAIL_PORT=${MAIL_PORT:-587}
MAIL_FROM_NAME="${APP_NAME:-Codesin}"
MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS:-f.espinoza@whipple.mx}
MAIL_USERNAME=${MAIL_USERNAME}
MAIL_PASSWORD=${MAIL_PASSWORD}
MAIL_ENCRYPTION=${MAIL_ENCRYPTION:-tls}

QUEJAS_EMAIL_RECIPIENT=${QUEJAS_EMAIL_RECIPIENT:-Admon.finanzas@codesin.mx}

MAILCHIMP_API_KEY=${MAILCHIMP_API_KEY}
MAILCHIMP_SERVER_PREFIX=${MAILCHIMP_SERVER_PREFIX:-us10}
MAILCHIMP_LIST_ID=${MAILCHIMP_LIST_ID}
EOF

echo "==> Ajustando permisos de storage..."
chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache
chmod -R 775 /var/www/storage /var/www/bootstrap/cache

echo "==> Limpiando cachés de Laravel..."
php /var/www/artisan config:clear
php /var/www/artisan view:clear

echo "==> Iniciando servicios (PHP-FPM + Nginx)..."
exec /usr/bin/supervisord -n -c /etc/supervisor/conf.d/supervisord.conf
