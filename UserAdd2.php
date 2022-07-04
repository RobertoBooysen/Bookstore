<?php
    include('DBConn.php');
?>
<!DOCTYPE html>
<html>
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
<body>
    <?php
    $name = $_POST['name'];
    $studentNumber = $_POST['studentNumber'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    switch($_GET['action']){
        case 'add':
            $password = md5($password);//encrypt the password before saving in the database(CodeWithAwa, 2022)
            $query = "INSERT INTO tblUser
                    (id,name, studentNumber, username,password)
                    VALUES ('Null','".$name."','".$studentNumber."','".$username."','".$password."')";
            mysqli_query($conn,$query)or die ('Error in updating Database');

            break;

    }
    ?>
    <!--Displays message once the user has been added (IT Sourcecode, 2021)-->
    <script type="text/javascript">
        alert("Successfully added.");
        window.location = "AdminHome.php";
    </script>

</body>
</html>


