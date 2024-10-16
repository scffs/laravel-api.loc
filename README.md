## Установка проекта из репозитория

1. Склонируйте репозиторий

```sh 
cd domains && git clone https://github.com/scffs/laravel-api.loc
```

2. Перейдите в папку с проектом и установите composer-зависимости

```shell
cd laravel-api.loc && composer install
```

3. Скопируйте `.env.example` в `.env`

```shell
copy .env.example .env
```

4. Сгенерируйте ключ шифрования

```shell
php artisan key:generate
```

5. Измени файл .env (пример для MySQL)

```dotenv
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_name
DB_USERNAME=db_user_name
DB_PASSWORD=db_password

SESSION_DRIVER=file
```
 
## Создание проекта
```sh 
cd domains && mkdir laravel-api.loc && cd laravel-api.loc
```

```sh 
composer self-update
```

```sh
composer create-project laravel/laravel .
```

```sh
php artisan install:api && php artisan config publish:cors && php artisan storage:link
```

В корне создан .htaccess

```
RewriteEngine On
RewriteRule ^(.*)$ public/$1 [L]
```
