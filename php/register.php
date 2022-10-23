<?php
if(isset($_POST['submit'])){
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
} else{
    //Handles =  if the page is visiting withon the submit Button
    echo "<script>alert('Sorry... An Error Occured')</script>";
    echo "<script>location.href='../forms/register.html'</script>";
    return false;
}

function registerUser($username, $email, $password){
    //Prepare Data to write to File
    $data = [$username, $email, $password];

    //Open File and Prepare for writing
    $file = fopen('../storage/users.csv', 'a');
    if($file !== FALSE){ 
        $checkuser = checkuser($email);
        if($checkuser === TRUE){
            return false;
        }      
    }
    //After Check, Save to File
    fputcsv($file, $data);
    fclose($file);
    //Print out Success Message
    echo "User Successfully Registered";
}

//Function to Check if User Already Exits
function checkuser($email){
    $file = fopen('../storage/users.csv', 'r');
    if($file !== FALSE){
        //Check for Duplicate Email
        while($row = fgetcsv($file, 1000, ',')){
            //$row = fgetcsv($file);
            if($row[1] === $email){
                echo "User Already Exists";
                return true;
            }
        }
    }
}
//echo "HANDLE THIS PAGE";


