<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Админка</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/style/materialize.min.css"/>
    <link rel="stylesheet" type="text/css" href="/public/style/admin.css"/>
</head>
<body>

<nav class="blue darken-4">
    <div class="nav-wrapper">
        <a href="/" class="brand-logo left">Microsoft License</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li>
                <form action="/panel" method="post">
                    <div class="input-field">
                        <input id="search" type="search" name="license" placeholder="[Поиск] Номер лицензии" required>
                    </div>
                </form>
            </li>
            <li>
                <form action="/panel" method="post">
                    <div class="input-field">
                        <input id="search" type="search" name="user" placeholder="[Поиск] ID Пользователя" required>
                    </div>
                </form>
            </li>
            <li><a href="/panel">Все лицензии</a></li>
            <li><a href="/panel/add-license">Добавить лицензию</a></li>
            <li><a href="/logout">Выйти</a></li>
        </ul>
    </div>
</nav>

<?php echo $content; ?>
<script src="/public/js/jquery.js"></script>
<script src="/public/js/materialize.min.js"></script>
<script src="/public/js/form.js"></script>
</body>
</html>