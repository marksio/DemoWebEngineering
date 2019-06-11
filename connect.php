<?php
    define('DB_SERVER', "127.0.0.1");
    define('DB_USERNAME',"root");
    define('DB_PASSWORD', "");
    define('DB_DATABASE', "bookstore");
    define('DB_DBPORT', "3306");

    // procedural method
    $connect = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE,DB_DBPORT) or die("Unable connect to DB : [" . mysqli_error($connect) . "]"); 
    
    // Connection error checking with object method
    if($connect->connect_error){
        die("Connection failed: " . $connect->connect_error);
    }else{
        // echo "<i>[DB Connected!] - testing purpose</i>";
    }

?>