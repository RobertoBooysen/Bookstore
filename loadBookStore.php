<?php
include_once ('DBConn.php');

//creating tables
//CreateTable($conn);
//CreateTable2($conn);
//CreateTable3($conn);
//CreateTable4($conn);

function CreateTable($conn)
{

//sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `tblUser` ("

        . "  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"

        . "  `name` varchar(100) NOT NULL,"

        . "  `studentNumber` varchar(100) NOT NULL,"

        . "  `username` varchar(100) NOT NULL,"

        . "  `password` varchar(100) NOT NULL,"

        . "  `status` varchar(100) NOT NULL DEFAULT 'pending'"

        . ") ";

    //If the database tables are created successfully(W3Schools, 2022)
    //A message will be displayed stating it was successfully created(W3Schools, 2022)
    //If the database tables are not created successfully(W3Schools, 2022)
    //A error message will be displayed(W3Schools, 2022)
    if ($conn->query($sql) === TRUE) {
        echo "Table tblUser created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
function CreateTable2($conn)
{

    //sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `tblBooks` ("

        . "  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"

        . "  `name` varchar(255) NOT NULL,"

        . "  `image` varchar(255) NOT NULL,"

        ."`price` double(10,2) NOT NULL"

        . ");";

    //If the database tables are created successfully(W3Schools, 2022)
    //A message will be displayed stating it was successfully created(W3Schools, 2022)
    //If the database tables are not created successfully(W3Schools, 2022)
    //A error message will be displayed(W3Schools, 2022)
    if ($conn->query($sql) === TRUE) {
        echo "Table tblBooks created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
function CreateTable3($conn)
{

    //sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `tblAdmin` ("

        . "  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"

        . "  `name` varchar(100) NOT NULL,"

        . "  `adminNumber` varchar(100) NOT NULL,"

        . "  `adminUsername` varchar(100) NOT NULL,"

        . "  `password` varchar(100) NOT NULL"

        . ") ENGINE=InnoDB DEFAULT CHARSET=latin1;"; //Removes grammatical mistakes

    //If the database tables are created successfully(W3Schools, 2022)
    //A message will be displayed stating it was successfully created(W3Schools, 2022)
    //If the database tables are not created successfully(W3Schools, 2022)
    //A error message will be displayed(W3Schools, 2022)
    if ($conn->query($sql) === TRUE) {
        echo "Table tblAdmin created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
function CreateTable4($conn)
{

    //sql to create table
    $sql = "CREATE TABLE IF NOT EXISTS `tblOrder` ("

        . "  `orderNumber` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,"

        . "  `fullName` varchar(100) NOT NULL,"

        . "  `email` varchar(100) NOT NULL,"

        . "  `address` varchar(100) NOT NULL,"

        . "  `city` varchar(100) NOT NULL,"

        . "  `zip` int(10) NOT NULL,"

        . "  `state` varchar(100) NOT NULL,"

        . "  `itemName` varchar(100) NOT NULL,"

        . "  `quantity` int(10) NOT NULL,"

        . "  `price` double(10,2) NOT NULL,"

        . "  `total` double(10,2) NOT NULL"

        . ") ENGINE=InnoDB DEFAULT CHARSET=latin1;"; //Removes grammatical mistakes

    //If the database tables are created successfully(W3Schools, 2022)
    //A message will be displayed stating it was successfully created(W3Schools, 2022)
    //If the database tables are not created successfully(W3Schools, 2022)
    //A error message will be displayed(W3Schools, 2022)
    if ($conn->query($sql) === TRUE) {
        echo "Table tblOrder created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>
