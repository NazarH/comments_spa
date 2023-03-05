
# Описание проекта

Одностраничный сайт для написания комментариев, с интуитивно понятным функционалом. На странице отображается таблица с ветками комментариев. Вы можете создать как свою ветку, так и оставить комментарий в соседней, а также отсортировать ветки таблицы в произвольном порядке, нажав на соответствующий заголовок. Нет необходимости проходить регистрацию. Ваш профиль создается автоматически после формирования комментария, и чтобы опубликовать под указанным именем новый - необходимо повторить даннные первой публикации. Во время его составления у вас есть возможность предпросмотра.


# Инструкция по установке

1. Запустите __установленый ранее Docker__;
2. Создайте папку "__projects__", и откройте её в редакторе кода. Далее необходимо вводить команды в терминале.
3. __git clone https://github.com/NazarH/comments_spa.git__
4. __cd comments_spa__
5. __composer install__
6. cp .env.example .env 
7. __docker-compose build__
8. __docker-compose up -d__
9. Теперь откройте в браузере следующий адресс: [админка](http://localhost:8000/), а в полях "__пользователь__" и "__пароль__" введите слово "__root__". После возвращайтесь к терминалу.
10. __docker exec -it laravel-app bash__
11. __php artisan migrate__
12. __php artisan storage:link__
13. Если все шаги проделаны правильно, вы можете открыть [наш сайт](http://localhost:8080/).

__docker-compose down -v__ (что бы свернуть приложение)
