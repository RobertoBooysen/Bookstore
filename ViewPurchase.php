<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 101.69%;
        }

        th, td {
            text-align: center;
            padding: 8px;
        }

        tr:nth-child(even){background-color: #f2f2f2}

        th {
            background-color: #90EE90FF;
            color: white;
        }

        .btn {
            padding: 5px 12px;
            font-size: 15px;
            color: white;
            background: #90EE90FF;
            border: none;
            border-radius: 5px;
        }
        .header {
            width: 100%;
            margin: 50px auto 0px;
            color: white;
            background: #90EE90FF;
            text-align: center;
            border: 1px solid #B0C4DE;
            border-bottom: none;
            border-radius: 10px 10px 0px 0px;

        }
    </style>
</head>
<div class="header"><!--The header is allocated on top of the form(CodeWithAwa, 2022)-->
    <h1>Purchase History:</h1>
</div>

<body>
<?php
include_once ('DBConn.php');
$sql = "SELECT orderNumber, fullName , email,address,city,zip,state, itemName, quantity, price,total FROM tblOrder";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $query = "SELECT orderNumber, fullName , email,address,city,zip,state, itemName, quantity, price,total FROM tblOrder";
    $result = $conn->query($query);
    echo "<table><tr><th>Order Number</th><th>Full name</th><th>Email</th><th>Address</th><th>City</th><th>Zip</th>
                     <th>State</th><th>Item name</th><th>Quantity</th><th>Price</th><th>Total</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["orderNumber"]."</td><td>" . $row["fullName"]."</td><td> "    . $row["email"].     " </td><td>" . $row["address"]."</td><td> "
            . $row["city"]."</td><td> "        . $row["zip"]."</td><td> "        . $row["state"]."</td><td> "
            . $row["itemName"]."</td><td> "    . $row["quantity"]." </td><td>"   . $row["price"]."</td><td> " . $row["total"]."</td><td> " ;
    }
    echo "</table>";
} else {
    echo "0 results";
}
// SQL query to find the total of all purchases
$sql = "SELECT count(*) FROM tblOrder ";
$result = $conn->query($sql);

// Display total of all purchases
while($row = mysqli_fetch_array($result)) {
    echo "<strong>Total of all purchases: </strong> ". $row['count(*)'];
    echo "<br />";
}
$conn->close();
?>

<!--Button to return to home page(W3Schools,2022)-->
<p style="padding-left: 1380px">
    <a onclick="clearCart()" href="Home.php" class="btn" style="padding: 5px">Return to homepage </a>
</p>
<!--Script function to clear cart once return to home page button is clicked button is clicked(W3School,2022)-->
<script>
    function clearCart(){
        <?php
        unset($_SESSION["shopping_cart"]);
        ?>
    }
</script>
</body>
</html>
