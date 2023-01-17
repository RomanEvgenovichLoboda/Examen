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
            if(isset($_POST['sbtn'])){
                $searcP = trim(htmlspecialchars($_POST['sinp']));
                SearchProduct($searcP,2);
            }
            ?>

        </div>
        <div class=" col-sm-9" >

            <?php
            if(isset($_POST['buy'])){
                //echo "<script> location.href='../View/AddProduct.php'; </script>";
            }
            else{
              echo '<div class="input-group m-2 shadow">';
              echo '<input class="form-control" name="sinp" placeholder="search" </input>';
              echo '<button type="submit" name="sbtn" class="btn btn-outline-primary">Search</button>';
              echo '</div>';
              SellectAll(2);
            }

            ?>
        </div>
    </div>
</form>

</body></html>
