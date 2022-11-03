<?php
session_start();
function DBconnection() {

    //database connection properties
    $host = "localhost";
    $user = "root";
    $pass = "";
    $database = "mobileshop";

    //connection
    $conn = null;
    $conn = mysqli_connect($host, $user, $pass);

    //create Database
    $sql = "CREATE DATABASE IF NOT EXISTS $database";
    if (mysqli_query($conn, $sql)) {
        $conn = mysqli_connect($host, $user, $pass, $database);
        return $conn;
    } else {
        echo "Error while creating database".mysqli_errno($conn);
        return;
    }
}


