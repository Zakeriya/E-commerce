<?php
require_once '../app/connection.php';
session_start();
if(isset($_GET['brand_id']))
{
$brand_id=$_GET['brand_id'];
$search_brand="select * from `brands` where `id` =$brand_id";
$runQuery=mysqli_query($conn,$search_brand);

if(mysqli_num_rows($runQuery)==1)
{
$delete_brand="delete from `brands` where `id` =$brand_id";
$runQuery=mysqli_query($conn,$delete_brand);

if($runQuery)
{
    $_SESSION['success']='brand deleted successfully';
    header("location:index.php?view_brand");
}

else {
    $_SESSION['errors']=['brand not found'];
    header("location:index.php?view_brand");
}


}

else {
    $_SESSION['errors']=['brand not found'];
    header("location:index.php?view_brand");
}
}