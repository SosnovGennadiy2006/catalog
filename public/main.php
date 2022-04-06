<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Cuprum" rel="stylesheet">
    <link rel="stylesheet" href="/public/styles/font-awesome.css" type="text/css">
    <link rel="stylesheet" href="/public/styles/base.css?v=<?= time(); ?>" type="text/css">
    <link rel="stylesheet" href="/public/styles/main.css?v=<?= time(); ?>" type="text/css">
    <link rel="stylesheet" href="/public/styles/header.css?v=<?= time(); ?>" type="text/css">
    <title>Main page</title>
</head>
<body>
<header>
    <div class="MainInfo">
        <img class="header-logo" src="images/logo.png">
        <p class="header-website-name"><a href="#">MYSHOP</a></p>
    </div>
    <nav class="dws-menu">
        <ul>
            <li><a href="#"><i class="fa fa-home" style="margin-right: 5px;"></i>Главная</a></li>
            <li><a href="#"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i>Каталог<i class="fa fa-angle-down" style="margin-left: 5px;"></i></a>
                <ul>
                    <li><a href="#">Найти</a></li>
                    <li><a href="#">Добавить +</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-user" style="margin-right: 5px;"></i></i>Аккаунт<i class="fa fa-angle-down" style="margin-left: 5px;"></i></a>
                <ul>
                    <li><a href="#">Войти</a></li>
                    <li><a href="#">Регистрация</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
</body>
</html>