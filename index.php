<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/normalize.css?ver=<?php echo time()?>">
    <link rel="stylesheet" href="css/style.css?ver=<?php echo time()?>">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,700' rel='stylesheet'>
    <title>login_form</title>
    <link rel="shortcut icon" href="images/icons8-fenix-16.png" type="image/png">
</head>
<body>

<div class="cotn_principal">
    <div class="cont_centrar">

        <?php
        if($_COOKIE['user'] == ''):

            ?>

            <div class="cont_login">
                <div class="cont_info_log_sign_up">
                    <div class="col_md_login">
                        <div class="cont_ba_opcitiy">
                            <h2>LOGIN</h2>
                            <button class="btn_login" onclick="cambiar_login()">LOGIN
                            </button>
                        </div>
                    </div>
                    <div class="col_md_sign_up">
                        <div class="cont_ba_opcitiy">
                            <h2>SIGN UP</h2>
                            <button class="btn_sign_up" onclick="cambiar_sign_up()">SIGN UP
                            </button>
                        </div>
                    </div>
                </div>
                <div class="cont_back_info">
                    <div class="cont_img_back_grey">
                        <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
                    </div>
                </div>
                <div class="cont_forms" >
                    <div class="cont_img_back_">
                        <img src="https://images.unsplash.com/42/U7Fc1sy5SCUDIu4tlJY3_NY_by_PhilippHenzler_philmotion.de.jpg?ixlib=rb-0.3.5&q=50&fm=jpg&crop=entropy&s=7686972873678f32efaf2cd79671673d" alt="" />
                    </div>
                    <div class="cont_form_login">
                        <a href="#" onclick="ocultar_login_sign_up()" class="close"></a>
                        <h2>LOGIN</h2>
                        <form action="validation-form/login.php" method="post">
                            <input class="sign_up_form" type="text" id="login" name="login" placeholder="Login" />
                            <input class="sign_up_form" type="password" id="pass" name="pass" placeholder="Password" />
                            <button class="btn_login" onclick="cambiar_login()" type="submit">LOGIN
                            </button>
                        </form>
                    </div>
                    <div class="cont_form_sign_up">
                        <a href="#" onclick="ocultar_login_sign_up()" class="close"></a>
                        <h2>SIGN UP</h2>
                        <form action="validation-form/check.php" method="post">
                            <input class="sign_up_form" name="mail" id="mail" type="text" placeholder="Email">
                            <input class="sign_up_form" name="login" id="login"  type="text" placeholder="Login">
                            <input class="sign_up_form" name="pass" id="pass"  type="password" placeholder="Password">
                            <button class="btn_sign_up" onclick="cambiar_sign_up()" id="btn_sign_up" type="submit">SIGN UP
                            </button>
                        </form>
                    </div>
                </div>
            </div>


        <?php
        else:
            header('Location: main.php');
            ?>
        <?php
        endif;
        ?>

    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="js/app.js"></script>

</body>
</html>