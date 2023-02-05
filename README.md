# Тестовое задание

Условия задания лежат на главной странице приложения

## Установка
- `git clone && cd <application_path>`
- `composer install`
- `cp .env-example .env`
- `php artisan key:generate`
- Заполнить параметры базы данных в .env
- `php artisan migrate`

## Тестовые данные
- `php artisan db:seed` создается тестовый пользователь.

## API
- `storage/postman/Project API.postman_collection.json` - коллекция запросов API, с примерами их выполнения.
- `storage/app/public/feed.json` - фид из задания, для тестирования загрузки данных 
