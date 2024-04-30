<?php
    $server ='localhost';
    $user ='root';
    $pass ='vertrigo';
    $database ='express';

    $conn = new mysqLi($server, $user, $pass, $database);

    if($conn)
    {
        mysqli_query($conn, "SET NAMES 'utf8' ");

    }
    else{
        echo 'Kết nối thất bại';
    }

?>