<?php
session_start();

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

loginUser($email, $password);

}

function loginUser($email, $password){
    $file = fopen('../storage/users.csv', 'r');

    if($file !== FALSE){   
        while($row = fgetcsv($file, 1000, ',')){
            if($row[1] === $email){
                if($row[2] === $password){
                    $_SESSION["email"] = $row[1];
                    $_SESSION["username"] = $row[0];
                    header("Location: ../dashboard.php");
                } else{
                    echo "Password Wrong!";
                    exit;
                }
            }
        }
        fclose($file);
    }
}

//echo "HANDLE THIS PAGE";