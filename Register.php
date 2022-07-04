<?php
include('DBConn.php');

// initializing variables(CodeWithAwa, 2022)
$name="";
$studentNumber="";
$username = "";
$errors = array();

// REGISTER USER(CodeWithAwa, 2022)
if (isset($_POST['reg_user'])) {
    // receive all input values from the form(CodeWithAwa, 2022)
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $studentNumber = mysqli_real_escape_string($conn, $_POST['student_number']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled(CodeWithAwa, 2022)
    // by adding (array_push()) corresponding error unto $errors array(CodeWithAwa, 2022)
    if (empty($name)) { array_push($errors, "Name is required"); }
    if (empty($studentNumber)) { array_push($errors, "Student number is required"); }
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure(CodeWithAwa, 2022)
    // a user does not already exist with the same username and/or student number(CodeWithAwa, 2022)
    $user_check_query = "SELECT * FROM tblUser WHERE username='$username' OR studentNumber='$studentNumber' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists(CodeWithAwa, 2022)

        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['studentNumber'] === $studentNumber) {
            array_push($errors, "Student number already exists");
        }
    }

    // Finally, register user if there are no errors in the form(CodeWithAwa, 2022)
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database(CodeWithAwa, 2022)

        $query = "INSERT INTO tblUser (name,studentNumber,username, password,status) 
  			  VALUES('$name','$studentNumber','$username', '$password','pending')";
        mysqli_query($conn, $query);
        echo '<script> alert("Your account is now pending")</script>';
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
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
<body>

<div class="header"><!--The header is allocated on top of the form(CodeWithAwa, 2022)-->
    <h2>Register</h2>
</div>

<form method="post" action="Register.php" class="form">
    <div class="input-group">
        <label>Name</label>
        <input type="text" placeholder="Name" required name="name" value="<?php if (isset($name)) {
            echo $name;
        } ?>">
    </div>
    <div class="input-group">
        <label>Student number</label>
        <input type="text" placeholder="Student number" required name="student_number" value="<?php if (isset($studentNumber)) {
            echo $studentNumber;
        } ?>">
    </div>
    <div class="input-group">
        <label>Username</label>
        <input type="text" placeholder="Username" required name="username" value="<?php if (isset($username)) {
            echo $username;
        } ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input pattern=".{8}" title="8 characters" required name="password_1" type="password" placeholder="Password" /><!--Password must be 8characters long(W3Schools,2022-->
    </div>
    <div class="input-group">
        <label>Confirm password</label>
        <input type="password" placeholder="Confirm password" required name="password_2">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="reg_user">Register</button>
    </div>
    <p>
        Already a member? <a href="Index.php" class="btn">Sign in</a>
    </p>
</form>
<br><br>

</body>
</html>