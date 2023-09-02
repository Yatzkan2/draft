<?php

function api_call($apiurl = ""){

    //$apiurl = "https://jsonplaceholder.typicode.com/posts";
    
    $curl = curl_init();
    
    curl_setopt($curl, CURLOPT_URL, $apiurl);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    
    $response = curl_exec($curl);
    
    if(curl_errno($curl)){
        echo curl_error($curl);
    } 
    else {
        curl_close($curl);
        return $response;
    }
}

// $res=api_call("https://jsonplaceholder.typicode.com/posts/");
// $parsed = json_decode($res);
// // // echo "<pre>";
// // // print_r($parsed);
// // // echo "</pre>";
// $i = 0;
// foreach($parsed as $key => $row){
//     echo $key ."<br>";
//     echo "<pre>";
//     print_r($row);
//     echo "</pre>";
//     echo "<br><br><br><br><br>";
//     $i++;
// }
?>
    
