<?php
//  database  -->
    $db_server  = "127.0.0.1";
    $db_user    = "root";
    $db_pass    = "085231";
    $db_name    = "tododb";
    $conn       = mysqli_connect($db_server, $db_user, $db_pass,  $db_name);
    if($conn == false ){
        echo   "couldn't connect to the database";
    }else{
        echo "yo";
    }
?>