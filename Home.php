<?php
include_once ('DBConn.php');

if(isset($_POST["add_to_cart"]))
{
    //if statement for the  session variable named shopping cart to check if there any data in it(Webslesson, 2016)
    if(isset($_SESSION["shopping_cart"]))
    {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if(!in_array($_GET["id"], $item_array_id))
        {
            //will count the number element in an array and store into count and store it in to count variable(Webslesson, 2016)
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        }
        else
        {
            echo '<script>alert("Item Already Added ")</script>';//displaying message if the same add to cart button is pressed more than once(Webslesson, 2016)
            echo '<script>window.location="Home.php"</script>';
        }
    }
    else
    {
        $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_quantity'          =>     $_POST["quantity"]
        );
        //storing all details to shopping cart
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
//To remove item from order details(Webslesson, 2016)
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="ShoppingCart.php"</script>';
            }
        }
    }
}
//Session variables to make sure user can't navigate to home page
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: Index.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> <!--script link(Webslesson, 2016)-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script><!--script link(Webslesson, 2016)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /><!--css link(Webslesson, 2016)-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<style>
    .button {
        background-color: #90EE90FF; /* Green */
        border: none;
        color: white;
        padding: 10px 26px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
    }
    .divClass{
        background-repeat:no-repeat;
        background-size:cover;
        width:150px;
        height:150px;
    }
    /*responsiveness for texts*/
    .responsive {
        background: url('https://s20.postimg.org/o09gf7fvx/bag.jpg') no-repeat center top;
        background-size: contain;
        color: #3484ad;
        width: 100%;
        height: 100px;
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
    <a href="ShoppingCart.php" class="fa fa-shopping-cart">  <span>
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

<div class="container" style="width: 60%; aspect-ratio: 100 / 29;">
    <h1 align="center"><strong>Browser VC Books</strong></h1><br />
    <?php

    $query = "SELECT * FROM tblBooks ORDER BY id ASC";//displaying products from database by using a select statement in ascending order(Webslesson, 2016)
    $result = mysqli_query($conn, $query);//This function will execute  mysqli(Webslesson, 2016)
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result)) //if it is greater than 0 it will fetch the data and storing it into row(Webslesson, 2016)
        {
            ?>
            <div class="col-md-4">
                <form method="post" action="Home.php?action=add&id=<?php echo $row["id"]; ?>"  style="font-size: 20px;">
                    <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:18px;" align="center">
                        <img src="./Images/<?php echo $row["image"]; ?>" class="divClass" style=" vertical-align: middle;"/><br><!--displaying image from folder and database(Webslesson, 2016)-->
                        <h4 class="responsive"><?php echo $row["name"]; ?></h4><!--displaying name from database(Webslesson, 2016)-->
                        <h4 class="text-danger">R <?php echo $row["price"]; ?></h4><!--displaying price from database(Webslesson, 2016)-->
                        <input type="text" name="quantity" class="form-control" value="1" /><!--quantity textbox that allows a user to have more of one of the same product(Webslesson, 2016)-->
                        <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                        <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="button" value="Add to Cart" onclick="addToCart()" /> <!--add to cart option-->
                    </div>
                </form>
                <br><br>
            </div>
            <?php
        }
    }
    ?>
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
<!--JavaScript function to display sell price when--->
<script>
    // AddToCart button is clicked
    function addToCart() {
        <?php
        $query1 = "SELECT * FROM tblBooks";//displaying products from database by using a select statement in ascending order(Webslesson, 2016)
        $result = mysqli_query($conn, $query1);//This function will execute  mysqli(Webslesson, 2016)

        if(!empty($_SESSION["shopping_cart"])) {
            foreach ($_SESSION["shopping_cart"] as $key => $value) {

                $msg = $value["item_price"];

            }
        }
        ?>
    }
    // display the price in popup
    alert("Item added to cart, this book sell price is: R" +  <?php echo $msg; ?>);
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

