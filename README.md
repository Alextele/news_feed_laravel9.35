1) Для запуска проекта нам будет необходим локальный веб-сервер, содержащий MariaDB. (например Xampp, ссылки для скачивания доступны на сайте: https://www.apachefriends.org/)
2) Устанавливаем Xampp (путь, как вариант, C:\xampp). Запускаем xampp-control.exe (MySQL -> start)
3) Далее весь проект можно запустить через командную строку cmd:
4) cd C:\xampp\mysql\bin
5) mysql –u root –p
6) ->Enter (вход без пароля)
7) CREATE SCHEMA `news` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
8) ->Ctrl+C (выходим из MariaDB)
9) cd C:\xampp\htdocs
10) Если у Вас не установлен git, то скачиваем zip файл (https://github.com/Alextele/news_feed_laravel9.35) Code->download zip; распаковываем по адресу, указаному в п.9.
11) Если git установлен, то выполняем клонирование:
12) git clone https://github.com/Alextele/news_feed_laravel9.35
13) cd C:\xampp\htdocs\news_feed_laravel9.35 (переходим в папку проекта)
14) php artisan migrate:refresh --seed (запускаем все миграции, сиды, фабрики)
15) совет: лучше временно выключть антивирус, чтобы он не удалил необходимые для работы сервера файлы
16) php artisan serve 
17) Теперь наш проект доступен в браузере по адресу: http://127.0.0.1:8000  (или http://localhost:8000/)
18) http://127.0.0.1:8000 - просмотр всех опубликованных статей с возможностью сортировки. Заголовок новости ведёт на подробное описание новости
19) http://127.0.0.1:8000/manager - Управление(создание, изменение, просмотр списка, удаление) всеми статьями, в т.ч. черновиками (не опубликованными)
