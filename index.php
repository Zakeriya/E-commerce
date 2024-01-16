<?php
    session_start();


    include 'inc/head.php';
require_once 'app/connection.php';
require_once 'functions/all_functions.php';
require_once 'queries.php';
include 'inc/navbar.php';

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
<div class="row p-0 m-0">
    
    <div class="col-md-10">
        <!-- products -->
        <div class="row">
     <?php 


if(isset($_GET['search_data'])){

    get_Searched_Products($products);
}
else
{
    getProducts($products); 
}

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

    //  echo get_ip();
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


?>