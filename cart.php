<?php
session_start();
if(isset ($_SESSION['user_email'])){
include 'inc/head.php';
require_once 'app/connection.php';
require_once 'functions/all_functions.php';
require_once 'queries.php';
$ip_address=get_ip();
$user_id=$_SESSION['user_id'];
$cart_query="select * from `cart_details` where `user_id`='$user_id' ";
$cart_Run=mysqli_query($conn,$cart_query);
$carts=[];
if(mysqli_num_rows($cart_Run)>0)
{
  $carts=mysqli_fetch_all($cart_Run,MYSQLI_ASSOC);
  // var_dump($carts);
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
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Register</a>
        </li><li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li><li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php
          // echo $_SESSION['count'];
          if(isset($_SESSION['count']))
          {
            echo $_SESSION['count'];
          }
          ?> </sub></a>
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
        <a href="#" class="nav-link">Welecome guest</a>
        </li>
        <li class="nav-item">
        <a href="#" class="nav-link">Login</a>
        </li>
    </ul>
</nav>
<!-- under navbar -->
<div class="">
<h3 class="text-center">Hidden Store</h3>
<p class="text-center">Communication is the heart of E-commerece and community</p>
</div>

<!-- content  -->
<div class="container">
    <div class="row">
     <?php
     if(empty($carts)){?>
      <div class="alert alert-danger text-center">No items</div>
   <?php  }
   else {   
     ?>
      <table class="table-bordered text-center">
          <form action="cart.php" method="post">
          <tr>
            <th>Product Title </th>
                <th>Product Image</th>
                <th>Remove</th>
                <th>Toatal Price</th>
                <th>Remove</th>
                <th>update</th>
            </tr>
            <tbody>
              <?php
                      foreach ($carts as $cart) {
                        $product_id=$cart['product_id'];//1,2,3,4,5
                        // $=$_SESSION['user_id'];=$cart['=$_SESSION['user_id'];'];

                        $select_product="select * from products where `id` = $product_id";
                        $run_product=mysqli_query($conn,$select_product);
                        if(mysqli_num_rows($run_product)==1)
                        {
                          $selected_producted=mysqli_fetch_assoc($run_product);
                        }
                        
                        ?>
                <tr>
                    <td><?= $selected_producted['name'] ?></td>
                    <td><img src="images/database_Images/<?= $selected_producted['product_image1'] ?>" width="100px" height="100px" alt=""></td>
                   
                    <td><input type="checkbox" name="removeItems_ids[]" id="" value="<?php echo $selected_producted['id'] ; ?>"></td>
                    
                    
                    <td><?= $selected_producted['price'] * $cart['quantity'] ?></td>
                    <td>
                    <!-- <a href="handles/romove_cart.php" class="btn btn-danger px-2"> Remove</a> -->
                    <input type="submit" class="btn btn-danger px-2" value="Remove" name="remove">
                    </td>
                    <td>
                    <a href="handles/update_cart.php?id=<?php echo $selected_producted['id'] ; ?>" class="btn btn-info px-2"> update</a>
                    

                    </td>
                </tr>
         <?php     }
                 
                function RemoveItem()
                {
                  global $conn;
                  if(isset($_POST['remove']))
                  {
                    foreach ($_POST['removeItems_ids'] as $remove_item_id) {
                      // var_dump( $remove_item);
                      $rmove_cart="delete from `cart_details` where `product_id`='$remove_item_id'";
                      $remove_Run=mysqli_query($conn,$rmove_cart);
                      if($remove_Run)
                      {
                        $_SESSION['success']='items deleted successfully';
                        header("location:cart.php");
                      }
                      else{
                        $_SESSION['errors']=['items not deleted'];
                        header("location:cart.php");
                      }
                    }
                    
                  }
                }
                // if(!empty($carts)){

                //   RemoveItem();
                // }
                  RemoveItem();

                 ?>
            </tbody>
          </form>
          </table>
          <?php
                          
                   }     ?>
          <div class="my-4 d-flex">
            <?php
            if(!empty($carts)){?>
            <h4 class="px-4">SubTotal : <strong class="text-danger"><?= $total ?></strong></h4>
            <?php }
             ?>
            <a href="index.php" class="btn btn-info px-2"> continue shoping</a>
            <?php
            if(!empty($carts)){?>
            <a href="user_area/checkout.php" class="btn btn-secondary px-2 mx-2 text-light"> checkout</a>
            <?php }
             ?>
          </div>
        </div>
      </div>
      <?php
require_once 'inc/errors.php';
require_once 'inc/success.php';
?>
<!-- foot -->
<div class="bg-info text-center mt-2 p-3 position:0">
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>






<?php

include "inc/foot.php";
            }
            else {
              header("location:user_area/checkout.php");
      
          }
?>