<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/normalize.css?ver=<?php echo time()?>">
    <link rel="stylesheet" href="css/style.css?ver=<?php echo time()?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Phoenix</title>
    <link rel="shortcut icon" href="images/icons8-fenix-16.png" type="image/png">
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


<main>
    <div class="container">
        <div class="main">
            <div class="main__column main__column--nav">
                <a class="main__column__nav" href="#"><img src="images/icon_massage.png"><p>Сообщения</p></a>
                <a class="main__column__nav" href="#"><img src="images/icon_friends.png"><p>Друзья</p></a>
            </div>
            <div class="main__column main__column--timeline">
                <div class="offer">
                    <h2>Лента новостей</h2>
                    <a href="#add__offer" class="offer__news">
                        Предложить новость
                    </a>
                </div>
                <?php
                $connect = mysqli_connect('localhost', 'root', 'root', 'posts');
                $mysql = mysqli_query($connect, "SELECT * FROM `user_post` order by id desc");
                $count = 0;

                if($mysql->num_rows > 0) {
                    while ($row = $mysql->fetch_assoc()) {
                        if($count <= 100) {
                            $user = $row;
                            $user_id = $user['id'];

                            $mysqlComment = mysqli_query($connect, "SELECT * FROM `comments` WHERE post_id = $user_id order by id desc");
                            while ($rowComment = $mysqlComment->fetch_assoc()) {
                                $userComment = $rowComment;
                                $connectComment = mysqli_connect('localhost', 'root', 'root', 'register-bd');
                                $mysqlCommentUser = mysqli_query($connectComment, "SELECT `login` FROM `users` WHERE id = {$userComment['user_id']}");
                                $mysqlCommentUser = $mysqlCommentUser->fetch_assoc();

                                $mysqlAnswer = mysqli_query($connect, "SELECT * FROM `answers` WHERE comment_id = {$userComment['id']} order by id desc");
                                while ($mysqlCommentAnswer = $mysqlAnswer->fetch_assoc()) {
                                    $userAnswer = $mysqlCommentAnswer;

                                    $connectAnswer = mysqli_connect('localhost', 'root', 'root', 'register-bd');
                                    $mysqlAnswerUser = mysqli_query($connectAnswer, "SELECT `login` FROM `users` WHERE id = {$userAnswer['user_id']}");
                                    $mysqlAnswerUser = $mysqlAnswerUser->fetch_assoc();

                                    $answer = $answer . '<div class="comments__answer__main">
                                                                        <div class="comment__avatar">
                                                                            <img src="images/free-icon-round-avatar-15081.png">
                                                                        </div>
                                                                        <div class="comments__content__main">
                                                                            <p class="comments__content__login">'.htmlspecialchars($mysqlAnswerUser['login']).'</p>
                                                                            <p class="comment__main">'.htmlspecialchars($userAnswer['answer']).'</p>
                                                                        </div>
                                                                    </div>'."\n";
                                }

                                $comment = $comment . '<div class="comments__content">
                                                            <div class="comment__avatar">
                                                                <img src="images/free-icon-round-avatar-15081.png">
                                                            </div>
                                                            <div class="comments__content__main">
                                                                <p class="comments__content__login">'.htmlspecialchars($mysqlCommentUser['login']).'</p>
                                                                <p class="comment__main">'.htmlspecialchars($userComment['comment']).'</p>
                                                                <div class="comments__answer">
                                                                    <form class="add__comment" action="comments/answerComment.php" method="post">
                                                                        <input type="hidden" value="'.$userComment['id'].'" name="id_comment">
                                                                        <input name="answer" type="text" required placeholder="Ответить">
                                                                    </form>
                                                                    '.($answer).'
                                                                </div>
                                                            </div>
                                                        </div>'."\n";
                                $answer = '';
                            }
                            $user_id = (int)$user_id;

                            if ($user['image'] > 0) {
                                $image = base64_encode($user['image']);
                                $show_image = '<img src="data:image/*;base64,'.htmlspecialchars($image).'" alt="">';
                             } else {
                                $show_image = '';
                            }

                            $post =  '
                            <div class="news">
                                <div class="news__avatar">
                                    <img src="images/free-icon-round-avatar-15081.png">
                                </div>
                                <div class="news__content">
                                    <h3 class="news__user">'.htmlspecialchars($user['user']).'</h3>
                                    '. $show_image .'
                                    <p class="news__text">'.htmlspecialchars($user['text']).'</p>
                                    <div class="feedback">
                                        <form action="incs/newLike.php" method="post">
                                            <input type="hidden" value="'.$user_id.'" name="post_id">
                                            <button type="submit" class="like" name="like">
                                                <img class="plus" src="images/free-icon-like-126473.png">
                                                <p class="counter__like">'.htmlspecialchars($user['likes']).'</p>
                                            </button>
                                        </form>
                                        <form action="incs/dislike.php" method="post">
                                            <input type="hidden" value="'.$user_id.'" name="post_id_dislike">
                                            <button type="submit" class="dislike" name="dislike">
                                                <img class="minus" src="images/free-png.ru-37.png" alt="">
                                                <p class="counter__dislike">'.htmlspecialchars($user['dislikes']).'</p>
                                        </button>
                                        </form>
                                    </div>
                                    <div class="comments">
                                        <button class="comments__btn">
                                            <svg width="35px" height="35px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M19,2 C20.5949286,2 21.9034643,3.25157398 21.9948968,4.82401157 L22,5 L22,15 C22,16.5949286 20.748426,17.9034643 19.1759884,17.9948968 L19,18 L15.5,18 L12.8,21.6 C12.611,21.852 12.315,22 12,22 C11.724375,22 11.4632969,21.8866875 11.2757187,21.6895391 L11.2,21.6 L8.5,18 L5,18 C3.40507143,18 2.09653571,16.748426 2.00510323,15.1759884 L2,15 L2,5 C2,3.40507143 3.25157398,2.09653571 4.82401157,2.00510323 L5,2 L19,2 Z M19,4 L5,4 C4.48835714,4 4.06466327,4.38714796 4.00674599,4.88361625 L4,5 L4,15 C4,15.5116429 4.38714796,15.9353367 4.88361625,15.993254 L5,16 L9,16 C9.275625,16 9.53670313,16.1133125 9.72428125,16.3104609 L9.8,16.4 L12,19.333 L14.2,16.4 C14.365375,16.1795 14.6126719,16.038625 14.8829375,16.0068516 L15,16 L19,16 C19.5116429,16 19.9353367,15.612852 19.993254,15.1163837 L20,15 L20,5 C20,4.48835714 19.612852,4.06466327 19.1163837,4.00674599 L19,4 Z M17,11 C17.552,11 18,11.448 18,12 C18,12.5125714 17.6137143,12.9354694 17.1165685,12.9932682 L17,13 L7,13 C6.448,13 6,12.552 6,12 C6,11.4874286 6.38628571,11.0645306 6.88343149,11.0067318 L7,11 L17,11 Z M17,7 C17.552,7 18,7.448 18,8 C18,8.51257143 17.6137143,8.93546939 17.1165685,8.99326822 L17,9 L7,9 C6.448,9 6,8.552 6,8 C6,7.48742857 6.38628571,7.06453061 6.88343149,7.00673178 L7,7 L17,7 Z"/>
                                            </svg>
                                        </button>
                                        <div class="comments__title">
                                            '.($comment).'
                                            <div class="comments__offer">
                                                <form class="add__comment" action="comments/addComment.php" method="post">
                                                    <input type="hidden" value="'.$user_id.'" name="id_comment">
                                                    <input name="comment" type="text" required placeholder="Комментировать">
                                                </form>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </div>
                            </div>
                            '."\n";

                            echo $post;
                            $comment = '';
                            $count++;
                        }
                    }
                }
                ?>
            </div>

            <div class="main__column main__column--recommendations">
                <h2>Рекомендации</h2>
                <div class="main__column__rec">
                    <div class="recommendations__logo">
                        <img class="recommendations__img" src="images/icon__twitter.png">
                    </div>
                    <h3 class="recommendations__title">Twitter</h3>
                    <p class="recommendations__subtitle">Twitter is a microblogging and social networking service owned by American company Twitter, Inc.</p>
                    <div class="recommendations__subscribe">Отслеживать</div>
                </div>
                <div class="main__column__rec">
                    <div class="recommendations__logo">
                        <img class="recommendations__img" src="images/icon__twitter.png">
                    </div>
                    <h3 class="recommendations__title">Twitter</h3>
                    <p class="recommendations__subtitle">Twitter is a microblogging and social networking service owned by American company Twitter, Inc.</p>
                    <div class="recommendations__subscribe">Отслеживать</div>
                </div>
                <div class="main__column__rec">
                    <div class="recommendations__logo">
                        <img class="recommendations__img" src="images/icon__twitter.png">
                    </div>
                    <h3 class="recommendations__title">Twitter</h3>
                    <p class="recommendations__subtitle">Twitter is a microblogging and social networking service owned by American company Twitter, Inc.</p>
                    <div class="recommendations__subscribe">Отслеживать</div>
                </div>
            </div>

            <div id="add__offer">
                <div id="add__offer_window">
                    <form class="add__post__form" action="incs/newOffer.php" method="post" enctype="multipart/form-data">
                        <textarea placeholder="Enter your message" rows="4" cols="50" id="massage" name="message"  required="" ></textarea>
                        <div class="input__wrapper">
                            <input name="file" type="file" id="input__file" class="input input__file" multiple>
                            <label for="input__file" class="input__file-button">
                                <span class="input__file-icon-wrapper"><img class="input__file-icon" src="images/263096.png" alt="Выбрать файл" width="25"></span>
                                <span class="input__file-button-text">Добавить изображение</span>
                            </label>
                        </div>
                        <div class="add__offer_buttons">
                            <a href="#" class="offer__news">Закрыть</a>
                            <button class="offer__news" type="submit">Предложить новость</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

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
