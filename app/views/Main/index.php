<?php
session_start();
?>

<header>
    <div class="MainInfo">
        <img class="header-logo" src="/public/images/logo.png" draggable="false">
        <p class="header-website-name"><a href="#">MYSHOP</a></p>
    </div>
    <nav class="dws-menu">
        <ul>
            <li><a href="#"><i class="fa fa-home" style="margin-right: 5px;"></i>Главная</a></li>
            <li><a href="#"><i class="fa fa-shopping-cart" style="margin-right: 5px;"></i>Каталог<i class="fa fa-angle-down" style="margin-left: 5px;"></i></a>
                <ul>
                    <li><a href="#">Найти</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-user" style="margin-right: 5px;"></i></i>Аккаунт<i class="fa fa-angle-down" style="margin-left: 5px;"></i></a>
                <ul>
                    <li><a href="signIn">Войти</a></li>
                    <li><a href="signUp">Регистрация</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
<?php

use vendor\core\DB;

// подключаемся к базе
$db = require ROOT . '/config/config_db.php';
$db = new DB($db['dsn'], $db['user'], $db['pass']);