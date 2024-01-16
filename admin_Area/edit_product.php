<?php
require_once '../app/connection.php';
ob_start();
if(isset($_GET['product_id'])){


$product_id=$_GET['product_id'];
$select_products="select * from `products` where `id` =$product_id ";
$runQuery=mysqli_query($conn,$select_products);
$product=[];

if(mysqli_num_rows($runQuery)==1)
{
    $product=mysqli_fetch_assoc($runQuery);
}

?>

<div class="container mt-5 text-center">
    <h1 class="text-center text-danger">Edit product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product Title</label>
            <input type="text" class="form-control " name="name" value="<?= $product['name']?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product Description</label>
            <input type="text" class="form-control " name="description" value="<?= $product['description']?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product Keywords</label>
            <input type="text" class="form-control " name="keywords" value="<?= $product['keywords']?>" required>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <select name="catigory_id" id="" class="form-select">
               <optgroup label="Catigories">
                <?php
                $select_catigories="select * from `catigories`  ";
                $runQuery=mysqli_query($conn,$select_catigories);
                $catigories=[];
                
                if(mysqli_num_rows($runQuery)>0)
                {
                    $catigories=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
                }
foreach ($catigories as $catigory) :
    # code...


?>
                <option value="<?=$catigory['id'] ?>"><?=$catigory['catigoryName'] ?></option>
   <?php endforeach ?>             
               </optgroup>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-3">
            <select name="brand_id" id="" class="form-select">
               <optgroup label="brands">
                
               <?php
                $select_brands="select * from `brands`  ";
                $runQuery=mysqli_query($conn,$select_brands);
                $brands=[];
                
                if(mysqli_num_rows($runQuery)>0)
                {
                    $brands=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
                }
foreach ($brands as $brand) :
    # code...


?>
                <option value="<?=$brand['id'] ?>"><?=$brand['brandName'] ?></option>
   <?php endforeach ?>
               </optgroup>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product images 1</label>
            <div class="d-flex">
            <input type="file" class="form-control m-2" name="product_image1" required>
            <img src="../images/database_Images/<?= $product['product_image1']?>" alt="" style="width:100px;height:100px">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product images 2</label>
            <div class="d-flex">
            <input type="file" class="form-control m-2" name="product_image2" required>
            <img src="../images/database_Images/<?= $product['product_image2']?>" alt="" style="width:100px;height:100px">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product images 3</label>
            <div class="d-flex">
            <input type="file" class="form-control m-2" name="product_image3" required>
            <img src="../images/database_Images/<?= $product['product_image3']?>" alt="" style="width:100px;height:100px">
            </div>
        </div>

        <div class="form-outline w-50 m-auto mb-3">
            <label for="" class="form-label mt-2">Product Price</label>
            <input type="text" class="form-control " name="price" value="<?= $product['price']?>" required>
        </div>

        <div class="text-center my-4">
            <input type="submit" value="Update product" class="btn btn-info" name="edit_product">
        </div>
    </form>
</div>

<?php

}

else {
    header("location:index.php");
}

if(isset($_POST['edit_product']))
{
    $name=$_POST['name'];
    $description=$_POST['description'];
    $keywords=$_POST['keywords'];
    $catigory_id=$_POST['catigory_id'];
    $brand_id=$_POST['brand_id'];
    $price=$_POST['price'];

    $product_image1=$_FILES['product_image1'];
    $product_image2=$_FILES['product_image2'];
    $product_image3=$_FILES['product_image3'];

    $image1=$product_image1['name'];
    $image2=$product_image2['name'];
    $image3=$product_image3['name'];

    $tmp1=$product_image1['tmp_name'];
    $tmp2=$product_image2['tmp_name'];
    $tmp3=$product_image3['tmp_name'];

    $find_product="select * from `products` where `id`=$product_id";
    $runQuery=mysqli_query($conn,$find_product);

    if(mysqli_num_rows($runQuery)==1)
    {
        $product=mysqli_fetch_assoc($runQuery);
        $old_image1=$product['product_image1'];
        $old_image2=$product['product_image2'];
        $old_image3=$product['product_image3'];


        $update_product="update `products` set `name`='$name',`description`='$description',
        `keywords`='$keywords',`catigory_id`='$catigory_id',`brand_id`='$brand_id',
        `product_image1`='$image1',`product_image2`='$image2',`product_image3`='$image3',`price`='$price' 
        where `id`=$product_id
        
        ";
    
        $runUpdateQuery=mysqli_query($conn,$update_product);
    
        if($runQuery)
        {
            
            unlink("../images/database_Images/$old_image1");
            unlink("../images/database_Images/$old_image2");
            unlink("../images/database_Images/$old_image3");

            move_uploaded_file($tmp1,"../images/database_Images/$image1");
            move_uploaded_file($tmp2,"../images/database_Images/$image2");
            move_uploaded_file($tmp3,"../images/database_Images/$image3");
           
            $_SESSION['success']='product updated successfully';
            header("location:index.php?view_products");
        }
    
        else {
            $_SESSION['errors']=['error while updating'];
            header("location:index.php?view_products&product_id=$product_id");
        }
    }

    

    // echo $brand_id;
    // echo $catigory_id;
    // echo $image1;

    ob_end_flush();
}