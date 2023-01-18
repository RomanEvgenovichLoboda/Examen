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
        <div class="col-sm-3 border border-light p-2 bg-dark">
            <?php
            echo "<div class='d-flex w-100 justify-content-center text-bg-warning'><h3>Hallo ".$_SESSION['user']." !!!</h3></div>";
            //var_dump($_SESSION['userBuy']);
            echo '<button type="submit" class="btn btn-outline-primary m-3 w-75 shadow" name="shall">Show Products</button>';
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
                EditProfile($_SESSION['user']);
            }
            ?>

        </div>
        <div class=" col-sm-9" >

            <?php
            if(isset($_POST['buybut'])){
                //echo "<script> location.href='../View/AddProduct.php'; </script>";
                $id = intval($_POST['buybut']);
                //AddBuys($id);
                $_SESSION['userBuy'][] = $id;
                ShowBuys();
            }
            if(isset($_POST['exit'])){
                unset( $_SESSION['userBuy']);
                echo "<script> location.href='../View/StartPage.php'; </script>";
            }
            if(isset($_POST['shop'])){

                ShowBuys();
            }
            if(isset($_POST['delbuy'])){
                $id = intval($_POST['delbuy']);
                unset($_SESSION['userBuy'][array_search($id, $_SESSION['userBuy'])]);
                ShowBuys();
            }
            if(isset($_POST['shall'])){
                SellectAll(2);
            }
            else{
              SellectAll(2);
            }

            ?>
        </div>
    </div>
</form>

</body></html>
