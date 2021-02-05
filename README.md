# Laravel 8 API Product
![Screenshot](./public/api-product.png)
### 1.	Third party package

> Laravel IDE Helper Generator: https://github.com/barryvdh/laravel-ide-helper

> Laravel Dump Server: https://github.com/beyondcode/laravel-dump-server

> Laravel 5 Repositories: https://github.com/andersao/l5-repository

> Doctrine DBAL: https://github.com/doctrine/dbal

> CORS Middleware for Laravel: https://github.com/fruitcake/laravel-cors

> Dingo API: https://github.com/dingo/api

> League Fractal: https://fractal.thephpleague.com/installation/ 

> Laravel Dusk: https://laravel.com/docs/8.x/dusk

> L5 Swagger: https://github.com/DarkaOnLine/L5-Swagger

> Behat-Laravel-Extension: https://github.com/laracasts/Behat-Laravel-Extension

### 2.  	Configuring environment

##### 2.1.	Cloning API product by GITHUB

Run the command bellow on Bash:
```
$  git clone https://github.com/carlosclayton/api-product.git
```  

##### 2.2.	Endpoints

Run the command bellow on Bash:
```
$  php artisan api:routes
```  

### 2.3	Test

##### 2.4.	Seeders

Run the command bellow to generate product seeders

```
$  php artisan db:seed --class=CategorySeeder
```

##### 2.5.	Unit test

Run the command bellow

```
$  vendor/bin/phpunit --filter CategoryTest --testdox
$  vendor/bin/phpunit --filter ProductTest --testdox
```


##### 2.6.	Integration test

Run the command bellow

```
$  vendor/bin/phpunit --filter CategoryDbTest --testdox
$  vendor/bin/phpunit --filter CategoryControllerTest --testdox
$  vendor/bin/phpunit --filter ProductDbTest --testdox
$  vendor/bin/phpunit --filter ProductControllerTest --testdox
```

##### 2.7.	API documentation

> Visit: http://localhost:8000/api/documentation

##### 2.8.	Laravel Dusk 

```
php artisan dusk 
``` 


##### 2.8.	Behat

```
vendor/bin/behat 
``` 
