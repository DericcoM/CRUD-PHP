<?php
$post_id = filter_var(trim($_POST['id_comment']), FILTER_SANITIZE_STRING); // id поста
$comment = filter_var(trim($_POST['comment']), FILTER_SANITIZE_STRING); // comment

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$mysql_user = $mysql->query("SELECT * FROM `users` WHERE login = '{$_COOKIE['user']}'");
$mysql_user = $mysql_user->fetch_assoc();
$user_id = $mysql_user['id']; // id пользователя

$mysql1 = new mysqli('localhost', 'root', 'root', 'posts');
$mysql_comments = $mysql1->query("INSERT INTO `comments` (`post_id`, `user_id`, `comment`) VALUES ('$post_id', '$user_id', '$comment')");
header('Location: /phoenix/main.php');




