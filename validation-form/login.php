
<?php
    $connect = mysqli_connect('localhost', 'root', 'root', 'register-bd');

    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);


    $check_user = mysqli_query($connect, "SELECT `login`, `pass` FROM `users` WHERE `login` = '$login'");


    if ($check_user -> num_rows == 1) {
        $row = $check_user -> fetch_assoc();
        if (password_verify($_POST['pass'], $row['pass'])) {
            setcookie('user', $row['login'], time() + 7200, "/");
            header('Location: /phoenix/index.php');
        } else {
            header('Location: /phoenix/no_user.html');
        }
    } else {
            header('Location: /phoenix/no_user.html');
    }
