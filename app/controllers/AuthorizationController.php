<?php

namespace app\controllers;

use app\models\Main;
use PDOStatement;
use vendor\core\base\View;
use vendor\core\DB;
use vendor\core\DBStatement;

class AuthorizationController extends AppController
{
    public function indexAction()
    {
        $model = new Main();
        $this->getView();
    }

    /**
     *Метод для подключения вида и шаблона (вызывается в dispatch() Router)
     */
    public function getView()
    {
        $vObj = new View($this->currentRoute, $this->layout, $this->view);
        $vObj->setMeta("<link href=\"https://fonts.googleapis.com/css?family=Cuprum\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/public/styles/font-awesome.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/authorization.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/base.css?v=".time()."\" type=\"text/css\">
    <script src=\"/public/scripts/authorization.js?v=".time()."\" defer></script>
    <title>Authorization</title>");
        $vObj->render($this->data);
    }

    public function addUserAction()
    {
        //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
        if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} }
        if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
        //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
        if (empty($login) or empty($password)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
        {
            exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
        }
        //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
        $login = stripslashes($login);
        $login = htmlspecialchars($login);
        $password = stripslashes($password);
        $password = htmlspecialchars($password);
        //удаляем лишние пробелы
        $login = trim($login);
        $password = trim($password);
        // подключаемся к базе
        $db = require ROOT . '/config/config_db.php';
        $db = new DB($db['dsn'], $db['user'], $db['pass']);

        // проверка на существование пользователя с таким же логином
        $stn = $db->prepare("SELECT id FROM users WHERE login='$login'");
        $result  = $db->query("SELECT id FROM users WHERE login='$login'");
        $my_row = $stn->fetch();
        print_r($my_row);
        if (!empty($my_row['id'])) {
            exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
        }
        // если такого нет, то сохраняем данные
        $result2 = $db->prepare("INSERT INTO `users`(`login`, `user_password`) VALUES ('$login','$password')")->execute();
        // Проверяем, есть ли ошибки
        if ($result2=='TRUE')
        {
            echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='/public/index.php'>Главная страница</a>";
        }
        else {
            echo "Ошибка! Вы не зарегистрированы.";
        }
    }
}