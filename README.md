# Laravel 8 API Product

### 1.	Third party package

> Laravel IDE Helper Generator: https://github.com/barryvdh/laravel-ide-helper

> Laravel Dump Server: https://github.com/beyondcode/laravel-dump-server

> Laravel 5 Repositories: https://github.com/andersao/l5-repository

> Doctrine DBAL: https://github.com/doctrine/dbal
> 
### 1.  	Configuring environment
##### 1.1.	Configuring Laradock

First of all, run the command to download Laradock:
```
$ git clone https://github.com/Laradock/laradock.git laradock
$ cd laradock
$ cp env-example .env
```  

Next, run the command to up containers:

```
$ sudo docker-compose up -d nginx mysql workspace
```  


For test, run the command below:
```
$ sudo docker-compose ps
```  

> Tip: For more informations, visit:  https://laradock.io/

##### 1.2.	Cloning API product by GITHUB

Run the command bellow on Bash:
```
$  cd ~
$  git clone https://github.com/carlosclayton/api-product.git
```  

Next, make a copy of .env file 
```
$  cd ~/laradock
$  sudo docker exec -it laradock_workspace_1 bash
root@518c66467ccf:/var/www$  cd api-product
root@518c66467ccf:/var/www$  cp .env.example .env
```

##### 1.3.	Build do projeto
Run the command bellow on bash:
```
root@518c66467ccf:/var/www$  composer install
root@518c66467ccf:/var/www$  npm install
```

##### 1.4.	Configurando NGINX

Create api-product.conf file inside ~/laradock/nginx/sites/ and adding this bellow code:   
```
server {

listen 80;
    listen [::]:80;

    # For https
    listen 443 ssl;
    listen [::]:443 ssl ipv6only=on;
    ssl_certificate /etc/nginx/ssl/default.crt;
    ssl_certificate_key /etc/nginx/ssl/default.key;

    server_name api.pgenet;
    root /var/www/api-pgenet/public;
    index index.php index.html index.htm;

    location / {
         try_files $uri $uri/ /index.php$is_args$args;
    }

    location ~ \.php$ {
        try_files $uri /index.php =404;
        fastcgi_pass php-upstream;
        fastcgi_index index.php;
        fastcgi_buffers 16 16k;
        fastcgi_buffer_size 32k;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        #fixes timeouts
        fastcgi_read_timeout 600;
        include fastcgi_params;
    }

    location ~ /\.ht {
        deny all;
    }

    location /.well-known/acme-challenge/ {
        root /var/www/letsencrypt/;
        log_not_found off;
    }

    error_log /var/log/nginx/laravel_error.log;
    access_log /var/log/nginx/laravel_access.log;
}
```

Next, open /etc/hosts file and adding the line bellow at the end:

```
127.0.0.1 api-product.local
```

The last but not the least, run the command bellow to restart docker compose:

```
$  sudo docker-compose restart
```

> For test, visit on Browser: http://api-product.local/

##### 1.5.	First Commit on Github

> Tip: Visit: https://www.gitignore.io/ to make a gitignore file example

After then, copy the result of gitignore.io inside .gitignore and run de command bellow:

```
$  git add .
$  git commit -am "First commit"
$  git push origin master
```


### 2.	Test

##### 2.1.	Seeders

Run the command bellow to generate product seeders

```
$  php artisan db:seed --class=ProductSeeder
```

##### 2.2.	Laravel Dusk 

Rode os comandos abaixo para parar o Workspace:

```
$  cd ~/laradock
$  sudo docker-compose stop workspace
```

Em seguida, abra o arquivo .env e refatore o código abaixo:

```	
WORKSPACE_INSTALL_LARAVEL_INSTALLER=true
WORKSPACE_INSTALL_DUSK_DEPS=true
```

Em seguida, rode o comando abaixo para fazer o rebuild do workspace:

```
$  sudo docker-compose build workspace
```

Após rebuild, rode o comando abaixo para fazer o subir o workspace:

```
$  docker-compose up workspace
```

> DICA: Para maiores informações sobre Laradock com Dusk , acesse:  https://developpaper.com/installing-laravel-dusk-in-laradock/

##### 2.2.	Instalando Dusk no Workspace

Rode os comandos abaixo para instalar o Dusk  no Workspace:
```
$  sudo docker exec -it laradock_workspace_1 bash
$  cd api-pgenet
$  composer require --dev laravel/dusk
```
Em seguida, abra o arquivo app/Providers/AppServiceProvider.php e  refatore o código abaixo:
```
/**
* Register any application services.
*
* @return void
*/
public function register()
{
   
   // Laravel Dusk register
   if ($this->app->environment('local', 'testing')) {
       $this->app->register(DuskServiceProvider::class);
   }

}
```
Em seguida, rode o comando abaixo para instalar as dependências:

```
$  php artisan dusk:install
```
Em seguida, abra o arquivo tests/DuskTestCase.php e  refatore o código em abaixo:

```
/**
* Create the RemoteWebDriver instance.
*
* @return \Facebook\WebDriver\Remote\RemoteWebDriver
*/
protected function driver()
{
   $options = (new ChromeOptions)->addArguments([
       '--headless',
       '--window-size=1920,1080',
       '--no-sandbox',
       '--ignore-certificate-errors'
   ]);
       
   $capabilities = DesiredCapabilities::chrome()
       ->setCapability(ChromeOptions::CAPABILITY, $options)
       ->setPlatform('Linux');

   return RemoteWebDriver::create(
       'http://localhost:9515', DesiredCapabilities::chrome()->setCapability(
       ChromeOptions::CAPABILITY, $capabilities, 60000, 60000
   )  

   );
}
```
Rode o comando abaixo para iniciar o Chrome driver:

```
$  ./vendor/laravel/dusk/bin/chromedriver-linux
```

Em seguida, crie o arquivo .env.dusk.local e  adicione o código abaixo:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:/uz2x6jc1uf3mZ2btrmHBtkQtirsTA0zcUFUNt6GyeE=
APP_DEBUG=true
APP_URL=http://api.pgenet

LOG_CHANNEL=stack

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=pgenet
DB_USERNAME=default
DB_PASSWORD=secret

BROADCAST_DRIVER=log
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Rode o comando abaixo para executar o teste padrão do Dusk:

```
$  php artisan dusk --filter ExampleTest
```

> DICA: Para maiores informações sobre Laravel Dusk , acesse:  https://laravel.com/docs/6.x/dusk


##### 2.3.	Teste unitário

Rara criar, rode o comando abaixo:
```
php artisan make:test UserTest --unit
``` 


Rara executar, rode o comando abaixo:
```
./vendor/bin/phpunit --filter UserTest
``` 


##### 2.4.	Teste de integração

Rara criar, rode o comando abaixo:
```
php artisan make:test DBUserTest
``` 


Rara executar, rode o comando abaixo:
```
./vendor/bin/phpunit --filter DBUserTest
``` 



##### 2.5.	Teste de comportamento

Rara criar, rode o comando abaixo:
```
php artisan dusk:make LoginControllerTest 
``` 


Rara executar, rode o comando abaixo:
```
php artisan dusk  --filter LoginControllerTest
``` 
