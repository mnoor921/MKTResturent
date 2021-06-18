
<?php 

session_start();
extract($_POST);
extract($_GET);
include_once "admin-panel/requires/connect.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Fisrt Page</title>

  <!-- google fonts -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Redressed&display=swap" rel="stylesheet">

  <!-- bootstrap cdn -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/613acbcbf3.js" crossorigin="anonymous"></script>


  <!-- Animation On scroll -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- custom css -->
  <link rel="stylesheet" href="/MKTResturent/css/style.css">
</head>
<body>
  <!-- header section -->
  <div class="container bg-white rounded-style">
    <nav class="navbar navbar-expand-lg navbar-style ">
      <a class="navbar-brand" href="index.php"><img src="/MKTResturent/img/imgpsh_fullsize_anim.png" width="100px" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">About US</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="blog-detail.php">Blog</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact-us.php">Contact US</a>
          </li>
            <?php   $project = explode('/', $_SERVER['REQUEST_URI'])[1];  ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= "http://" . $_SERVER['SERVER_NAME']."/".$project."/";?>cart.php"><i class="fa fa-shopping-cart"></i></a>
          </li>
          <?php
          if(!isset($_SESSION['user_id'])){
           ?>
          <li class="nav-item">
            <a class="nav-link" href="<?= "http://" . $_SERVER['SERVER_NAME']."/".$project."/";?>login.php">LOGIN</a>
          </li>
           
          
          <?php 
        }
        ?>



        <?php
        if(isset($_SESSION['user_id'])){
          ?>
          <li class="nav-item">
           <a class="nav-link" href="profile.php"><i class="fa fa-user"></i></a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="front-include/logout.php"><i class="fa fa-power-off"></i></a>
         </li>
         <?php
       }
       ?>

     </ul>

   </div>
 </nav>
</div>