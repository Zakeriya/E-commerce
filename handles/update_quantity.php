<?php
session_start();
require_once '../app/connection.php';

if(isset($_POST['update_quantity']))
 {
    $quantity= $_POST['quantity'];
//    echo $_GET['id'];
    $product_id= $_GET['id'];
    $select="select * from `cart_details` where `product_id` ='$product_id'";
    $runQuery=mysqli_query($conn,$select);
    $cart=[];
    if(mysqli_num_rows($runQuery)==1)
    {
      
        $cart=mysqli_fetch_assoc($runQuery);
        // var_dump($cart);
        if(!empty($cart)){
            $query="update `cart_details` set `quantity` ='$quantity' where `product_id` ='$product_id'";
            $runQuery=mysqli_query($conn,$query);
            if($runQuery)
            {
                $_SESSION['success']='quantity updated successfully';
                header("location:../cart.php");
    
            }
            else {
                $_SESSION['errors']=['error while updating'];
                header("location:../cart.php");
            }
        }
    }
    

    else {
        $_SESSION['errors']=['cart not found'];
        header("location:../cart.php");
    }

 }
 else {
    header("location:../index.php");
 }