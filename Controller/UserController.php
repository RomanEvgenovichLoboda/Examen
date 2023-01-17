<?php
//session_start();
include '../Model/User.php';

function Autorisation($log,$pas)
{
    $conn = new mysqli("localhost", "root", "", "mydb1");
    if ($conn->connect_error) {
        echo 'Error';
    } else {
        $sql_code = "SELECT * FROM users";
        if ($results = $conn->query($sql_code)) {
            foreach ($results as $res) {
                if ($log == $res["login"] && $pas == $res["password"]) {
                    $_SESSION['user'] = $log;
                    echo "<script> location.href='../View/UserProducts.php'; </script>";
                }
            }
            echo "Not Avtorise";

            $results->free();
            $conn->close();
        }
    }
}
function Registration($login,$password){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = 'INSERT INTO `users`(`login`,`password`) VALUES ("'.$login.'" , "'.$password.'")';
        if($conn->query($sql_code)){
            echo '<p>Data added</p>';
            $_SESSION['isRegistr']=false;
            echo "<script> location.href='../View/Registration.php'; </script>";
        }
        else{
            echo '<p>Data not added</p>';
        }
        $conn->close();

    }
}


