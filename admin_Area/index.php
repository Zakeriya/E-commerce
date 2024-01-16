<?php
session_start();
ob_flush();
require_once '../app/connection.php';
if(isset($_SESSION['admin_name']))
{
    $admin_name=$_SESSION['admin_name'];

    $search_user="select * from `users` where `user_name`='$admin_name'";
    $runQuery=mysqli_query($conn,$search_user);

    if(mysqli_num_rows($runQuery)==1)
    {
        $admin=mysqli_fetch_assoc($runQuery);
        $admin_picture=$admin['user_image'];
    }

{

}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <!-- bootstrp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <!-- css file -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- font awsome -->
    <link rel="stylesheet" href="../css/all.min.css">
    
   
</head>
<body>
    <div class="container-fluid p-0 m-0">
            <nav class="navbar navbar-expand-lg navbar-light bg-info">
                    <div class="container-fluid">
                        <img src="../images/stuff/25179-2-sunglasses-transparent-background.png" alt="" class="logo">
                        <!-- <nav class="navbar navbar-expand-lg">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="" class="nav-link">Welecome guest</a>
                                    </li>
                                </ul>
                        </nav> -->
                        <div>
                        <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <a href="" class="nav-link text-dark">Welecome <?=$admin_name ?></a>
                                    </li>
                                </ul>
                        </div>
                    </div>
            </nav>
    </div>
    <!-- under navbar -->
    <div class="my-2">
        <h3 class="text-center text-light">Mange details</h3>
    </div>
    <!-- under h3  -->
    <div class="row bg-secondary mt-3">
        <div class="col-md-3">
            <div >
                <a href="" class="nav-link"><img src="../images/users_images/<?=$admin_picture?>" 
                alt="" width="65%" style="object-fit:contain"></a>
        <p class="text-light ms-5 mt-1"> <?=$admin_name ?></p> 

            </div>
        </div>
        <div class="col-md-9 mt-2">
        <div class="button text-center my-2">
                    <button class="bg-info"><a href="insertProduct.php" class="text-dark nav-link  my-1"> Insret Products </a></button>
                    <button class="bg-info"><a href="index.php?view_products" class="text-light nav-link  my-1">View Products</a></button>
                    <button class="mb-2 bg-info"><a href="index.php?insertCatigory" class="text-light nav-link  my-1">Insret Catigories</a></button>
                    <button class="bg-info"><a href="index.php?view_catigory" class="text-light nav-link  my-1">View Catigories</a></button>
                    <button class="bg-info"><a href="index.php?insertBrands" class="text-light nav-link  my-1"> Insret brands</a></button>
                    <button class="bg-info"><a href="index.php?view_brand" class="text-light nav-link  my-1">View brands</a></button>
                    <button class="bg-info"><a href="index.php?allOrders" class="text-light nav-link  my-1">All orders</a></button>
                    <button class="bg-info"><a href="index.php?payments" class="text-light nav-link  my-1">All payments</a></button>
                    <button class="bg-info"><a href="index.php?list_user" class="text-light nav-link  my-1">List users </a></button>
                    <button class="bg-info"><a href="logout.php" class="text-light nav-link  my-1"> Logout</a></button>
                </div>
                
        </div>

    </div>
    <!-- insert forms -->
    <?php
    if(isset($_GET['insertCatigory'])){
        require_once('insertCatigoryForm.php');
    }
    if(isset($_GET['insertBrands'])){
        include('insertBrandsForm.php');
    }
    if(isset($_GET['view_products'])){
        include('view_products.php');
    }
    if(isset($_GET['edit_product'])){
        include('edit_product.php');
    }
    if(isset($_GET['view_brand'])){
        include('view_brand.php');
    }

    if(isset($_GET['view_catigory'])){
        include('view_catigory.php');
    }

    if(isset($_GET['edit_catigory']))
{
    include("edit_catigory.php");
}

if(isset($_GET['edit_brand']))
{
    include("edit_brand.php");
}

if(isset($_GET['allOrders']))
{
    include("allOrders.php");
}

if(isset($_GET['payments']))
{
    include("payments.php");
}
if(isset($_GET['list_user']))
{
    include("list_user.php");
}
        
        ?>
    <?php require_once "../inc/errors.php" ?>
    <?php require_once "../inc/success.php" 
   
    ?>
    
    
    <!-- footer -->
    <div class="bg-info text-center mt-2 p-3 footer mt-5 " >
    <p>All Rights Reserved ©- designed by Zakeriye 2023 </p>
</div>

</body>
</html>

<?php

}

else {
    header('location:admin_login.php');

}