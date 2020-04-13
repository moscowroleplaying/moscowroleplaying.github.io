<div id="content">
    <div class="container">
        <div class="pathway">
            <ul>
                <li><a href="main">Главная</a></li>
                <li>Аккаунт</li>
            </ul>
        </div>
        <div class="article profile-page">
            <h1>Личный Кабинет</h1>
            <div class="site-profile-info">
                <div class="avatar left"> <img src="https://luxe-rp.ru/templates/cpoint/images/avatar.png" alt=""> </div>
                <div class="greeting left">
                    <p>Приветствуем тебя, {%login%}!</p>
                    <div class="links left"> </div>
                </div>
                <div class="email-logout right">
                    <div class="email left">
                        <div class="current-email"></div>
                    </div>
                    <div class="logout left"> <a class="btn" href="?logout=1">Выйти</a> </div>
                </div>
                <div class="clr-b"></div>
            </div>
            <div class="game-profile-info">
                <ul>
                    <li><span>Номер аккаунта</span> {%numberacc%}</li>
                    <li><span>Никнейм</span> {%login%} </li>
                    <li><span>Игровой уровень</span> {%level%}</li>
                    <li><span>Игровой опыт</span> {%exp%}</li>
                    <li><span>Наличные деньги</span> ${%money%}</li>
                    <li><span>Счет в банке</span> ${%bank%}</li>
                    <li><span>Пол</span> {%gender%}</li>
                    <li><span>Дом</span> {%house%}</li>
                    <li><span>Бизнес</span> {%business%}</li>
                    <li><span>Отель</span> {%hotel%}</li>
                    <li><span>Предупреждения</span> {%warns%}</li>
                    <li><span>Доната в игре</span> {%donate%}</li>
                </ul>
            </div>
            <div class="clr-b"></div>
        </div>
        <style>
            a.disabled {
                pointer -events: none;
                display: inline-block;
                color: grey;
            }
        </style>
    </div>
</div>