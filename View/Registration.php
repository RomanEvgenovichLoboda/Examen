<?php
session_start();
include '../Controller/UserController.php';
?>
<html>
<head>
    <title>AddProduct</title>
    <!--    <link href="../style.css" rel="stylesheet"/>-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body  class="bg-light d-flex justify-content-center position-relative">
<form action="#" method="post" enctype="multipart/form-data">

    <div class="card text-bg-ls shadow p-3 w-100" style="min-width: 18rem;">
        <?php
        if(isset($_POST['autor'])) {
            $log = trim(htmlspecialchars($_POST['name']));
            $pass=trim(htmlspecialchars($_POST['pas']));
            if($log!=""&&$pass!="")Autorisation($log,$pass);
            else echo"Fill All Fields!";
        }
        if(isset($_POST['registr'])) {
            $log1 = trim(htmlspecialchars($_POST['name']));
            $pas=trim(htmlspecialchars($_POST['pas']));
            $pas2=trim(htmlspecialchars($_POST['pas2']));
            if($log1 !=""||$pas !=""||$pas2 !=""){
                if($pas!=$pas2) {
                    echo "Different Passwords!";
                }
                else Registration($log1,$pas);
            }
            else{
                echo "Fill All Fields!";
            }
        }
        if($_SESSION['isRegistr']){
            echo '<div class="card-header"><h4>Registration:</h4></div>';
            echo "<div class='card-body'>";
            echo '<p><input type="text" name="name" class="form-control shadow" placeholder="Name" /></p>';
            echo '<p><input type="password" name="pas" class="form-control shadow" placeholder="password" /></p>';
            echo '<p><input type="password" name="pas2" class="form-control shadow" placeholder="confirm password" /></p>';
            echo "<p></p>";
            echo '<p><button type="submit" name="registr" class="btn btn-outline-primary w-100 shadow"> Ok </button></p>';
            echo "</div>";
        }
        if(!$_SESSION['isRegistr']){
            echo '<div class="card-header"><h4>Autorisation:</h4></div>';
            echo "<div class='card-body'>";
            echo '<p><input type="text" name="name" class="form-control shadow" placeholder="Name" /></p>';
            echo '<p><input type="password" name="pas" class="form-control shadow" placeholder="password" /></p>';
            echo "<p></p>";
            echo '<p><button type="submit" name="autor" class=" btn btn-outline-primary w-100 shadow"> Ok </button></p>';
            echo "</div>";
        }
        ?>
    </div>
</form>
</body>
</html>