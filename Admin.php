<?php
include('DBConn.php');
$errors = array();
// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
    $adminNumber = mysqli_real_escape_string($conn, $_POST['adminNumber']);
    $adminUsername = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //field that requires users to enter in their information
    if (empty($adminNumber)) {
        array_push($errors, "Admin number is required");
    }
    if (empty($adminUsername)) {
        array_push($errors, "Admin username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    //if there are no errors it will select from tblAdmin for the admin to login
    if (count($errors) == 0) {
        $password = md5($password);//Encrypt password before inserting into the database
        $query = "SELECT * FROM tblAdmin WHERE adminNumber='$adminNumber'AND username='$adminUsername' AND password='$password'";
        $results = mysqli_query($conn, $query);
        if (mysqli_num_rows($results) == 1) {
            $_SESSION['admin_number'] = $adminNumber;
            $_SESSION['admin_username'] = $adminUsername;
            $_SESSION['success'] = "You are now logged in";
            header('location: Home.php');
        } else {// an error message will display if the incorrect information is inserted
            array_push($errors, "Wrong admin number/admin username/password combination");
        }
    }
}
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
    form, .content {
        width: 30%;
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

<div class="header">
    <h2>Admin Login</h2>
</div>

<!--The Admin Login form goes to the Admin Home page once the user has selected Register -->
<form method="post" action="AdminHome.php">
    <?php include('Errors.php'); ?>
    <div class="input-group">
        <label>Admin number</label>
        <input type="text" placeholder="Admin Number" required name="admin_number" >
    </div>
    <div class="input-group">
        <label>Admin username</label>
        <input type="text" placeholder=" username@vcbb.com" required name="admin_username" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" placeholder="Password" required name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_admin">Login</button>
    </div>

    <!--If they don't have an account yet, they can register as an admin member-->
    <p>
        Not yet an admin member? <a href="AdminRegister.php" class="btn">Sign up</a>
    </p>
</form>
<br><br>

</body>
</html>
