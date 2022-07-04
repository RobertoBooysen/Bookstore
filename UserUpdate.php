<?php
 include('DBConn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- jQuery (IT Sourcecode, 2021)-->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript (IT Sourcecode, 2021)-->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript (IT Sourcecode, 2021)-->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

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

<?php
$query = 'SELECT * FROM tblUser
  WHERE
  id ='.$_GET['id'];
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
while($row = mysqli_fetch_array($result))
{
    $zz= $row['id'];
    $i= $row['name'];
    $a=$row['studentNumber'];
    $b=$row['username'];
    $c=$row['password'];

}

$id = $_GET['id'];

?>

<div class="col-lg-12">
    <div class="col-lg-6">
        <!--Form to update user records (IT Sourcecode, 2021)-->
        <div class="header">
            <h2>Update user's information:</h2>
        </div>

        <form role="form" method="post" action="UserUpdate2.php">

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $zz; ?>" />
            </div>
            <div class="input-group">
                <input class="form-control" placeholder="Name" name="name" value="<?php echo $i; ?>">
            </div>
            <div class="input-group">
                <input class="form-control" placeholder="Student Number" name="studentNumber" value="<?php echo $a; ?>">
            </div>
            <div class="input-group">
                <input class="form-control" placeholder="Username" name="username" value="<?php echo $b; ?>">
            </div>
            <div class="input-group">
                <input class="form-control" placeholder="Password" name="password" value="<?php echo $c; ?>">
            </div>

            <button type="submit" class="btn btn-default">Update Record</button>

        </form>

</body>
</html>


