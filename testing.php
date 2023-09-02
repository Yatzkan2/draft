<?php
// include_once("class_Database.php");
// include_once("config.php");



// $tablename = "users";
// $columns = ["id int primary key", "name varchar(20)", "email varchar(30) unique"];
//Database::create_db($dbname,$servername, $username);
// $mydb = new Database($servername, $username, $password, $dbname);
//$mydb->create_table($tablename, $columns);

// $fields = ["id", "name", "email"];
// $values = [55, "'lady'", "'dogy@email.dog'"];
// $mydb->insert($tablename,$fields, $values);

//$mydb->delete_table($tablename);
//$mydb->update($tablename, "name", "'buffy'", "name = 'yair'");

//$mydb->select($tablename);




//echo "'".date("Y-m-d")."'";
function rand_date(){
    $strt = strtotime("100 years ago");
    $end = strtotime("today");
    return date("Y-m-d",mt_rand($strt, $end));  
}

echo rand_date();
?>