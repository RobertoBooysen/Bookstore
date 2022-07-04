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
$image = $_POST['image'];
$price = $_POST['price'];

include('DBConn.php');
//Update book information(IT Sourcecode, 2021)
$query = 'UPDATE tblBooks set name ="'.$name.'",
					image ="'.$image.'", price="'.$price.'" WHERE
					id ="'.$zz.'"';
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

?>
<!--A message will display if the book has been updated(IT Sourcecode, 2021)-->
<script type="text/javascript">
    alert("Book information have been successfully updated.");
    window.location = "AdminHome.php";
</script>
</body>
</html>

