<?php

$post_id = filter_var(trim($_POST['post_id']), FILTER_SANITIZE_STRING);

$mysql = new mysqli('localhost', 'root', 'root', 'register-bd');
$mysql_user = $mysql->query("SELECT * FROM `users` WHERE login = '{$_COOKIE['user']}'");
$mysql_user = $mysql_user->fetch_assoc();
$user_id = $mysql_user['id'];

$mysql1 = new mysqli('localhost', 'root', 'root', 'posts');
$mysql_post = $mysql1->query("SELECT COUNT(*) as count FROM posts_like2 where id_post = $post_id ");
$mysql_post = $mysql_post->fetch_assoc();
$like_count = $mysql_post["count"];

$mysql2 = new mysqli('localhost', 'root', 'root', 'posts');
$mysql_date = $mysql2->query("SELECT * FROM posts_like2 WHERE id_post=$post_id AND id_user=$user_id");
$mysql_user = $mysql_date->fetch_assoc();


if($mysql_date -> num_rows > 0) {
    $like_count = $like_count - 1;

    $mysql2->query("DELETE FROM posts_like2 WHERE id_post = $post_id AND id_user = $user_id");
    $mysql1->query("UPDATE user_post SET likes = $like_count WHERE id = $post_id");
    header('Location: /phoenix/main.php');

} else {

    $mysqlLike = new mysqli('localhost', 'root', 'root', 'posts');
    $mysql_post_like = $mysqlLike->query("SELECT COUNT(*) as count FROM posts_dislike2 where id_post = $post_id ");
    $mysql_post_like = $mysql_post_like->fetch_assoc();
    $like_count_like = $mysql_post_like["count"];

    $mysql2_like = new mysqli('localhost', 'root', 'root', 'posts');
    $mysql_date_like = $mysql2_like->query("SELECT * FROM posts_dislike2 WHERE id_post=$post_id AND id_user=$user_id");

    if($mysql_date_like -> num_rows > 0) {
        $like_count_like = $like_count_like - 1;

        $mysql2_like->query("DELETE FROM posts_dislike2 WHERE id_post = $post_id AND id_user = $user_id");
        $mysqlLike->query("UPDATE user_post SET dislikes = $like_count_like WHERE id = $post_id");

        $like_count = $like_count + 1;

        $mysql2->query("INSERT INTO posts_like2 (id_post, id_user) VALUES ($post_id, $user_id)");
        $mysql1->query("UPDATE user_post SET likes = $like_count WHERE id = $post_id");
        header('Location: /phoenix/main.php');
    }
    else {
        $like_count = $like_count + 1;

        $mysql2->query("INSERT INTO posts_like2 (id_post, id_user) VALUES ($post_id, $user_id)");
        $mysql1->query("UPDATE user_post SET likes = $like_count WHERE id = $post_id");
        header('Location: /phoenix/main.php');
    }
}