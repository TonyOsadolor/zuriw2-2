<?php
  session_start();
  if(isset($_SESSION["email"])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome</title>
    <link rel="stylesheet" href="src/style.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>

    <!-- Image and text -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><h2>ZURI-PHP</h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item f-right">
        <a class="nav-link" href="php/logout.php">Logout</a>
      </li>
  </div>
</nav>
<div class="container justify-content-center">
     <h1 class="">Welcome to Zuri Authentication <b><?php echo $_SESSION["username"]; ?></b></h1>
</div>
   
</body>
</html>
<?php
  } else{
    echo "";
    echo '
            <h3><center>Please, Login in.....</center></h3>
            <center><marquee width="15%" direction="left" height="100px">
            <h4 style="color:red;">No Session Activated</h4>
            </marquee></center>
          ';
    echo '<meta http-equiv="refresh" content="4; url=forms/login.html">';
  }
?>