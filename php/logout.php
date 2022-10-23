<?php
session_start();
if(isset($_SESSION["email"])){
    logout();
}else{
    echo "<h3><center>No Session Found or Destroyed... <br> Redirecting in 4</center></h3>";
    echo '<meta http-equiv="refresh" content="4; url=../forms/login.html">';
}

function logout(){
    // destroy the session
    session_destroy();
    echo "<h3><center>Session Destroyed... <br> Redirecting in 3</center></h3>";
    echo '<meta http-equiv="refresh" content="3; url=../forms/login.html">';
}

//echo "HANDLE THIS PAGE";
