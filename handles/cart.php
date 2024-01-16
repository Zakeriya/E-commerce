<?php
require_once '../app/connection.php';
require_once '../functions/all_functions.php';
session_start();
if(isset($_GET['id']))
{
    // echo $_GET['id'];

    $product_id=$_GET['id'];
    $ip_address=get_ip();
    // echo $product_id;
    // echo $ip_address;
    if(isset($_SESSION['user_id']))
    {
        $user_id=$_SESSION['user_id'];
    }
    $check="select * from `cart_details` where `product_id`='$product_id' and `user_id`='$user_id'";
    $runQuery=mysqli_query($conn,$check);
    if(mysqli_num_rows($runQuery)>0)
    {
        $_SESSION['errors']=['item is already picked'];
        header("location:../index.php");
    }
    else
    {
        $insert="insert into cart_details (`product_id`,`user_id`,`quantity`) values('$product_id','$user_id',1) ";
        $runQuery=mysqli_query($conn,$insert);
        if($runQuery)
        {
            $_SESSION['success']='item inserted';
            // $_SESSION['ip_address']=$ip_address;
            header("location:../index.php");

        }
        else
        {
            $_SESSION['errors']=['item not inserted'];
             header("location:../index.php");
        }
    }

}
else 
{
    header("location:../index.php");
}