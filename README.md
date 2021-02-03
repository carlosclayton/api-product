# Laravel 8 API Product

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


### 1.  	Configuring environment

##### 1.1.	Cloning API product by GITHUB

Run the command bellow on Bash:
```
$  git clone https://github.com/carlosclayton/api-product.git
```  

##### 1.2.	Endpoints

Run the command bellow on Bash:
```
$  php artisan api:routes
```  

### 2.	Test

##### 2.1.	Seeders

Run the command bellow to generate product seeders

```
$  php artisan db:seed --class=ProductSeeder
```

##### 2.2.	Unit test

Run the command bellow

```
$  vendor/bin/phpunit --filter ProductTest --testdox
```


##### 2.2.	Integration test

Run the command bellow

```
$  vendor/bin/phpunit --filter ProductDbTest --testdox
$  vendor/bin/phpunit --filter ProductControllerTest --testdox
```

##### 2.3.	API documentation



##### 2.2.	Laravel Dusk 


##### 2.5.	Teste de comportamento

Rara criar, rode o comando abaixo:
```
php artisan dusk:make LoginControllerTest 
``` 

Rara executar, rode o comando abaixo:
```
php artisan dusk  --filter LoginControllerTest
``` 
