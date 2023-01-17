
<?php


function SellectAll($autor=0){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = "SELECT * FROM products";
        if($results=$conn->query($sql_code)){
            //$results = $conn->query($sql_code);
            foreach ($results as $res){
                $prod = new ProductModel($res["id"],$res["name"],$res["price"],$res["header"],$res["description"],$res["imagepath"]);
                echo "<div class='card d-inline-block m-2 p-2 font-monospace shadow' style='width: 200px'>";
                echo $prod->ShowProduct();
                if($autor==1){
                    echo "<button type='submit' class='btn btn-outline-danger w-50' name='delbut' value='{$res["id"]}'>Dell</button>";
                    echo "<button type='submit' class='btn btn-outline-warning w-50' name='edbut' value='{$res["id"]}'>Edit</button></p>";
                }
                else if ($autor==2) echo "<button type='submit' class='btn btn-outline-warning w-100' name='buybut' value='{$res["id"]}'>Buy</button></p>";
                echo  "</div>";

            }
            $results->free();
            $conn->close();
            //return $results;
        }
    }


}
function AddProduct($name,$price,$header,$description,$imagepath){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = 'INSERT INTO `products`(`name`,`price`,`header`,`description`,`imagepath`) VALUES ("'.$name.'" , "'.$price.'", "'.$header.'", "'.$description.'", "'.$imagepath.'")';
        if($conn->query($sql_code)){
            echo '<p>Data added</p>';
            echo "<script> location.href='../View/AdminProd.php'; </script>";
        }
        else{
            echo '<p>Data not added</p>';
        }
        $conn->close();
    }

}
function DelleteProduct($id)
{
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $delsql = "DELETE FROM products WHERE id = $id ";
        if(!$conn->query($delsql)){
            echo '<p>Error</p>';
            exit;
        }
    }

}

function EditProduct($edid){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = "SELECT * FROM products WHERE id = '$edid'";
        if($results=$conn->query($sql_code)){
            foreach ($results as $res){
                $prod = new ProductModel($res["id"],$res["name"],$res["price"],$res["header"],$res["description"],$res["imagepath"]);
                echo "<div class='card d-inline-block m-1 p-2 text-uppercase text-info font-monospace' style='width: 200px'>";
                echo $prod->Edit();
                echo "<button type='submit' class='btn btn-outline-primary w-50' name='edok' value='{$res["id"]}'>Ok</button>";
                echo  "</div>";
            }
            $results->free();
            $conn->close();
        }
    }
}

function SaveChanges($id,$name,$price,$header,$description){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = 'UPDATE `products` SET `name` = "'.$name.'" , `price` ='.$price.',`header` = "'.$header.'",`description` = "'.$description.'" WHERE id = '.$id.'';
        //$sql_code = 'INSERT INTO `products`(`name`,`price`,`header`,`description`) VALUES ("'.$name.'" , "'.$price.'", "'.$header.'", "'.$description.'") WHERE id = '.$id.' ';
        if(!$conn->query($sql_code)){
            echo '<p>Error</p>';
            exit;
        }
    }
}

function SearchProduct($nam,$autor=0){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = "SELECT * FROM products WHERE name = '$nam'";
        if($results=$conn->query($sql_code)){
            foreach ($results as $res){
                $prod = new ProductModel($res["id"],$res["name"],$res["price"],$res["header"],$res["description"],$res["imagepath"]);
                echo "<div class='card d-inline-block m-1 p-2 text-uppercase text-info font-monospace' style='width: 200px'>";
                echo $prod->ShowProduct();
                if($autor==1){
                    echo "<button type='submit' class='btn btn-outline-danger w-50' name='delbut' value='{$res["id"]}'>Dell</button>";
                    echo "<button type='submit' class='btn btn-outline-warning w-50' name='edbut' value='{$res["id"]}'>Edit</button></p>";
                }
                else if($autor==2) echo "<button type='submit' class='btn btn-outline-warning w-100' name='buybut' value='{$res["id"]}'>Buy</button></p>";
                echo  "</div>";
            }
            $results->free();
            $conn->close();
        }
    }
}

