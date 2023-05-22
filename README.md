
Start project 
(easy way):
make up
(Manual):
docker compose up -d
docker compose run backend composer install

Wait until the db is ready... Then:

docker compose run backend php artisan migrate
