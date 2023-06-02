<?php
    // $host = "localhost",
    // $user = "richclub9",
    // $pw = "forever0",
    // $db = "richclub9",
    // $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf-8");

    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     echo "Database Connect True"
    // }
?>

<?php
    // phpinfo()
    $host = "localhost";
    $user = "root";
    $pw = "root";
    $db = "phpClass";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "Database Connect false";
    } else {
        // echo "Database Connect True";
    }
?>

<?php
    // phpinfo()
    // $host = "localhost";
    // $user = "dkzmfla1215";
    // $pw = "dkfkdkfk*963";
    // $db = "dkzmfla1215";
    // $connect = new mysqli($host, $user, $pw, $db);
    // $connect -> set_charset("utf-8");

    // if(mysqli_connect_errno()){
    //     echo "Database Connect false";
    // } else {
    //     // echo "Database Connect True";
    // }
?>