migration:
		php artisan migrate:fresh --seed

request:
		php artisan make:request StorePostRequest

installation:
		composer install

copy:
	copy NUL .env

key:
	php artisan key:generate