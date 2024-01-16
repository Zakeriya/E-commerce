<?php
require_once '../app/connection.php';
session_start();
$order_id=$_GET['order_id'];
if(isset($_POST['confirm']))
{
// $select_order_details="select * from `user_orders` where `order_id`=$order_id";

// $runQuery=mysqli_query($conn,$select_order_details);
// $order=[];
// if(mysqli_num_rows($runQuery)==1)
// {
//    $order=mysqli_fetch_assoc($runQuery);

// }

$payment_mode=$_POST['payment_mode'];
$invoice_number=$_POST['invoice_number'];
$amount=$_POST['amount'];

$inseert_payment="insert into `payment`(order_id,invoice_number,amount,mode)values('$order_id','$invoice_number','$amount','$payment_mode')";
$runQuery=mysqli_query($conn,$inseert_payment);

if($runQuery)
{
    $update_user_order_table="update `user_orders` set `order_status` ='compelete' where `order_id`=$order_id";
    $runQuery=mysqli_query($conn,$update_user_order_table);
    if($runQuery)
    {
        $_SESSION['success']='payment has been successfully';
        header("location:../profile.php?my_orders");
    }
    else {
        $_SESSION['errors']=['error while updating'];
    }


}
else
{
    header("location:../profile_pages/confirm.php?order_id=$order_id");
}

}

else {
   header("location:profile_pages/confirm.php?order_id=$order_id");
}