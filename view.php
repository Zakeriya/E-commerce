<?php
session_start();
if(isset ($_SESSION['user_email'])){
require_once 'app/connection.php';
include 'inc/head.php';
include 'inc/navbar.php';
require_once 'functions/all_functions.php';
// require_once 'queries.php';
if(isset($_GET['id']))
{
    $product_id=$_GET['id'];
}
$query="select * from products where `id` = $product_id";
$runQuery=mysqli_query($conn,$query);
$product=[];
if(mysqli_num_rows($runQuery)>0)
{
    $product=mysqli_fetch_assoc($runQuery);
    // var_dump($catigories);
}
?>
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
<div class="row p-0 m-0">
    
    <div class="col-md-12">
        <!-- products -->
        <div class="row">
     <?php 
        getOneProduct($product);
     
    ?>    
        </div>
    </div>


   
</div>

<!-- foot -->
<div class="bg-info text-center mt-2 p-3">
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>






<?php
include "inc/foot.php";
}

else {
    header("location:user_area/checkout.php");


}
?>