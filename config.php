<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "social_media";
$users_table_name = "users";
$posts_table_name = "posts";
$users_columns = ["user_id int primary key", "email varchar(255) unique", "active boolean"];
$posts_columns = ["post_id int primary key", "author_id int", "title varchar(255)","content varchar(1000)", "posted date", "active boolean"];
$users_api_url = "https://jsonplaceholder.typicode.com/users/";
$posts_api_url = "https://jsonplaceholder.typicode.com/posts/";
?>