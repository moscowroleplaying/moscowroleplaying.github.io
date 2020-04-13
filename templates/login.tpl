<div id="content">
    <div class="container">
        <div class="pathway">
            <ul>
                <li><a href="/">Главная</a></li>
                <li>Аккаунт</li>
            </ul>
        </div>
        <div class="article login-page">
            <h1>Личный кабинет игрока</h1>
            <p>{%t%}</p>
            <p>&nbsp;</p>
            <div class="form">
                <form action="cabinet" method="post" class="ucpLoginForm">
                    <div class="row">
                        <div class="label">Ваш ник</div>
                        <div class="field">
                            <input type="text" name="postnickname" class="inputbox" required=""> </div>
                    </div>
                    <div class="row">
                        <div class="label">Пароль</div>
                        <div class="field">
                            <input type="password" name="postpassword" class="inputbox" required=""> </div>
                    </div>
                    <div class="row">
                        <div class="label">Капча</div>
                        <div class="field">
                            <div class="g-recaptcha" data-sitekey="{%google_captcha_key%}"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="field">
                            <input type="submit" name="postlog_in" class="btn" value="Войти"> </div>
                    </div>
                    <input type="hidden" name="hash" value="27633b0d1e3a65e3" class="ucpInput"> </form>
            </div>
        </div>
    </div>
</div>