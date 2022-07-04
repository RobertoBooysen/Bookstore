<?php
include('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <!-- jQuery(IT Sourcecode, 2021) -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript(IT Sourcecode, 2021) -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript(IT Sourcecode, 2021) -->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
</head>
<body>
<!--Admin can add new book information (IT Sourcecode, 2021)-->
<?php
$name = $_POST['name'];
$image = $_POST['image'];
$price = $_POST['price'];

//switch is when the admin selects add(IT Sourcecode, 2021)
switch($_GET['action']){
    case 'add':
        //Inserts the new book into the database(IT Sourcecode, 2021)
        $query = "INSERT INTO tblBooks
                    (id,name, image, price)
                    VALUES ('Null','".$name."','".$image."','".$price."')";
        mysqli_query($conn,$query)or die ('Error in updating Database');

        break;

}
?>
<!--Display message once book have been added(IT Sourcecode, 2021)-->
<script type="text/javascript">
    alert("Successfully added.");
    window.location = "AdminHome.php";
</script>

</body>
</html>


