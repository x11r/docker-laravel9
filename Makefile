
#cp ./.env.example ./.env
#include .env.example

up:
	include .env
	docker-compose up
stop:
	docker-compose stop
down:
	docker-compose stop
build:
	cp .env.example .env
	cp src/.env.example src/.env
	include ./.env
	docker-compose up --build
ps:
	docker ps
console:
	docker exec -it ${APP_SERVER_NAME} /bin/bash
migrate:
	docker exec -it ${APP_SERVER_NAME} php artisan migrate
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
