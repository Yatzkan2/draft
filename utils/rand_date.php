<?php
function rand_date(){
    $strt = strtotime("100 years ago");
    $end = strtotime("today");
    return date("Y-m-d",mt_rand($strt, $end));  
}
?>