<?php
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $newpassword = $_POST["password"];
    
    //Passing Values to the Function
    $status = resetPassword($email, $newpassword);
    if($status === TRUE){
        echo "Password Successfully Updated for <b>" .$email ."</b>";
        echo '<meta http-equiv="refresh" content="4; url=../forms/login.html">';
    }else{
        echo "Could not Update Password to target " .$email;
        echo '<meta http-equiv="refresh" content="4; url=../forms/login.html">';
    }
}

function resetPassword($email, $newpassword){
    //Link to the Database file in .csv
    $dbfile = '../storage/users.csv';
    $tempfile = tempnam(".", "tmp"); //Produce a temporary file name, in the current directory

    //Checking if the File linked were properly opened
    if(!$fread = fopen($dbfile,'r')){
        die(" Read File Could not be Opened");
    }
    if(!$fwrite = fopen($tempfile, 'w')){
        die(" Write File Could not be Opened");
    }

    //Looping thru Records
    while(($row = fgetcsv($fread)) !== FALSE){  
        //Checking to see if the User thus Exists
        if($row[1] === $email){
            //Then pass the New Value to the target field
            $row[2] = $newpassword;
        }
        //Now Dump the changes into the Database
        fputcsv($fwrite,$row);
    }
    //Here we close all Open Files
    fclose($fread);
    fclose($fwrite);

    //Here we clean up the Database
    unlink($dbfile);
    rename($tempfile,$dbfile);

    return true;
}

//echo "HANDLE THIS PAGE";


