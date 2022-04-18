<?php

namespace app\controllers;

use app\models\Main;
use PDOStatement;
use vendor\core\base\View;
use vendor\core\DB;
use vendor\core\DBStatement;

class AuthorizationController extends AppController
{
    public function signInAction()
    {
        $model = new Main();
        $vObj = new View($this->currentRoute, $this->layout, $this->view);
        $vObj->setMeta("<link href=\"https://fonts.googleapis.com/css?family=Cuprum\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/public/styles/font-awesome.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/authorization.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/base.css?v=".time()."\" type=\"text/css\">
    <script src=\"/public/scripts/authorization.js?v=".time()."\" defer></script>
    <title>Вход</title>");
        $vObj->render($this->data);
    }

    public function signUpAction()
    {
        $model = new Main();
        $vObj = new View($this->currentRoute, $this->layout, $this->view);
        $vObj->setMeta("<link href=\"https://fonts.googleapis.com/css?family=Cuprum\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"/public/styles/font-awesome.css\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/authorization.css?v=".time()."\" type=\"text/css\">
    <link rel=\"stylesheet\" href=\"/public/styles/base.css?v=".time()."\" type=\"text/css\">
    <script src=\"/public/scripts/authorization.js?v=".time()."\" defer></script>
    <title>Регистрация</title>");
        $vObj->render($this->data);
    }

    /**
     * Метод для добавления пользователя в базу данных
     * @return void
     */
    public function addUserAction()
    {
        session_start();

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

    /**
     * Метод для регистрации
     * @return void
     */
    public function registerUserAction()
    {
        echo $_SERVER["REQUEST_METHOD"];
        print_r($_POST);
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            $full_name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST["confirmPassword"]);
            $password_hash = password_hash($password, PASSWORD_BCRYPT);

            // подключаемся к базе
            $db = require ROOT . '/config/config_db.php';
            $db = new DB($db['dsn'], $db['user'], $db['pass']);

            $query = $db->prepare("SELECT id FROM users WHERE email = `$email`");

            if ($query) {
                $error = '';
                $query->execute();
                // Store the result so we can check if the account exists in the database.
                $query->fetch();
                if (!empty($my_row['id'])) {
                    $error .= '<p class="error">The email address is already registered!</p>';
                } else {
                    // Validate confirm password
                    if (empty($confirm_password)) {
                        $error .= '<p class="error">Please enter confirm password.</p>';
                    } else {
                        if (empty($error) && ($password != $confirm_password)) {
                            $error .= '<p class="error">Password did not match.</p>';
                        }
                    }
                    if (empty($error)) {
                        $insertQuery = $db->prepare("INSERT INTO `users` (`username`, `email`, `user_password`) VALUES 
                                                          ('$full_name', '$email', '$password');");
                        $result = $insertQuery->execute();
                        if ($result) {
                            $error .= '<p class="success">Your registration was successful!</p>';
                        } else {
                            $error .= '<p class="error">Something went wrong!</p>';
                        }
                    }
                }
                echo $error;
            }
        }
    }

    public function signInUserAction()
    {

    }
}