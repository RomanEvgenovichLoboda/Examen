<?php
include '../Controller/ProductController.php';
?>
<html>
<head>
    <title>AddProduct</title>
<!--    <link href="../style.css" rel="stylesheet"/>-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>
<body  class="bg-light d-flex justify-content-center">
<form action="#" method="post" enctype="multipart/form-data">

    <div class="card text-bg-ls shadow p-3" style="min-width: 18rem;">
        <div class="card-header"><h4>Add Product:</h4></div>
        <div class="card-body">
            <p><input type="file" name="image" class="form-control shadow" multiple accept="image/*"/></p>
            <p><input type="text" name="name" class="form-control shadow" placeholder="Name" /></p>
            <p><input type="number" name="price" class="form-control shadow" placeholder="Price" /></p>
            <p><input type="text" name="header" class="form-control shadow" placeholder="Header" /></p>
            <p><input type="text" name="description" class="form-control shadow" placeholder="Description" /></p>
            <p></p>
            <p><button type="submit" name="addProd" class="btn btn-outline-primary w-100 shadow"> Add </button></p>
        </div>
        <?php
        if(isset($_POST['addProd'])) {


            $name = trim(htmlspecialchars($_POST['name']));
            $price = intval($_POST['price']);
            $header = trim(htmlspecialchars($_POST['header']));
            $description = trim(htmlspecialchars($_POST['description']));
            //$imagepath = trim(htmlspecialchars($_POST['image']));
            $target_dir = '../Images/';
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $imagepath = $_FILES['image']['name'];
            //$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($name !="" && $price != "" && $header != "" && $description != "" && $imagepath != ""){
//        echo "Fill in all the fields";
//        exit();
                if (!file_exists($target_file)) {
                    if(!move_uploaded_file($_FILES['image']['tmp_name'], '../Images/'.$_FILES['image']['name'])){
                        //echo $_FILES['image']['size'];
                        echo "Image not Added";
                        exit();
                    }

                }
                AddProduct($name, $price, $header, $description, $imagepath);
                //echo "<script> location.href='../View/UserProducts.php'; </script>";
            }
            else{
                echo "Fill all fields";
            }
        }
        ?>
    </div>
</form>
</body>
</html>

