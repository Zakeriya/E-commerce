<?php
require_once '../app/connection.php';
$selectProducts="select * from `products`";
$runQuery=mysqli_query($conn,$selectProducts);
$products=[];
if(mysqli_num_rows($runQuery)>0)
{
    $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center text-success my-1">All Products</h1>
  <div class="w-75 m-auto mb-5">
  <table class="table table-bordered mt-3 mx-1 text-center ">
        <thead class="bg-secondary">
        <tr>
            <th>Product Id</th>
            <th>Product Title</th>
            <th>Product Image</th>
            <th>Product Price</th>
            <th>Total sold</th>
            <th>Status</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($products as $product) :
            ?>
            <tr>
                <td><?= $product['id'];?></td>
                <td><?= $product['name'];?></td>
                <td><img src="../images/database_Images/<?= $product['product_image1'];?>" alt="" style="width: 80px; height:100px;"></td>
                <td><?= $product['price'];?></td>
                <td>0</td>
                <td><?= $product['status'];?></td>
                <td><a href="index.php?edit_product&product_id=<?= $product['id'];?>" class="text-light"> <i class="fa-solid fa-pen-to-square"></i> </a></td>
                <td class="text-center"><a href="../handles/deleteProduct.php?product_id=<?= $product['id'];?>" class="text-light"> <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
                endforeach;
            ?>
        </tbody>
    </table>
  </div>
</body>
</html>