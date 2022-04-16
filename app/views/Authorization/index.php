<div class="mainWrapper">
    <div class="mainContainer">
        <div class="selectButtons state1">
            <button class="signInButton active" id="signInButton">Войти</button>
            <button class="signUpButton" id="signUpButton">Зарегистрироваться</button>
        </div>
        <div class="mainPart state1">
            <form action="" method="post">
                <div class="signInContainer authorizationContainer">
                    <p class="containerName">Вход</p>
                    <div class="flexInputContainer">
                        <p class="inputName">Введите логин:</p>
                        <input name="login" placeholder="логин" tabindex="-1">
                    </div>
                    <div class="flexInputContainer">
                        <p class="inputName">Введите пароль:</p>
                        <input name="password" placeholder="пароль" tabindex="-1">
                    </div>
                    <div class="flexRight">
                        <input type="submit" name="submit" tabindex="-1" class="submitButton" value="Войти">
                    </div>
                </div>
            </form>
            <form action="add_user" method="post">
                <div class="signUpContainer authorizationContainer">
                        <p class="containerName">Регистрация</p>
                        <div class="flexInputContainer">
                            <p class="inputName">Введите логин:</p>
                            <input name="login" placeholder="логин" tabindex="-1">
                        </div>
                        <div class="flexInputContainer">
                            <p class="inputName">Введите пароль:</p>
                            <input name="password" placeholder="пароль" tabindex="-1">
                        </div>
                        <div class="flexRight">
                            <input type="submit" name="submit" tabindex="-1" class="submitButton" value="Зарегистрироваться">
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>
