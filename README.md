
# Описание проекта

Одностраничный сайт для написания комментариев, с интуитивно понятным функционалом. На странице отображается таблица с ветками комментариев. Вы можете создать как свою ветку, так и оставить комментарий в соседней, а также отсортировать ветки таблицы в произвольном порядке, нажав на соответствующий заголовок. Нет необходимости проходить регистрацию. Ваш профиль создается автоматически после формирования комментария, и чтобы опубликовать под указанным именем новый - необходимо повторить даннные первой публикации. Во время его составления у вас есть возможность предпросмотра.


# Инструкция по установке

1. Запустите __установленый ранее Docker__;
2. Создайте папку "projects", и откройте её в редакторе кода. Далее необходимо вводить команды в терминале.
3. __git clone https://github.com/NazarH/comments_spa.git__
4. cd comments_spa
5. __docker-compose build__
6. __docker-compose up -d__
7. Теперь откройте в браузере следующий адресс: [админка](http://localhost:8000/), и в полях "__логин__" и "__пароль__" введите слово "__root__". После возвращайтесь к терминалу.
8. __docker exec -it laravel-app bash__
9. __php artisan migrate__
10. __php artisan storage:link__
11. Если все шаги проделаны правильно, вы можете открыть [наш сайт](http://localhost:8080/).

__docker-compose down -v__ (что бы свернуть приложение)
