<?php
    include_once("api_call.php");
    include_once("class_Database.php");
    include_once("config.php");
    include_once("./utils/rand_date.php");
   
    $res=api_call($users_api_url);
    $parsed_users = json_decode($res);

    $res=api_call($posts_api_url);
    $parsed_posts = json_decode($res);

    //create database 
    Database::create_db($dbname,$servername,$username,$password);
    //connect to database
    $db_obj = new Database($servername, $username, $password, $dbname);
    //create tables
    $db_obj->create_table($users_table_name, $users_columns);
    $db_obj->create_table($posts_table_name, $posts_columns);
    //insert rows
    
    foreach ($parsed_users as $index => $row) {
        $db_obj->insert($users_table_name, 
            ["user_id", "email", "active"], 
            [$row->id, "'".$row->email."'", rand(0, 1)]
        );
        //echo "$row->id $row->email" . rand(0, 1);
        if ($index > 10) {
            break;
        }
    }
    
    foreach ($parsed_posts as $index => $row) {
        $db_obj->insert(
            $posts_table_name,
            ["post_id", "author_id", "title", "content", "posted", "active"],
            [$row->id, $row->userId, "'".$row->title."'", "'".$row->body."'", "'".rand_date()."'", rand(0, 1)]
        );
        if ($index > 20) {
            break;
        }
    }
    
    

    


    // foreach($parsed as $user) {
    //     echo $user['id'];
    //     echo "<br>"; 
    // }
    

    
    
    // echo "<pre>";
    //     print_r($parsed);
    // echo "</pre>";
?>