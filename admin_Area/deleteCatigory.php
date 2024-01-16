<?php
require_once '../app/connection.php';
session_start();
if(isset($_GET['catigory_id']))
{
$catigory_id=$_GET['catigory_id'];
$search_catigory="select * from `catigories` where `id` =$catigory_id";
$runQuery=mysqli_query($conn,$search_catigory);

if(mysqli_num_rows($runQuery)==1)
{
$delete_catigory="delete from `catigories` where `id` =$catigory_id";
$runQuery=mysqli_query($conn,$delete_catigory);

if($runQuery)
{
    $_SESSION['success']='catigory deleted successfully';
    header("location:index.php?view_catigory");
}

else {
    $_SESSION['errors']=['catigory not found'];
    header("location:index.php?view_catigory");
}


}

else {
    $_SESSION['errors']=['catigory not found'];
    header("location:index.php?view_catigory");
}
}