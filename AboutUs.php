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

    h2
    {
        text-align: center;
        color: #27B0E6FF;
    }

    p
    {
        text-align: center;
    }

    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
    }
    div {
        display: flex;
        justify-content: center;
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


<h1 style="text-align: center;"><strong>About Us</strong></h1>
<div>
<p style="width: 300px;   border: 15px solid #90EE90FF;   padding: 50px;   margin: 20px;"> <b> WELCOME TO BROWSER VARSITY COLLEGE BOOKS!</b>Our website provides Varsity College IT students the ability to purchase and sell
    second-hand textbooks amongst one another.We ensure that all books purchased from our
    website is in good condition. We sincerely look forward to making your studies a little easier, by
    saving you both time and money!
</p>
</div>
<br><br>

<h2 ><i><u>OUR MISSION</u></i></h2>

<div>
<p style="width: 300px;   border: 15px solid #90EE90FF;   padding: 50px;   margin: 20px;">BVCB main mission is to ensure students get reliable used textbooks at reasonable prices.
    We also strive to save students time and money by having updated information regarding new editions
    of textbooks being added to the system. We aspire to put smiles on our customers faces.Our main aim
    is to make sure that the website experience is pleasant for all users, as well as being able  to move with ease
    throughout the website.
</p>
</div>
<img src="Images/BookGirl.jpg" alt="BookGirl" style="width: 440px; height:450px"><br>

<h2><i><u>OUR VISION</u></i></h2>
<div>
<p style="width: 300px;   border: 15px solid #90EE90FF;   padding: 50px;   margin: 20px;">In the next upcoming years BVCB aspires to be able to source textbooks to all courses within Varsity College,
    so that not only IT students can access the website but all faculties within VC.This will allow VC students
    to have their own personal second-hand textbook online store.
    Our vision is to allow students to be satisfied with the purchase and selling of their textbooks.
</p>
</div>
<img src="Images/ColoufulBooks.jpg" alt="ColoufulBooks" style="width: 440px; height:400px"><br>


<h2><i><u>OUR GOALS</u></i></h2>
<div>
<p style="width: 300px;   border: 15px solid #90EE90FF;   padding: 50px;   margin: 20px;">BVCB wants to achieve the goals of satisfying all the customers needs on the website
    as well-being user-friendly.The main goal is for growth within the website so that more students
    can register on the website and allow BVCB to be their number one option when looking
    for second-hand textbooks to purchase their yearly books from.The aim is to see all students succeeding
    at the end of their course with the adequate books and information.
</p>
</div>
<img src="Images/Graduation.jpg" alt="graduation" style="width: 440px; height:400px"><br>

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