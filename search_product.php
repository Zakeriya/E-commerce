<?php
include 'inc/head.php';
include 'inc/navbar.php';
require_once 'functions/all_functions.php';
require_once 'app/connection.php';
$query="select * from catigories ";
$runQuery=mysqli_query($conn,$query);
$catigories=[];
if(mysqli_num_rows($runQuery)>0)
{
    $catigories=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}
$query="select * from brands ";
$runQuery=mysqli_query($conn,$query);
$brands=[];
if(mysqli_num_rows($runQuery)>0)
{
    $brands=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}
if(isset($_GET['search_data'])){

$searched=$_GET['search_input']; 
$search_items="select * from products where name like '%$searched%' ";
$runQuery=mysqli_query($conn,$search_items);
$products=[];
if(mysqli_num_rows($runQuery)>0)
{
    // $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($products);
}
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
    
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
     <?php   
     get_Searched_Products($products); 
     if(isset($_GET['brand']))
     {
        $brand_id=$_GET['brand'];
        $query="select * from products where `brand_id` =$brand_id ";
        $runQuery=mysqli_query($conn,$query);
        $products=[];
        if(mysqli_num_rows($runQuery)>0)
        {
            $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
            // var_dump($catigories);
        }
        get_uique_brands($products);
     }
     

     elseif(isset($_GET['catigory']))
     {
        $catigory_id=$_GET['catigory'];
        $query="select * from products where `catigory_id` =$catigory_id ";
        $runQuery=mysqli_query($conn,$query);
        $products=[];
        if(mysqli_num_rows($runQuery)>0)
        {
            $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
            // var_dump($catigories);
        }
        get_uique_catigories($products);
     }
     ?>

           
           
            
        </div>
    </div>


    <div class="col-md-2 p-0 bg-secondary ">
        <!-- sidebar -->
        <!-- Brands -->
        <ul class="navbar-nav m-auto text-center ">
            <li class="nav-items">
                <a href="" class="bg-info nav-link"><h4 class="text-light">Delivery Brands</h4></a>
            </li>
            <?php getBrands($brands)?>
            
        </ul>
        <!-- Catigories -->
        <ul class="navbar-nav m-auto text-center ">
            <li class="nav-items">
                <a href="" class="bg-info nav-link"><h4 class="text-light">Catigories</h4></a>
            </li>
            <?php getCatigory($catigories); ?>
            
        </ul>
        
    </div>
</div>

<!-- foot -->
<div class="bg-info text-center mt-2 p-3">
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>






<?php
include "inc/foot.php";
?>