<?php

$text = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING);
$user = $_COOKIE['user'];
$image = addslashes(file_get_contents($_FILES['file']['tmp_name']));
//addslashes  Возвращает строку с обратным слешом перед символами, которые нужно экранировать.
//file_get_contents() возвращает содержимое файла в строке, начиная с указанного смещения offset и до length байт

$mysql_posts = new mysqli('localhost', 'root', 'root', 'posts');
$mysql_posts->query("INSERT INTO `user_post` (`user`,`text`, `likes`, `dislikes`, `image`) VALUES ('$user', '$text', '0', '0', '$image')");

    header('Location: /phoenix/main.php');
?>
