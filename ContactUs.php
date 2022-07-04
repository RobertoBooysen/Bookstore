<?php
include_once ('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<style>
    .container {
        position: relative;
        width: 100%;
        overflow: hidden;
        padding-top: 35%; /* 16:9 Aspect Ratio */
    }

    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
        border: none;
    }
</style>

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

<h1 style="text-align: center;"><strong>Contact Us</strong></h1>

<p><?php echo "We enjoy hearing from our customers. Please send us an email if you have any recomendations for how we can improve your experience on our site."?></p>
<p><?php echo "Please be aware due to COVID 19, we are only able to staff a restricted number of phone lines."?></p>


<p><a href="mailto:browservcbooks@gmail.com" class="fa fa-envelope" style="color: black">  browservcbooks@gmail.com</a></p>
<p><a href="tel:0419586325" class="fa fa-phone" style="color: black">  0419586325</a></p> <br><br>

<div class="container">
<iframe class="responsive-iframe" src="https://docs.google.com/forms/d/e/1FAIpQLScFU4oW38chodc73berOpbTot1ISnZRtzgMoaGdH-gVSa2DvA/viewform?embedded=true" width="640" height="407" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
</div>

<h2 style="text-align: center;">Browser VC Books Address:</h2>

<div class="container">
    <iframe class="responsive-iframe" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3309.5926978437083!2d25.575261915033625!3d-33.95160248063332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1e7ad3d26d86361b%3A0xf546d9332870dab0!2sThe%20IIE&#39;s%20Varsity%20College%20-%20Nelson%20Mandela%20Bay!5e0!3m2!1sen!2sza!4v1651150440494!5m2!1sen!2sza" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<br><br>

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