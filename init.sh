#!/bin/bash

#Levantar docker
docker compose up backend nginx db -d

#Dependencias front
#docker compose run frontend npm install 
#Dependencias back
docker compose run backend composer install

while ! docker compose run backend php artisan migrate > /dev/null ; do
    if ! docker ps -f name=db | grep db > /dev/null ; then 
        echo " db container off... "
        break
    fi
    echo "retrying migrations.." 
    sleep 5
done
echo "OK"
