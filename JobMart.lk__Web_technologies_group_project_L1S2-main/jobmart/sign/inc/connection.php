<?php
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'jobmart';

    $connection = mysqli_connect('localhost' , 'root' , '' , 'jobmart');

    if(mysqli_connect_errno()){
        die('Database connection failed' . mysqli_connect_error());
    }
?>