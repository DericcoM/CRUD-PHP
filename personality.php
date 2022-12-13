<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/normalize.css?ver=<?php echo time()?>">
    <link rel="stylesheet" href="css/style.css?ver=<?php echo time()?>">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/icons8-fenix-16.png" type="image/png">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Phoenix</title>
</head>
<body>


<header>
    <div class="container">
        <div class="header__main">
            <a href="main.php" class="header__inner">
                <img class="header__logo" src="images/phoenix.png">
                <h1 class="header__inner_title">phoenix</h1>
            </a>
            <div class="header__socials">
                <div class="socials">
                    <div class="wrapper">
                        <div class="search-box">
                            <input type="search" placeholder="Search" class="input">
                            <div class="btn_soc">
                                <svg class="icon nav__icon nav__icon--search">
                                    <use xlink:href="#icon search"></use>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <a class="socials-icons" href="personality.php"><svg class="icon nav__icon">
                        <use xlink:href="#icon profile"></use>
                    </svg></a>
                </div>
            </div>
        </div>


    </div>
</header>

<div class="personality">
    <div class="container">
        <div class="personality__main">
            <div class="personality__column">
                <div class="personality__column__id">
                    <p class="personality__column__id__title">
                        <?=$_COOKIE['user']?>
                    </p>
                    <img class="personality__column__id__subtitle" src="images/personality-avatar.png" alt="">
                </div>
                <div class="personality__main-line"></div>
                <div class="personality__column__nav">
                    <button class="personality__column__nav__item" onclick="openPersonality(event, 'personal-info')">личная информация </button>
                    <button class="personality__column__nav__item" onclick="openPersonality(event, 'settings')">настройки</button>
                    <a href="exit.php" class="personality__column__nav__item">выйти</a>
                </div>
            </div>
            <div class="personality__column">
                <div class="personality__column__main" id="personal-info">
                    <h3 class="personality__column__main__title">Личная информация</h3>
                    <form action="#">
                        <input class="panel__main-info-input" name="" id="" placeholder="Фамилия">
                    </form>
                    <form action="#">
                        <input class="panel__main-info-input" name="" id="" placeholder="Имя">
                    </form>
                    <form action="#">
                        <input class="panel__main-info-input" name="" id="" placeholder="Отчество">
                    </form>
                    <div class="personality__column__main__radio">
                        <label class="custom-radio">
                            <input type="radio" name="color" value="indigo">
                            <span>Мужской</span>
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="color" value="indigo">
                            <span>Женский</span>
                        </label>
                        <label class="custom-radio">
                            <input type="radio" name="color" value="indigo">
                            <span>Не указан</span>
                        </label>
                    </div>
                    <form action="#">
                        <input type="date" class="panel__main-info-input" name="" id="" placeholder="Дата рождения">
                    </form>
                    <form action="#">
                        <input class="panel__main-info-input" type="email" name="" id="" placeholder="Ваша почта">
                    </form>
                    <form action="#">
                        <input class="panel__main-info-input" type="tel" name="" id="" placeholder="Телефон +7 123 456 78 90">
                    </form>

                    <form action="#">
                        <input class="panel__main-info-input" name="" id="" placeholder="Город">
                    </form>
                    <div class="panel__main__agree">
                        <label class="panel__main__agree-container">Я даю согласие на обработку своих персональных данных в соответсвии с <a style="text-decoration: none; color: #ff9933;" href="">Политикой в отношении обработки персональных данных</a> и <a style="text-decoration: none; color: #ff9933;" href="">Пользовательским соглашением.</a>
                            <input type="checkbox">
                            <span class="panel__main__agree-checkmark"></span>
                        </label>
                    </div>
                    <a class="btn" href="#"><p>Подтвердить изменения</p></a>
                </div>
                <div class="personality__column__main" id="settings">
                    <h3 class="personality__column__main__title">Настройки</h3>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/main.js?ver=<?php echo time()?>"></script>

<svg width="0" height="0" class="hidden">
    <symbol fill="#ff9933" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="Component 3">
        <path class="nav__icon" opacity="0.8" fill-rule="evenodd" clip-rule="evenodd" d="M9.99996 7V6C9.99996 4.89543 10.8954 4 12 4C13.1045 4 14 4.89543 14 6V7H9.99996ZM7.99996 7V6C7.99996 3.79086 9.79082 2 12 2C14.2091 2 16 3.79086 16 6V7H18.3308C18.849 7 19.2813 7.39576 19.3269 7.91187L20.373 19.7356C20.5282 21.49 19.1459 23 17.3847 23H6.61449C4.85328 23 3.47095 21.49 3.62616 19.7356L4.67224 7.91187C4.7179 7.39576 5.15022 7 5.66835 7H7.99996ZM16 9H14H9.99996H7.99996H6.58378L5.61838 19.9119C5.56664 20.4967 6.02742 21 6.61449 21H17.3847C17.9718 21 18.4325 20.4967 18.3808 19.9119L17.4154 9H16Z" ></path>
    </symbol>
    <symbol fill="#ff9933" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon heart">
        <rect opacity="0.01" width="24" height="24" fill="#D8D8D8"></rect>
        <path  opacity="0.8" d="M11.3268 4.85063L11.9795 5.42024L12.6363 4.85535C14.7874 3.00538 17.9238 3.1242 19.908 5.19867C21.9004 7.28175 22.028 10.5988 20.2783 12.8382L12.6984 20.2404C12.3105 20.6192 11.6913 20.6199 11.3026 20.2419L3.7109 12.8595C1.97472 10.5978 2.10707 7.27956 4.09739 5.19867C6.08439 3.12127 9.21735 3.00987 11.3268 4.85063Z" stroke="black" stroke-width="2"></path>
        <mask id="mask0_2928_3253" maskUnits="userSpaceOnUse" x="1" y="2" width="22" height="20">
            <path d="M11.3268 4.85063L11.9795 5.42024L12.6363 4.85535C14.7874 3.00538 17.9238 3.1242 19.908 5.19867C21.9004 7.28175 22.028 10.5988 20.2783 12.8382L12.6984 20.2404C12.3105 20.6192 11.6913 20.6199 11.3026 20.2419L3.7109 12.8595C1.97472 10.5978 2.10707 7.27956 4.09739 5.19867C6.08439 3.12127 9.21735 3.00987 11.3268 4.85063Z" fill="white" stroke="white" stroke-width="2"></path>
        </mask>
        <g mask="url(#mask0_2928_3253)"></g>
    </symbol>
    <symbol fill="#ff9933" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon profile">
        <path class="nav__icon" d="M4.21106 21.8724C4.21106 23.3759 2 23.3759 2 21.8724C2 17.4503 4.74171 13.7357 8.54472 12.1437C7.12965 10.994 6.24523 9.22513 6.24523 7.2794C6.24523 3.83015 8.98693 1 12.5246 1C15.9739 1 18.7156 3.83015 18.7156 7.2794C18.7156 9.22513 17.8312 10.994 16.4161 12.1437C20.2191 13.7357 22.9608 17.4503 22.9608 21.8724C22.9608 23.3759 20.7498 23.3759 20.7498 21.8724C20.7498 17.3618 17.0352 13.6472 12.5246 13.6472C7.92563 13.6472 4.21106 17.3618 4.21106 21.8724ZM12.5246 3.21106C10.2251 3.21106 8.45628 5.06834 8.45628 7.2794C8.45628 9.49045 10.2251 11.2593 12.5246 11.2593C14.7357 11.2593 16.5045 9.49045 16.5045 7.2794C16.5045 5.06834 14.7357 3.21106 12.5246 3.21106Z"  fill-opacity="0.8"></path>
    </symbol>
    <symbol fill="#ff9933" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="icon search">
        <path class="nav__icon" fill-rule="evenodd" clip-rule="evenodd" d="M16.687 15.9171C15.3399 17.2073 13.5125 18 11.5 18C7.35786 18 4 14.6421 4 10.5C4 6.35786 7.35786 3 11.5 3C15.6421 3 19 6.35786 19 10.5C19 12.5124 18.2074 14.3397 16.9174 15.6867C16.8738 15.718 16.8321 15.7533 16.7929 15.7925C16.7537 15.8318 16.7184 15.8735 16.687 15.9171ZM17.4735 17.8874C15.8416 19.2086 13.7632 20 11.5 20C6.25329 20 2 15.7467 2 10.5C2 5.25329 6.25329 1 11.5 1C16.7467 1 21 5.25329 21 10.5C21 12.7631 20.2087 14.8413 18.8877 16.4731L22.7071 20.2929C23.0976 20.6835 23.0976 21.3166 22.7071 21.7071C22.3165 22.0976 21.6834 22.0976 21.2929 21.7071L17.4735 17.8874Z"  fill-opacity="0.8"></path>
    </symbol>

</svg>

</body>
</html>
