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
<body class="bg-black">
<form method="post" action="#">
    <div class="row ">
        <div class=" col-sm-3 p-2 ">

            <button type="submit"  class="btn btn-outline-info m-3 w-75" name="add">Add Product</button>
            <?php

            if(isset($_POST['autor'])){
                $log = trim(htmlspecialchars($_POST['name']));
                $pass=trim(htmlspecialchars($_POST['pas']));
                Autorisation($log,$pass);
            }
            if(isset($_POST['sbtn'])){
                $searcP = trim(htmlspecialchars($_POST['sinp']));
                SearchProduct($searcP,1);
            }
            if(isset($_POST['edbut'])){
                $edid = intval($_POST['edbut']);
                EditProduct($edid);
            }
            if(isset($_POST['edok'])){
                $okid = intval($_POST['edok']);
                $okname = trim(htmlspecialchars($_POST['okname']));
                $okprice = intval($_POST['okprc']);
                $okhdr = trim(htmlspecialchars($_POST['okhdr']));
                $okdscr = trim(htmlspecialchars($_POST['okdscr']));
                SaveChanges($okid,$okname,$okprice,$okhdr,$okdscr);
            }
            ?>

        </div>
        <div class=" col-sm-9" >

            <?php

            //SellectAll();
            if(isset($_POST['delbut'])){
                $delid = intval($_POST['delbut']);
                DelleteProduct($delid);
            }
            if(isset($_POST['add'])){
                echo "<script> location.href='../View/AddProduct.php'; </script>";

            }
            else{
                echo '<div class="input-group">';
                echo '<input class="form-control" name="sinp" placeholder="search" </input>';
                echo '<button type="submit" name="sbtn" class="btn btn-outline-primary">Search</button>';
                echo '</div>';
                SellectAll(1);
            }

            ?>
        </div>
    </div>
</form>

</body></html>

