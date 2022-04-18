<?php
session_start();
?>

<div class="mainWrapper">
    <form action="add_user" method="post">
        <div class="mainContainer">
            <div class="mainContent">
                <h1 class="containerName">Вход</h1>
                <label class="input">
                    <input class="input__field" type="text" name="email" placeholder=" " required />
                    <span class="input__label">Почта</span>
                </label>
                <label class="input">
                    <input class="input__field" type="password" name="password" placeholder=" " required />
                    <span class="input__label">Пароль</span>
                </label>
                <div class="button-group">
                    <input class="customButton" type="submit" value="Войти">
                    <button class="customButton" type="reset">Сбросить</button>
                </div>
            </div>
            <p class="customLink"><a href="signUp">регистрация</a> | <a href="/">на главную</a></p>
        </div>
    </form>
</div>
