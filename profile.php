<?php
session_start();
include 'inc/head.php';
require_once 'app/connection.php';
require_once 'functions/all_functions.php';
// require_once 'queries.php';
include 'inc/navbar.php';
$user_email=$_SESSION['user_email'];
$select_user="select * from `users` where `user_email`='$user_email'";
$run_user=mysqli_query($conn,$select_user);
$user_id=0;
if(mysqli_num_rows($run_user)==1)
{
  $user=mysqli_fetch_assoc($run_user);
  $user_id=$user['user_id'];
  // echo $user_id;
  // var_dump($user);
  // echo $$_SESSION['user_name'];
  // echo "<hr>";
}

$user_orders="select * from `user_orders` WHERE `user_id` = $user_id ";
$run_user_orders=mysqli_query($conn,$user_orders);
$orders=[];
$count_orders=0;
if(mysqli_num_rows($run_user_orders)>0)
{
$orders=mysqli_fetch_all($run_user_orders,MYSQLI_ASSOC);

$count_orders=mysqli_num_rows($run_user_orders);

// echo $count_orders;
}

?>
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
           if(!isset ($_SESSION['user_email'])){
        ?>
        <li class="nav-item">
        <a href="user_area/checkout.php" class="nav-link">Login</a>
        </li>

        <?php 
           } 
           else {?>
                    <li class="nav-item">
      <a class="nav-link" href="handles/logout.php?email=<?php echo $_SESSION['user_email']?>">logout</a>
    </li>
      <?php     }
           
           ?>
    </ul>
</nav>
<!-- under navbar -->
<div class="">
<h3 class="text-center">Hidden Store</h3>
<p class="text-center">Communication is the heart of E-commerece and community</p>
</div>

<!-- content  -->
<div class=" mb-5">
  <div class="row">
    <div class="col-md-3 p-0">
            <h2 class="text-center bg-info mb-0">Your profile</h2>
            <div class="bg-secondary text-center">
                <img src="images/users_images/<?php echo $user['user_image']; ?>" class="w-75" alt="" >
                <div class="py-2">
                <p><a href="profile.php"  class="text-decoration-none text-light">Pending orders</a></p>
                <p><a href="profile.php?editAccount" class="text-decoration-none text-light">Edit account</a></p>
                <p><a href="profile.php?my_orders" class="text-decoration-none text-light">My orders</a></p>
                <p><a href="profile.php?delete_account" class="text-decoration-none text-light">Delete account</a></p>
                <p><a href="handles/logout.php" class="text-decoration-none text-light">Logout</a></p>
                </div>
            </div>
    </div>
    <div class="col-md-9">
            <?php
              if(isset($_GET['editAccount']))
              {
               include "profile_pages/updateAccount.php";
              }

              elseif(isset($_GET['my_orders']))
              {
               include "profile_pages/my_orders.php";
              }
               elseif($count_orders==0)
               {
                   echo "<h3 class='text-center text-success'>you have <span class='text-danger'> $count_orders</span> pending orders</h3>";
                  echo " <p class='text-center my-3'><a href='index.php' class='text-info'> Explore products</a></p>";

               }

               elseif(isset($_GET['delete_account']))
              {
               include "profile_pages/delete_account.php";
              }
              
               else
               {
                   if(!isset($_GET['editAccount']))
                {
                  if(!isset($_GET['my_orders'])){
                    if(!isset($_GET['delete_account'])){
                      echo "<h3 class='text-center text-success'>you have <span class='text-danger'> $count_orders</span> pending orders</h3>";
            
                  echo " <p class='text-center my-3'><a href='profile.php?my_orders' class='text-info'> order details</a></p>";
                    }
                  }
                }
               }

               

            ?>
            
    </div>
    
  </div>
</div>

<?php
require_once 'inc/errors.php';
require_once 'inc/success.php';
?>
<!-- foot -->
<div class="bg-info text-center mt-2 p-3">
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>






<?php

include "inc/foot.php";






