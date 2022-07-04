<?php
  include('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="CSS/style.css">
</head>
<body>
<?php

if (!isset($_GET['do']) || $_GET['do'] != 1) {

    //switch is when the admin selects delete(IT Sourcecode, 2021)
    switch ($_GET['type']) {
        case 'tblBooks':
            //Deletes the book from the database(IT Sourcecode, 2021)
            $query = 'DELETE FROM tblBooks
							WHERE
							id = ' . $_GET['id'];
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

            ?>
            <!--Display message once book have been deleted(IT Sourcecode, 2021)-->
            <script type="text/javascript">
                alert("Book have been successfully deleted.");
                window.location = "AdminHome.php";
            </script>

        <?php
    }
}
?>
</body>
</html>
