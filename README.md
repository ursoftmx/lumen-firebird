# lumen-firebird

## Getting Started

    $ docker compose up --build
    
### To install Composer dependencies inside a running Docker container,
    $ docker exec api composer install
    $ docker exec api php artisan migrate


### Healtcheck
http://localhost:8200/api/v1/healthcheck

