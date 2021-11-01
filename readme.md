how to

always remove composer.lock before hand

1. composer install
2. php artisan key:generate
3. php artisan config:cache
4. make db
5. php artisan migrate:fresh
6. php artisan serve
