<?php
    $server = "localhost:3307";
    $username = "root";
    $password = "";
    $database = "moviedb";

    echo $database;

    $conn = mysqli_connect($server, $username, $password, $database);

    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>
