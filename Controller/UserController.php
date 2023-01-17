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
            $_SESSION['User'] = "aut";
            echo "<script> location.href='../View/Registration.php'; </script>";
        }
        else{
            echo '<p>Data not added</p>';
        }
        $conn->close();

    }
}
function ShowAllUsers(){
    $conn = new mysqli("localhost", "root", "", "mydb1");
    if ($conn->connect_error) {
        echo 'Error';
    } else {
        $sql_code = "SELECT * FROM users";
        if ($results = $conn->query($sql_code)) {
            foreach ($results as $res) {
                $user = new User($res["login"],$res["password"],$res["email"],$res["telephone"],$res["adress"],$res["id"]);
                echo "<div class='card d-inline-block m-2 p-2 font-monospace shadow' style='width: 200px'>";
                echo $user->Show();
                echo "<button type='submit' class='btn btn-outline-danger w-100' name='delUs' value='{$res["id"]}'>Dell</button>";
                echo  "</div>";
            }
            $results->free();
            $conn->close();
        }
    }

}
function DelleteUser($id){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $delsql = "DELETE FROM users WHERE id = $id ";
        if(!$conn->query($delsql)){
            echo '<p>Error</p>';
            exit;
        }
    }
}
function EditProfile($log){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = "SELECT * FROM users WHERE login = '$log'";
        if($results=$conn->query($sql_code)){
            foreach ($results as $res){
                $user = new User($res["login"],$res["password"],$res["email"],$res["telephone"],$res["adress"],$res["id"]);
                echo "<div class='card d-inline-block m-1 p-2 text-uppercase text-info font-monospace' style='width: 200px'>";
                echo $user->Edit();
                echo "<button type='submit' class='btn btn-outline-primary w-100' name='save' value='{$res["id"]}'>Save</button>";
                echo  "</div>";
            }
            $results->free();
            $conn->close();
        }
    }
}
function UpdateProfile($id,$pass,$tel,$mail,$adress){
    $conn = new mysqli("localhost","root","","mydb1");
    if($conn->connect_error){
        echo 'Error';
    }
    else{
        $sql_code = 'UPDATE `users` SET `password` = "'.$pass.'" , `telephone` ='.$tel.',`email` = "'.$mail.'",`adress` = "'.$adress.'" WHERE id = '.$id.'';
        if(!$conn->query($sql_code)){
            echo '<p>Error</p>';
            exit;
        }
    }
}
