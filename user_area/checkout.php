<?php
session_start();
include '../inc/head.php';
require_once '../app/connection.php';
require_once '../functions/all_functions.php';
$ip=get_ip();
if(isset($_SESSION['user_id'])){

  $user_id=$_SESSION['user_id'];
  $select="select * from `users` where `user_id`= '$user_id'";
  $runQuery=mysqli_query($conn,$select);
  
  if(mysqli_num_rows($runQuery)>0)
{
  $user=mysqli_fetch_assoc($runQuery);
  // var_dump($carts);
  // $user_id=$user['user_id'];
  // echo $user_id;
  
  // echo "<hr>";
  
}
}

?>
<!-- Navbar -->
<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light  bg-info">
  <div class="container-fluid">
    <img src="images/logo.png" alt="" class="logo" width="5%" height="5%">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../display.php">Products</a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
        
      </ul>
    </div>
  </div>
</nav>
</div>
<!-- third -->
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary p-0 m-0 ">
    <ul class="navbar-nav ">
        <li class="nav-item">
        <a href="#" class="nav-link">Welecome <?php if(isset($_SESSION['user_name'])){
            echo $_SESSION['user_name'];

        }
        else {
          echo "guest";
        }
        ?></a>
        </li>
        <?php
        if(!isset($_SESSION['user_email'])){?>
        <li class="nav-item">
      <a class="nav-link" href="user_area/register.php">Register</a>
    </li>
   <?php     }  
   else {
   ?>
    <li class="nav-item">
      <a class="nav-link" href="../handles/logout.php?email=<?php echo $_SESSION['user_email']?>">logout</a>
    </li>
   <?php }?>
    </ul>
</nav>
<!-- under navbar -->
<div class="">
<h3 class="text-center">Hidden Store</h3>
<p class="text-center">Communication is the heart of E-commerece and community</p>
</div>
<div class="container">
    <div class="row">
        <?php
                if(isset($_SESSION['user_email']))
                {
                    include("../payment.php");
                }
                else
                {
                    include("login.php");
                }
        ?>
    </div>
</div>
<?php
require_once '../inc/errors.php';
require_once '../inc/success.php';
?>
<!-- foot -->
<div class="bg-info text-center mt-2 p-3 position:0">
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>






<?php

include "../inc/foot.php";
?>