<?php
//creating the connection to the database(W3Schools,2022)
session_start();

    $servername = "localhost";
    $user_name = "root";
    $password = "";
    $dbname = "bookstore";

    // Create connection(W3Schools,2022)
    $conn = new mysqli($servername, $user_name, $password, $dbname);

    // Check connection(W3Schools,2022)
    if ($conn->connect_error) {
        //die("Connection failed: " . $conn->connect_error);
    }
    //echo "Connected successfully <br>";

?>
