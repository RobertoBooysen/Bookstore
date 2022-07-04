<?php
include_once ('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            /*Internal Style sheet*/
            font-family: Arial;
            font-size: 17px;
            padding: 8px;
        }

        * {
            box-sizing: border-box;
        }

        .row {
            display: -ms-flexbox; /* IE10 */
            display: flex;
            -ms-flex-wrap: wrap; /* IE10 */
            flex-wrap: wrap;
            margin: 0 -16px;
        }

        .col-25 {
            -ms-flex: 35%; /* IE10 */
            flex: 35%;
        }

        .col-75 {
            -ms-flex: 45%; /* IE10 */
            flex: 45%;
        }

        .col-25,
        .col-75 {
            padding: 0 16px;
        }

        .container {
            background-color: #f2f2f2;
            padding: 5px 20px 15px 20px;
            border: 1px solid lightgrey;
            border-radius: 3px;
        }

        input[type=text] {
            width: 100%;
            margin-bottom: 20px;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        label {
            margin-bottom: 10px;
            display: block;
        }
        .btn {
            background-color: #04AA6D;
            color: white;
            padding: 12px;
            margin: 10px 0;
            border: none;
            width: 100%;
            border-radius: 3px;
            cursor: pointer;
            font-size: 17px;
        }

        a {
            color: #2196F3;
        }

        hr {
            border: 1px solid lightgrey;
        }

        span.price {
            float: right;
            color: grey;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
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
        form, .content {
            width: 100%;
            margin: 0px auto;
            padding: 20px;
            border: 1px solid #90EE90FF;
            background: white;
            border-radius: 0px 0px 10px 10px;
        }
        .input-group {
            margin: 10px 0px 10px 0px;
        }
        .input-group label {
            display: block;
            text-align: left;
            margin: 3px;
        }
        .input-group input {
            height: 30px;
            width: 93%;
            padding: 5px 10px;
            font-size: 16px;
            border-radius: 5px;
            border: 1px solid gray;
        }
        .btn {
            padding: 10px;
            font-size: 15px;
            color: white;
            background: #90EE90FF;
            border: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align: center">Checkout Form</h2>
<!--Order detail information-->
<div class="container">
    <h4 style="text-align: center">Order details</h4>
    <!--Displaying order details based on what the user added to the cart(Webslesson, 2016)-->
    <table class="col-25">
        <tr>
            <th width="35%">Item Name</th>
            <th width="5%">Quantity</th>
            <th width="25%">Price</th>
            <th width="35%">Total</th>
        </tr>
        <!--Displaying the item in the shopping cart in the form order details-->
        <?php
        if(!empty($_SESSION["shopping_cart"]))
        {
            $total = 0;
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                ?>
                <tr>
                    <td><?php echo $values["item_name"]; ?></td>
                    <td><?php echo $values["item_quantity"]; ?></td>
                    <td> R<?php echo $values["item_price"]; ?></td>
                    <td>R <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <!--Amount of items selected is multiplied by the quantity of items selected-->
                    <!--Displays the total-->
                </tr>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right"> R <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
            <?php
        }
        ?>
    </table>

    <br>
</div>
<div style="clear:both" class="col-25"></div>
<br />
<!--Styling of the checkout form, putting the form into a container-->
<div class="row">
    <div class="col-75">
        <div class="container">
            <form action="Checkout.php" method="post">
                <div class="input-group" >
                    <label>Full name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="input-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="input-group">
                    <label>Address</label>
                    <input type="address" name="address" class="form-control">
                </div>
                <div class="input-group">
                    <label>City</label>
                    <input type="city" name="city" class="form-control">
                </div>
                <div class="input-group">
                    <label>Zip</label>
                    <input type="zip" name="zip" class="form-control">
                </div>
                <div class="input-group">
                    <label>State</label>
                    <input type="state" name="state" class="form-control">
                </div>
                <input type="submit" class="btn btn-primary" name="checkout" value="Checkout">
            </form>
        </div>
    </div>
</div>

<?php
if(isset($_POST['checkout'])) {
    if(!empty($_SESSION["shopping_cart"]))
    {
        $total = 0;
        $item=0;
        $itemQ=0;
        $itemP=0;
        $itemName=0;
        $itemQuantity=0;
        $itemPrice=0;
        $totalP=0;
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            ?>
            <?php $item= $values["item_name"] ?>
            <?php $itemQ=$values["item_quantity"]?>
            <?php $itemP=$values["item_price"]?>
            <?php
            /*Getting shopping cart details to insert in to tblOrder*/
            $itemName=mysqli_real_escape_string($conn,$item);
            $itemQuantity=mysqli_real_escape_string($conn,$itemQ);
            $itemPrice=mysqli_real_escape_string($conn,$itemP);
            ?>
            <?php
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
            $totalP=mysqli_real_escape_string($conn,$total);
        }
    }
    //Receiving values from form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $zip=$_POST['zip'];
    $state=$_POST['state'];

    //Inserting into tblOrder with form information and cart details
    $sql = "INSERT INTO tblOrder (fullName,email,address,city,zip,state,itemName,quantity,price,total)
     VALUES ('$name','$email','$address','$city','$zip','$state','$itemName','$itemQuantity','$itemPrice','$totalP')";
    if (mysqli_query($conn, $sql)) {
        echo "New record has been added successfully !";
        echo '<script>window.location="OrderPlaced.php"</script>';
    } else {
        echo "Error: " . $sql . ":-" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
<!--JavaScript functions for the chat icon feature--->
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
</body>
</html>