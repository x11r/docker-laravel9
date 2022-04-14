
up:
	docker-compose up
stop:
	docker-compose stop
build:
	cp ./.env.example ./.env
	cp ./src/.env.example ./src/.env
	include .env
	docker-compose up --build -d
ps:
	docker ps
migrate:
	include .env
	docker exec -it ${APP_SERVER_NAME} php artisan migrate
fresh:
	include .env
	docker exec -it ${APP_SERVER_NAME} php artisan migrate:fresh
seed:
	include .env
	docker exec -it ${APP_SERVER_NAME} php artisan db:seed
init:
	# Windowsだと出来ない場所
	cp ./.env.example ./.env
	cp src/.env.example src/.env
	include .env
	# docker-compose up --build -d
	# docker exec -it ${APP_SERVER_NAME} composer install
	# docker exec -it ${APP_SERVER_NAME} php artisan migrate
	# docker exec -it ${APP_SERVER_NAME} php artisan db:seed
	# docker exec -it ${APP_SERVER_NAME} php artisan storage:link
	docker exec -it ${APP_SERVER_NAME} php artisan key:generate