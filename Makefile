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

env:
	cp .env.example .env

tinker:
	php artisan tinker

migrate:
	php artisan migrate


publish:
	php artisan vendor:publish --tag=lighthouse-schema

storlink:
	php artisan storage:link

watch:
	npm run watch