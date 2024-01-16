<?php
require_once '../app/connection.php';
$selectbarnds="select * from `brands`";
$runQuery=mysqli_query($conn,$selectbarnds);
$barnds=[];
if(mysqli_num_rows($runQuery)>0)
{
    $barnds=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
}
$number=1;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center text-success my-1">All barnds</h1>
  <div class="w-75 m-auto mb-5">
  <table class="table table-bordered mt-3 mx-1 text-center ">
        <thead class="bg-secondary">
        <tr>
            <th>sl number</th>
            <th>brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($barnds as $brand) :
            ?>
            <tr>
                <td><?=$number?></td>
                <td><?= $brand['brandName'];?></td>
                <td><a href="index.php?edit_brand&brand_id=<?= $brand['id'];?>" class="text-light"> <i class="fa-solid fa-pen-to-square"></i> </a></td>
                <td class="text-center"><a href="delete_brand.php?brand_id=<?= $brand['id'];?>" class="text-light"> <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
            $number++;
                endforeach;
            ?>
        </tbody>
    </table>
  </div>
</body>
</html>