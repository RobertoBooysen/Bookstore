<?php
include 'DBConn.php';

$sql = "SELECT id, name, username FROM tblUser";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "tblUser exist";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["username"]. "<br>";
    }
} else {
    echo "tblUser doesn't exist";
}



?>
