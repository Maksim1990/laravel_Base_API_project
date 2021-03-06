#!/usr/bin/env bash

sed -e "s/\${APP_HTTP_PORT}/${DEV_HTTP_PORT}/g;
        s/\${APP_HTTPS_PORT}/${DEV_HTTPS_PORT}/g;
        s/\${APP_REDIS_PORT}/${DEV_REDIS_PORT}/g;
        s/\${APP_RABBITMQ_MANGEMENT}/${DEV_RABBITMQ_MANGEMENT}/g;
        s/\${APP_RABBITMQ}/${DEV_RABBITMQ}/g;
        s/\${APP_MAIL_PORT}/${DEV_MAIL_PORT}/g;"  ./deploy/docker-compose_with_mysql_as_shared_service.dev.tpl.yml > docker-compose.yml


#####
# Variables that has forward slashes as values
SENTRY_LARAVEL_DSN_FILTERED=$(echo ${SENTRY_LARAVEL_DSN} | sed 's/\//\\\//g')
DEV_AWS_SECRET_ACCESS_KEY_FILTERED=$(echo ${DEV_AWS_SECRET_ACCESS_KEY} | sed 's/\//\\\//g')
####

sed -e "s/\${APP_MYSQL_PASSWORD}/${DEV_SHARED_MYSQL_PASSWORD}/g;
         s/\${APP_MYSQL_DATABASE}/${DEV_MYSQL_DATABASE}/g;
         s/\${APP_MYSQL_PORT}/3306/g;
         s/\${APP_MYSQL_HOST}/mysql/g;
         s/\${APP_AWS_ACCESS_KEY_ID}/${DEV_AWS_ACCESS_KEY_ID}/g;
         s/\${APP_AWS_SECRET_ACCESS_KEY}/${DEV_AWS_SECRET_ACCESS_KEY_FILTERED}/g;
         s/\${APP_AWS_DEFAULT_REGION}/${DEV_AWS_DEFAULT_REGION}/g;
         s/\${APP_AWS_BUCKET}/${DEV_AWS_BUCKET}/g;
         s/\${APP_MAILGUN_DOMAIN}/${DEV_MAILGUN_DOMAIN}/g;
         s/\${IBM_SERVERLESS_TOKEN}/${IBM_SERVERLESS_TOKEN}/g;
         s/\${SENTRY_LARAVEL_DSN}/${SENTRY_LARAVEL_DSN_FILTERED}/g;
         s/\${APP_MAILGUN_SECRET}/${DEV_MAILGUN_SECRET}/g;"  ./deploy/.env.dist.deploy > ./deploy/.env.dist
