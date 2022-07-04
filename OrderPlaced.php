<?php
include_once ('DBConn.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="CSS/style.css">
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
        .button:hover {
            background-color:#27B0E6FF; /* Blue*/
            color: white;
        }
        div{
            text-align: center;
        }
        body, html {
            height: 100%;
        }

        * {
            box-sizing: border-box;
        }

        .bg-image {
            /* The image used */
            background-image: url("Images/Background.jpg");

            /* Add the blur effect */
            filter: blur(8px);
            -webkit-filter: blur(8px);

            /* Full height */
            height: 100%;

            /* Center and scale the image nicely */
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        /* Position text in the middle of the page/image */
        .bg-text {
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0, 0.4); /* Black w/opacity/see-through */
            color: white;
            font-weight: bold;
            border: 3px solid #f1f1f1;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 2;
            width: 80%;
            padding: 20px;
            text-align: center;
        }
    </style>
    <div class="bg-image"></div>
    <div class="bg-text">
        <h1 style="color: black";><b>Your Order Has Been Placed</b></h1>
        <br>
        <p>Thank you for ordering with us, we'll contact you by email with your order details.</p>
        <br>
        <p>
            <a onclick="clearCart()" href="Index.php" class="button">Continue to shop</a>

        </p>

        <p>

            <a href="ViewPurchase.php" class="button">View Purchase history</a>
        </p>

        <!--Script function to clear cart once continue to shop button is clicked(W3School,2022)-->
        <script>
            function clearCart(){
                <?php
                    unset($_SESSION["shopping_cart"]);
                ?>
            }
        </script>
    </div>
</html>
</head>