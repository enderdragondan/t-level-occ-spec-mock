<?php

function getDB()
{
    $db_user = "db_user";
    $db_pass = "password";
    $db_name = "healthadvice";
    $db_host = "localhost";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    if ($conn) {
        return $conn;
    } else {
        die("Database Connection Failed: " . mysqli_connect_error());
    }
}