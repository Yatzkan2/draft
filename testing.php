<?php
    include_once("./config.php");
    include_once("./utils.php");

    $db_obj = new Database(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    $db_obj->delete_row(USERS_TABLE_NAME, "user_id = 10");
    

?>