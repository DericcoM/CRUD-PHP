<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $mail = filter_var(trim($_POST['mail']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    if(mb_strlen($mail) < 5 || mb_strlen($mail) > 90) {
        echo "Недопустимая длинна почты";
        exit();
    } else if(mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "Недопустимая длинна логина";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 10) {
        echo "Недопустимая длинна пароля (от 4 до 10)";
        exit();
    }
    // Проверка логина и mail на идентичность
    $mysql1 = new mysqli('localhost', 'root', 'root', 'register-bd');
    $result = $mysql1->query("SELECT * FROM `users` WHERE login = '{$_REQUEST['login']}'");

    $user = [];
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = $row;

            if ($user['login'] ===  $_REQUEST['login']) {
                $loginExist = $_REQUEST['login'];

                echo "Пользователь с таким логином сущетвует";
                exit();
            }
        }
    }

    $mysql2 = new mysqli('localhost', 'root', 'root', 'register-bd');
    $result = $mysql2->query("SELECT * FROM `users` WHERE mail = '{$_REQUEST['mail']}'");

    $user = [];
    if($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $user = $row;

            if ($user['mail'] ===  $_REQUEST['mail']) {
                $mailExist = $_REQUEST['mail'];
                echo "Пользователь с такой почтой сущетвует";
                exit();
            }
        }

    }
    // Шифр пароля
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    //Зарегистрировать
    $mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
    $mysql->query("INSERT INTO `users` (`mail`, `login`, `pass`) VALUES ('$mail', '$login', '$pass')");

    $result = $mysql1->query("SELECT * FROM `users` WHERE login = '{$_REQUEST['login']}'");
    $row = $result->fetch_assoc();
    setcookie('user', $row['login'], time() + 7200, "/");

    $mysql->close();
    header('Location: /phoenix/main.php');

    ?>
