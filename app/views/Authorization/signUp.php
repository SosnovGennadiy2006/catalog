<?php
session_start();
?>

<div class="mainWrapper">
    <form action="registerUser" method="post">
        <div class="mainContainer">
            <div class="mainContent">
                <h1 class="containerName">Регистрация</h1>
                <label class="input">
                    <input class="input__field" type="text" name="name" placeholder=" " required />
                    <span class="input__label">Имя</span>
                </label>
                <label class="input">
                    <input class="input__field" id="email_input" type="text" name="email" placeholder=" " required />
                    <span class="input__label">Почта</span>
                    <div class="input__error_text_wrapper">
                        <span class="input__error_text">Ошибка!</span>
                    </div>
                </label>
                <label class="input">
                    <input class="input__field" type="password" name="password" placeholder=" " required />
                    <span class="input__label">Пароль</span>
                </label>
                <label class="input">
                    <input class="input__field" type="password" name="confirmPassword" placeholder=" " required />
                    <span class="input__label">Подтвердите пароль</span>
                </label>
                <div class="button-group">
                    <input class="customButton" type="submit" name="submit" value="Зарегистрироваться">
                    <button class="customButton" type="reset">Сбросить</button>
                </div>
            </div>
            <p class="customLink"><a href="signIn">вход</a> | <a href="/">на главную</a></p>
        </div>
    </form>
</div>
<?php
if (isset($error))
{
    echo $error;
}
