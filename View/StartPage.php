<?php
session_start();
include '../Controller/ProductController.php';
include '../Model/ProductModel.php';
include '../Controller/UserController.php';
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
        <div class="col-sm-3 bg-dark p-2">
            <button type="submit"  class="btn btn-outline-info m-2 w-75 shadow" name="atr">Autorization</button>
            <button type="submit"  class="btn btn-outline-primary m-2 w-75 shadow" name="rsr">Registration</button>
            <button type="submit"  class="btn btn-outline-warning m-2 w-75 shadow" name="adm">Administration</button>
            <?php
            if(isset($_POST['atr'])){
                $_SESSION['User']="aut";
                echo "<script> location.href='../View/Registration.php'; </script>";
            }
            if(isset($_POST['rsr'])){
                $_SESSION['User']="reg";
                echo "<script> location.href='../View/Registration.php'; </script>";
            }
            if(isset($_POST['adm'])){
                $_SESSION['User']="adm";
                echo "<script> location.href='../View/Registration.php'; </script>";
            }
            if(isset($_POST['sbtn'])){
                $searcP = trim(htmlspecialchars($_POST['sinp']));
                SearchProduct($searcP);
            }
            ?>

        </div>
        <div class=" col-sm-9" >
            <?php
            if(isset($_POST['add'])){
                echo "<script> location.href='../View/AddProduct.php'; </script>";

            }
            else{
                SellectAll();
            }
            ?>
        </div>
    </div>
</form>

</body></html>
