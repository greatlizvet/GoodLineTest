Системные требования:
MySQL 5.7
php >=7.2
nodejs >= 14
Модули php:
- bcmath
- ctype
- fileinfo
- json
- mbstring
- openssl
- pdo
- pdo_mysql
- tokenizer
- xml
- mysqli
Развертывание
1. Склонировать репозиторий при помощи команды git clone git@github.com:greatlizvet/GoodLineTest.git
2. В папке проекта выполнить установку зависимостей php composer.phar install или composer install
3. Выполнить команду php artisan key:generate
4. Создать новую пустую базу данных MySQL:
	1. Перейти в командную строку MySQL, выполнив команду sudo mysql.
	2. Создать новую базу данных командой create database examplebase;
	3. Выдать права пользователю БД командой grant all on examplebase.* to 'имя'@'хост';
5. Скопировать файл .env.example с именем .env в то же место, где лежал исходный файл: cp .env.example .env
6. В скопированном файле изменить следующие строки:
	1. DB_DATABASE=examplebase
	2. DB_USERNAME={имя_пользователя_mysql}
	3. DB_PASSWORD={пароль_пользователя}
Сохранить изменения.
7. Запустить миграции БД php artisan migrate
8. Выполнить npm install
9. Выполнить npm run dev
10. Запустить сервер php artisan serve
11. Перейти по адресу http://127.0.0.1:8000