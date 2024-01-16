<?php
require_once '../app/connection.php';
session_start();
if(isset($_GET['product_id'])){
    $product_id= $_GET['product_id'];

    $search_product="select * from `products` where `id` ='$product_id' ";
    $runQury=mysqli_query($conn,$search_product);

    if(mysqli_num_rows($runQury)==1)
    {
        $product=mysqli_fetch_assoc($runQury);

        $delete_product="delete from `products` where `id` = $product_id";
        $runQury=mysqli_query($conn,$delete_product);

        if($runQury)
        {
            $image1=$product['product_image1'];
            $image2=$product['product_image2'];
            $image3=$product['product_image3'];
            unlink("../images/database_Images/$image1");
            unlink("../images/database_Images/$image2");
            unlink("../images/database_Images/$image3");

            $_SESSION['success']='product deleted successfully';
            header("location:../admin_area/index.php");
        }

    }
    else {
        $_SESSION['errors']=['product not found'];
        header("location:../admin_area/index.php");
    }
}