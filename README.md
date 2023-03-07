# Installation instructions

* __git clone https://github.com/NazarH/comments_spa.git__
* __cd comments_spa__
* __cp .env.example .env__ 
*  __.env__: DB_HOST=__database__ DB_DATABASE=__comments_spa__ DB_PASSWORD=__root__
* __composer install__
* __docker-compose build__
* __docker-compose up -d__
* __docker exec -it laravel-app bash__
* __sudo chmod 777 . -R__
* __php artisan migrate__
* __php artisan storage:link__
* __php artisan key:generate__
* __php artisan config:cache__

http://localhost:8080/
http://localhost:8000/ - login & pass - __root__

__docker-compose down -v__ 
