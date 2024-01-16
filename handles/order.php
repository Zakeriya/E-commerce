<?php
require_once '../app/connection.php';
require_once '../functions/all_functions.php';
session_start();
if(isset($_GET['user_id']))
{
    $user_id= $_GET['user_id'];
    // $user_id=get_ip();
    

    $carts=[];
    $select_carts="select * from `cart_details` where `user_id`= '$user_id'";
    $runCart=mysqli_query($conn,$select_carts);
    if(mysqli_num_rows($runCart)>0){
        $count=mysqli_num_rows($runCart);
        $carts=mysqli_fetch_all($runCart,MYSQLI_ASSOC);//quantity and product_id
    }
    foreach ($carts as $cart) {
    //    echo $cart['product_id'];
    //    echo "<br>";
    $product_id=$cart['product_id'];
    $quantity=$cart['quantity'];
    $count_items=0; 
    
    $select_product="select * from `products` where `id` =$product_id ";
    $run_product=mysqli_query($conn,$select_product);
    if(mysqli_num_rows($run_product)==1)
    {
        $product=mysqli_fetch_assoc($run_product);
        // var_dump($product);
        // echo "<hr>";
        $total_prices=$product['price']*$quantity;
        $count_items+=$quantity;

        $invoice=mt_rand();
        $status="pending";

        $insert_Pending_Order=" INSERT into `user_orders` (`user_id`,`amount`,`invoice_number`,`total_products`,
        `order_status`)
        VALUES('$user_id','$total_prices','$invoice','$count_items','$status')";

        $runOrder=mysqli_query($conn,$insert_Pending_Order);

        if($runOrder)
        {
            $delete_cart="delete from `cart_details` where `user_id`= '$user_id' ";
            $run_delete=mysqli_query($conn,$delete_cart);
            if($run_delete)
            {

                $_SESSION['success']='order has been picked successfully';
                header("location:../index.php");
            }
            else
            {
                $_SESSION['errors']=['somethoing went wrong with deleteing cart'];
                header("location:../user_area/checkout.php");
            }

        }
    }

    }

    // echo $total_prices;
    // echo $count_items;

    
    
   
        
    }
   




else{
    header("location:../user_area/checkout.php");
}