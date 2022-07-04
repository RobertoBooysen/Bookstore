<?php
include_once ('DBConn.php');
?>
<?php
if(isset($_GET['clear'])){
    $_SESSION['shopping_cart']=array();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<style>
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
</style>
<body>

<div class="topnav" id="myTopnav">
    <img src="Images/BVCB Logo.jpg" class="logo">
    <a href="Home.php" >Home</a>
    <a href="Selling.php">Selling</a>
    <a href="AboutUs.php">About Us</a>
    <a href="ContactUs.php">Contact Us</a>
    <div class="dropdown">
        <button class="dropbtn">
            <i class="fa fa-fw fa-user"></i>
        </button>
        <div class="dropdown-content">
            <a href="Register.php">Register</a>
            <a href="Index.php">Login</a>
            <a href="Admin.php">Admin</a>
            <a href="Index.php?logout='1'" style="color: black;">Logout</a>
        </div>
    </div>
    <a href="ShoppingCart.php" class="fa fa-shopping-cart">  <span class="badge">
    <!--Keeping track of orders in cart-->
    <?php
    if(isset($_SESSION["shopping_cart"]))
    {
        echo count($_SESSION["shopping_cart"]);
    }
    else
    {
        echo '0';
    }
    ?> </span></a>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction()">&#9776;</a>
</div>

<div style="clear:both"></div>
<br />
<h1 style="text-align: center">Order Details</h1>
<div>
    <!--Displaying order details based on what the user added to the cart(Webslesson, 2016)-->
    <table>
        <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
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
                    <td>R <?php echo $values["item_price"]; ?></td>
                    <td>R <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                    <td><a href="Home.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="btn">Remove</span></a></td><!--Button to remove item from cart(Webslesson, 2016)-->
                </tr>
                <?php
                $total = $total + ($values["item_quantity"] * $values["item_price"]);
            }
            ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">R <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
            <?php
        }
        ?>
    </table>
    <p style="padding-left: 1392px">
        <a href='<?php echo $_SERVER['PHP_SELF']; ?>?clear=1' class="btn" style="padding: 5px">Clear Cart</a>
    </p>

    <p style="padding-left: 1340px">
        <a href="Home.php" class="btn" style="padding: 5px">Continue Shopping </a>
    </p>

    <p style="padding-left: 1330px">
        <a href="Checkout.php" class="btn" style="padding: 5px">Continue to checkout</a>
    </p>

    <br><br><br><br><br><br><br><br><br><br><br>
</div>
</div>

<!--Chat icon feature-->
<button class="open-button" onclick="openForm()">Chat</button>
<div class="chat-popup" id="myForm">
    <form action="mailto:browservcbooks@gmail.com" class="form-container" method="post" enctype="text/plain">
        <h1>Chat</h1>

        <label for="msg"><b>Message</b></label>
        <textarea placeholder="How can we help?" name="msg" required></textarea>

        <button type="submit" class="btn">Send</button>
        <button type="button" class="btn cancel" onclick="closeForm()">Close</button>
    </form>
</div>
<!--JavaScript functions for the chat icon feature--->
<script>
    function openForm() {
        document.getElementById("myForm").style.display = "block";
    }

    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>

<!--Adding JavaScript to page to make Top Navigation bar responsive(W3Schools,2022)-->
<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>
<footer>
    <div class="center">
        <div class="row"> <!--(W3Schools,2021)-->
            <div class="column">
                <a href="https://quickpay.net/payment-methods/maestro/" target="blank"><img src="Images/Maestro.jpg" alt="Maestro logo" style="width:15%"></a>
            </div>
            <div class="column">
                <a href="http://www.paypal.com/" target="blank"><img src="Images/PayPal.jpg" alt="PayPal logo" style="width:20%"></a>
            </div>
            <div class="column">
                <a href="https://usa.visa.com/support/consumer/debit-cards.html" target="blank"><img src="Images/Visa.jpg" alt="Visa logo" style="width:20%"></a>
            </div>
        </div>
    </div>
    <div class="center">
        <div class="row"> <!--(W3Schools,2021)-->
            <div class="column">
                <a href="https://www.facebook.com/" target="blank"><img src="Images/Facebook.jpg" alt="facebook logo" style="width:15%"></a>
            </div>
            <div class="column">
                <a href="https://www.instagram.com/" target="blank"><img src="Images/Instagram.jpg" alt="Instagram logo" style="width:20%"></a>
            </div>
            <div class="column">
                <a href="https://twitter.com/" target="blank"><img src="Images/Twitter.jpg" alt="Twitter logo" style="width:20%"></a>
            </div>
        </div>
    </div>
    <p style="color: black">@2022 Browser VC Books</p><br>
</footer>
</body>
</html>