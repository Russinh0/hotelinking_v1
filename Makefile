#INIT PROJECT#

#init: instala dependencias / levanta docker /genera migraciones
init:
	sh init.sh

restart:
	make rm images && make init

#Esperar que levante db
migrations:
	docker compose run backend php artisan migrate


#DEVELOP#

##DOCKER:
db-bash:
	docker exec -it db bash

back-bash:
	docker exec -it backend bash

nginx-bash:
	docker exec -it backend bash



back-up:
	docker compose up backend nginx db

up:
	docker compose up

down:
	docker compose down

rm images:
	docker image rm -f nginx:stable-alpine hotelinking-backend mysql:8.0.33 && make down && sudo rm -rf mysql

##LOCAL:
composer:
	composer install --working-dir=src/api

npm:
	npm install --prefix src/app




