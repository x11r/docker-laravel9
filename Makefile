#cp ./.env.example ./.env

include ./.env

build:
	docker-compose -p ${PROJECT_NAME} stop
	docker-compose -p ${PROJECT_NAME} up --build -d
console:
	docker exec -it ${APP_SERVER_NAME} /bin/bash

down:
	docker-compose stop
ps:
	docker ps

stop:
	docker-compose -p ${PROJECT_NAME} stop
up:
	docker-compose up -d

migrate:
	docker-compose -p ${PROJECT_NAME} exec app php artisan migrate
fresh:
	docker exec -it ${APP_SERVER_NAME} php artisan migrate:fresh
seed:
	docker exec -it ${APP_SERVER_NAME} php artisan db:seed
init:
	# Windowsだと出来ない場所
	cp ./.env.example ./.env
	cp src/.env.example src/.env

	# docker-compose up --build -d
	# docker exec -it ${APP_SERVER_NAME} composer install
	# docker exec -it ${APP_SERVER_NAME} php artisan migrate
	# docker exec -it ${APP_SERVER_NAME} php artisan db:seed
	# docker exec -it ${APP_SERVER_NAME} php artisan storage:link
	docker exec -it ${APP_SERVER_NAME} php artisan key:generate

## その他

web:
	#docker exec -it ${WEB_SERVER_NAME} /bin/sh
app:
	docker-compose -p ${PROJECT_NAME} exec app bash
	#docker exec -it ${APP_SERVER_NAME} bash
