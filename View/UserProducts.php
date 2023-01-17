<?php
session_start();
include '../Controller/ProductController.php';
include '../Model/ProductModel.php';
include '../Controller/UserController.php';
//include '../Model/User.php';
?>
<html>
<head>
    <title>TEST PHP</title>
<!--    <link href="./style.css" rel="stylesheet"/>-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<form method="post" action="#">
    <div class="row">
        <div class="col-sm-3 border border-light p-2">
            <?php
            echo "<p>Hallo ".$_SESSION['user']." !!!</p>";
            echo '<button type="submit" class="btn btn-outline-warning m-3 w-75 shadow" name="shop">Shopping</button>';
            echo '<button type="submit" class="btn btn-outline-info m-3 w-75 shadow" name="edit">Edit Profile</button>';
            echo '<button type="submit" class="btn btn-outline-danger m-3 w-75 shadow" name="exit">Exit</button>';
            if(isset($_POST['sbtn'])){
                $searcP = trim(htmlspecialchars($_POST['sinp']));
                SearchProduct($searcP,2);
            }
            if(isset($_POST['edit'])){
                EditProfile($_SESSION['user']);
            }
            if(isset($_POST['save'])){
                $id = intval($_POST['save']);
                $pas = trim(htmlspecialchars($_POST['uspas']));
                $tel = intval($_POST['ustel']);
                $mail = trim(htmlspecialchars($_POST['usmail']));
                $adr = trim(htmlspecialchars($_POST['usadr']));
                UpdateProfile($id,$pas,$tel,$mail,$adr);
            }
            ?>

        </div>
        <div class=" col-sm-9" >

            <?php
            if(isset($_POST['buy'])){
                //echo "<script> location.href='../View/AddProduct.php'; </script>";
            }
            if(isset($_POST['exit'])){
                echo "<script> location.href='../View/StartPage.php'; </script>";
            }
            else{
              SellectAll(2);
            }

            ?>
        </div>
    </div>
</form>

</body></html>
