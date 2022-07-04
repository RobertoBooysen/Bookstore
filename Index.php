<?php
include('DBConn.php');
$errors = array();
// LOGIN USER
if (isset($_POST['login_user'])) {
$studentNumber= mysqli_real_escape_string($conn, $_POST['student_number']);
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (empty($studentNumber)) {
    array_push($errors, "Student number is required");
}
if (empty($username)) {
    array_push($errors, "Username is required");
}
if (empty($password)) {
    array_push($errors, "Password is required");
}

if (count($errors) == 0) {
    $password = md5($password);

    $select = mysqli_query($conn, "SELECT * FROM tblUser WHERE studentNumber='$studentNumber' AND username='$username' AND password='$password'");
    $row = mysqli_fetch_array($select);

    $status = isset($row['status']) ? ($row['status']) : null;

    $select2 = mysqli_query($conn, "SELECT * FROM tblUser WHERE studentNumber='$studentNumber' AND  username='$username' AND password='$password'");
    $check_user = mysqli_num_rows($select2);

    if ($check_user == 1) {
        $_SESSION["status"] = $row['status'];
        $_SESSION["username"] = $row['username'];
        $_SESSION["password"] = $row['password'];

        if ($status == "approved") {
            echo '<script> alert("Login success!")</script>';
            header('location: Home.php');
        } else if ($status == "pending") {
            echo '<script> alert("Your account is still pending.")</script>';
        } else {
            echo "Incorrect username or password";
        }
    }
    else {
        array_push($errors, "Wrong student number/username/password combination");
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
    <h2>Login</h2>
</div>


<form method="post" action="Index.php">
    <?php include('Errors.php'); ?>
    <div class="input-group">
        <!--Value - to make form sticky to redisplay details  entered allowing the user to edit the field instead of re-typing all the fields-->
        <label>Student number</label>
        <input type="text" placeholder="Student Number" required name="student_number"  value="<?php  echo isset($studentNumber) ? $studentNumber:'';?>" >
    </div>
    <div class="input-group">
        <label>Username</label>
        <!--Value - to make form sticky to redisplay details  entered allowing the user to edit the field instead of re-typing all the fields-->
        <input type="text" placeholder="Username" required name="username" value="<?php  echo isset($username) ? $username:'';?>" >
    </div>
    <div class="input-group">
        <label>Password</label>
        <!--Value - to make form sticky to redisplay details  entered allowing the user to edit the field instead of re-typing all the fields-->
        <input type="password" placeholder="Password" required name="password" value="<?php  echo isset($password) ? $password:'';?>">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
        Not yet a member? <a href="Register.php" class="btn">Sign up</a>
    </p>
    <br>
    <p>
        An admin member? <a href="Admin.php" class="btn">Sign in</a>
    </p>
</form>
<br><br>
z
</body>
</html>