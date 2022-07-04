<?php
include('DBConn.php');
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- jQuery(IT Sourcecode, 2021) -->
    <script src="js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript(IT Sourcecode, 2021) -->
    <script src="js/bootstrap.min.js"></script>
    <!-- Morris Charts JavaScript (IT Sourcecode, 2021)-->
    <script src="js/plugins/morris/raphael.min.js"></script>
    <script src="js/plugins/morris/morris.min.js"></script>
    <script src="js/plugins/morris/morris-data.js"></script>
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
<body>

<div class="header">
    <h2>Add new Book</h2>
</div>
<!--Form for admin upload a book(IT Sourcecode, 2021)-->
<form role="form" method="post" action="BookAdd2.php?action=add">

    <div class="input-group">
        <input class="form-control" placeholder="Name" name="name">
    </div>
    <div class="input-group">
        <input type="file" name="image"  >
    </div>
    <div class="input-group">
        <input class="form-control" placeholder="price" name="price">
    </div>
    <button type="submit" class="btn btn-default">Save Record</button>
    <button type="reset" class="btn btn-default">Clear Entry</button>


</form>

</body>
</html>
