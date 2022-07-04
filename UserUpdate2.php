<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Untitled Document</title>
</head>
<body>
<?php
$zz = $_POST['id'];
$name = $_POST['name'];
$studentNumber = $_POST['studentNumber'];
$username = $_POST['username'];
$password = $_POST['password'];


include('DBConn.php');

$password = md5($password);//encrypt the password before saving in the database(CodeWithAwa, 2022)

$query = 'UPDATE tblUser set name ="'.$name.'",
					studentNumber ="'.$studentNumber.'", username="'.$username.'",
					password="'.$password.'" WHERE
					id ="'.$zz.'"';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>
<!--Displays message once user information has been updated (IT Sourcecode, 2021)-->
<script type="text/javascript">
    alert("User information have been successfully updated.");
    window.location = "AdminHome.php";
</script>
</body>
</html>
