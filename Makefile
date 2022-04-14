CONTAINER=docker-lara9

up:
	docker-compose up
stop:
	docker-compose stop
build:
	cp ./.env.example ./.env
	cp ./src/.env.example ./src/.env
	docker-compose up --build
ps:
	docker ps
migrate:
	docker exec -it ${CONTAINER} php artisan migrate
fresh:
	docker exec -it ${CONTAINER} php artisan migrate:fresh
seed:
	docker exec -it ${CONTAINER} php artisan db:seed
init:
	# Windowsだと出来ない場所
	cp ./.env.example ./.env
	cp src/.env.example src/.env
	# docker-compose up --build -d
	# docker exec -it ${CONTAINER} composer install
	# docker exec -it ${CONTAINER} php artisan migrate
	# docker exec -it ${CONTAINER} php artisan db:seed
	# docker exec -it ${CONTAINER} php artisan storage:link
	docker exec -it ${CONTAINER} php artisan key:generate