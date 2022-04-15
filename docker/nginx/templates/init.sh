#!/bin/sh

envsubst '$$APP_SERVER_NAME' < \
  /etc/nginx/conf.d/default.conf.template > \
  /etc/nginx/conf.d/default.conf

nginx -g 'daemon off;'
