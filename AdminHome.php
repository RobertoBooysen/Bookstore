<?php
include('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery(IT Sourcecode, 2021) -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript(IT Sourcecode, 2021) -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript(IT Sourcecode, 2021) -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: center;
        padding: 8px;
    }

    tr:nth-child(even){background-color: #f2f2f2}

    th {
        background-color: #90EE90FF;
        color: white;
    }

    .btn {
        padding: 5px 12px;
        font-size: 15px;
        color: white;
        background: #90EE90FF;
        border: none;
        border-radius: 5px;
    }
</style>
<body>
<a href="Index.php?logout='1'" style="color: white;" class="btn">Logout</a>
<div class="center">
    <h2 style="text-align: center;">Verification of students</h2>

    <table id="users">
        <tr>
            <th>ID</th>
            <th>Student Name</th>
            <th>Student Number</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
        <?php
        $query="SELECT * FROM tblUser WHERE status='pending' ORDER BY id ASC";
        $result=mysqli_query($conn,$query);
        while($row=mysqli_fetch_array(($result))){
            ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['studentNumber']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td>
                <form action="AdminHome.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>>">
                    <input type="submit" name="approve" value="Approve" class="btn">
                    <input type="submit" name="deny" value="Deny" class="btn">
                </form>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>
<?php
if(isset($_POST['approve'])){
    $id=$_POST['id'];

    $select="UPDATE tblUser SET status='approved' WHERE id='$id'";
    $result=mysqli_query($conn,$select);

    echo '<script> alert("User approved")</script>';
    header('location: AdminHome.php');
}
if(isset($_POST['deny'])){
    $id=$_POST['id'];

    $select="DELETE FROM tblUser WHERE id='$id'";
    $result=mysqli_query($conn,$select);

    echo '<script> alert("User denied")</script>';
    header('location: AdminHome.php');
}
?>



<h2 style="text-align:center">List of student users</h2> <a href="UserAdd.php?action=add" type="button" class="btn btn-xs btn-info">Add New User</a> <br><br><br>

<!--table that displays all the information in the tblUser table(IT Sourcecode, 2021)  -->
<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Student Name</th>
            <th>Student Number</th>
            <th>Username</th>
            <th>Password</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = 'SELECT * FROM tblUser';
        $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($result)) {//The function fetches a result row as an associative array.(IT Sourcecode, 2021)

            echo '<tr>';
            echo '<td>'. $row['name'].'</td>';
            echo '<td>'. $row['studentNumber'].'</td>';
            echo '<td>'. $row['username'].'</td>';
            echo '<td>'. $row['password'].'</td>';
            echo '<td>'. $row['status'].'</td>';
            echo '<td> &ensp;&ensp; <a  type="button" class="btn btn-xs btn-warning" href="UserUpdate.php?action=edit & id='.$row['id'] . '"> Update </a> ';
            echo '&ensp;&ensp;<a  type="button" class="btn btn-xs btn-danger" href="UserDelete.php?type=tblUser&delete & id=' . $row['id'] . '">Delete </a> </td>';
            echo '</tr> ';
        }
        ?>
        </tbody>
    </table>
</div>
<br><br>
<h2 style="text-align:center">List of books</h2> <a href="BookAdd.php?action=add" type="button" class="btn btn-xs btn-info">Add New Book</a> <br><br><br>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Price</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $query = 'SELECT * FROM tblBooks';
        $result = mysqli_query($conn, $query) or die (mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($result)) {//The function fetches a result row as an associative array.(IT Sourcecode, 2021)

            echo '<tr>';
            echo '<td>'. $row['name'].'</td>';
            echo '<td>'. $row['image'].'</td>';
            echo '<td>'. $row['price'].'</td>';
            echo '<td> &ensp;&ensp; <a  type="button" class="btn btn-xs btn-warning" href="BookUpdate.php?action=edit & id='.$row['id'] . '"> Update </a> ';
            echo '&ensp;&ensp;<a  type="button" class="btn btn-xs btn-danger" href="BookDelete.php?type=tblBooks&delete & id=' . $row['id'] . '">Delete </a> </td>';
            echo '</tr> ';
        }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>