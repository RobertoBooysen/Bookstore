<?php
include_once ('DBConn.php');
include_once ('loadBookStore.php');

$bookName="";
$bookImage="";
$bookPrice = "";
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<style>
    * {
        margin: 0px;
        padding: 0px;
    }
    body {
        font-size: 120%;
        background: #F8F8FF;
    }

    .header {
        width: 30%;
        margin: 50px auto 0px;
        color: white;
        background: #90EE90FF;
        text-align: center;
        border: 1px solid #B0C4DE;
        border-bottom: none;
        border-radius: 10px 10px 0px 0px;
        padding: 20px;
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
    p.outset {border-style: outset;}
    .btn {
        padding: 10px;
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

<br>
<div class="header">
    <h2 style="text-align: center; "><strong>Book Information</strong></h2>
</div>
<form method="post" action="Selling.php" class="form" enctype="multipart/form-data" style="  width: 30%;margin: 0px auto;padding: 20px;border: 1px solid #90EE90FF;background: white;border-radius: 0px 0px 10px 10px;">
    <div class="input-group">
        <label>Name of book:</label>
        <input type="text" placeholder="Name of book" required name="nameOfBook">
    </div>
    <div class="input-group">
        <label>Upload image of book:</label>
        <input type="file"  name="image"  value=""  >
    </div>
    <div class="input-group">
        <label>Price:</label>
        <input type="text" placeholder="Price" required name="price">
    </div>
    <div>
        <p class="outset"><i>Textbook Condition Guidelines</i><br>
            1.The textbook that you are selling should not have any:<br>
            -heat damage<br>
            -torn or ripped covers<br>
            -writing on or within textbook<br>
            -previously rented copies<br>
            -promotional copies<br>
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="upload_book">Upload book</button>
    </div>
</form>
<br><br>
<?php
if (isset($_POST['upload_book'])) {
    //The $filename is a name used to uniquely identify a computer file stored in a file system.(GeeksforGeeks, 2022)

    //The $tempname is used to copy the original name of the file which is uploaded to the database,
    // as the temp name where the image is stored after upload.(GeeksforGeeks, 2022)

    //$folder defines the path of the uploaded image into the database to the folder where you want to be stored.
    // The “./image/” is the folder name where the image is to be saved after the upload.
    // And the $filename is used for fetching or uploading the file.(GeeksforGeeks, 2022)

    $filename = $_FILES["image"]["name"];
    $tempname = $_FILES["image"]["tmp_name"];
    $folder = "./Images/" . $filename;

    // receive all input values from the form
    $bookName = mysqli_real_escape_string($conn, $_REQUEST['nameOfBook']);
    $bookPrice = mysqli_real_escape_string($conn, $_REQUEST['price']);

    //Inserting into tblBooks based on the users input(GeeksforGeeks, 2022)
    $query = "INSERT INTO tblBooks (`name`,`image`,`price`) 
  			  VALUES('$bookName','$filename','$bookPrice')";

    mysqli_query($conn, $query);

    // Moving the uploaded image into the folder: Images(GeeksforGeeks, 2022)
    if (move_uploaded_file($tempname, $folder)) {
        echo '<script> alert("Image uploaded successfully!")</script>';
    } else {
        echo '<script> alert(" Failed to upload image")</script>';
    }

}
?>

<br><br>

<!--Chat icon feature-->
<button class="open-button" onclick="openForm()">Chat</button>
<div class="chat-popup" id="myForm">
    <form action="mailto:browservcbooks@gmail.com" class="form-container">
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