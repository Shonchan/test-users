# Запуск

выполнить следующую последовательность действий

- Переименовать .env.example в .env <br>


- Заполнить данные подключения к mysql в .env <br>


- Установка зависимостей <br>
<code>composer install</code>


- Сгенерировать app key <br>
<code>php artisan key:generate</code>


- Выполнить миграции <br>
<code>php artisan migrate</code>


- Запустить сидер <br>
<code>php artisan db:seed</code>


- Запуск сервера (в локальном окружении)<br>
<code>php artisan serve</code>


### API доступно по {domain}/api/users
