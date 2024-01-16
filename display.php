<?php
session_start();
if(isset ($_SESSION['user_email'])){
    

include 'inc/head.php';
include 'inc/navbar.php';
require_once 'functions/all_functions.php';
require_once 'app/connection.php';
// require_once 'queries.php';

$query="select * from products order by rand() limit 0,9";
$runQuery=mysqli_query($conn,$query);
$products=[];
if(mysqli_num_rows($runQuery)>0)
{
    $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}
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
    
    <div class="col-md-12">
        <!-- products -->
        <div class="row">
     <?php 

     
     if(isset($_GET['search_data'])){

         get_Searched_Products($products);
     }
     else
     {
        get_All_Products($products); 
     }
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