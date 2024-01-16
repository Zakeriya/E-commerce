<?php
session_start();
require_once "../app/connection.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
<body class="bg-light">
   <div class="container mt-3">
    <h1 class="text-center">Insert products</h1>
    <form action="../handles/insertProductsHandle.php"  method="POST" enctype="multipart/form-data">
           <!-- product name -->
    <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="Product_Name" class="form-label">Product Name</label>
            <input type="text" name="product_Name" id="" autocomplete="off" required class="form-control" placeholder="type Product Name">
        </div>
    <!-- product description -->
    <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="description" class="form-label">Product description</label>
            <input type="text" name="description" id="" autocomplete="off" required class="form-control" placeholder="type Product description">
        </div>
        <!-- keywords -->
        <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="Product_keywords" class="form-label">Product keywords</label>
            <input type="text" name="product_keywords" id="" autocomplete="off" required class="form-control" placeholder="type Product keywords">
        </div>
        <!-- catigories -->
        <?php
        $query="select * from catigories";
        $runQuery=mysqli_query($conn,$query);

        if(mysqli_num_rows($runQuery)>0)
        {
            $catigories=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        }
        ?>
        <select name="product_catigories" id="" class="form-select w-50 m-auto">
            <optgroup label="select a catigory">
                <?php  
                foreach ($catigories as $catigory) {?>
                   
                
                <option value="<?php echo $catigory['id']?>"> <?php echo $catigory['catigoryName']?></option>
            <?php
            }
            ?>
            </optgroup>

        </select>

        <!-- brands -->
        <?php
        $query="select * from brands";
        $runQuery=mysqli_query($conn,$query);

        if(mysqli_num_rows($runQuery)>0)
        {
            $brands=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        }
        ?>
        <select name="product_brands" id="" class="form-select w-50 m-auto my-4">
            <optgroup label="select a brand">
                <?php  
                foreach ($brands as $brand) {?>
                   
                
                <option value="<?php echo $brand['id']?>"> <?php echo $brand['brandName']?></option>
            <?php
            }
            ?>
            </optgroup>

        </select>
        <!-- images -->
        <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="image1" class="form-label">Image 1</label>
            <input type="file" name="image1" id="" autocomplete="off"  >
        </div>
        <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="image2" class="form-label">Image 2</label>
            <input type="file" name="image2" id="" autocomplete="off"  >
        </div>
        <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="image3" class="form-label">Image 3</label>
            <input type="file" name="image3" id="" autocomplete="off"  >
        </div>
        <!-- price -->
        <div class="form-outline mb-4 mt-2 w-50 m-auto">
            <label for="Price" class="form-label">Product Price</label>
            <input type="text" name="price" id="" autocomplete="off" required class="form-control" placeholder="type Product Price">
        </div>
        <!-- submit  -->
        <!-- <div class="form-outline mb-4 mt-2 w-50 m-auto text-center">
        <input type="submit" value="insert product" name="insert_product" class="btn btn-info">            
        </div> -->
        <div class="form-outline mb-4 mt-2 w-50 m-auto text-center"> 
            <button type="submit"  class="btn btn-info" name="insert_product">insert product</button>
        </div>
    </form>

   </div> 



<!-- js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
     crossorigin="anonymous"></script>
     <script src="js/all.min.js"></script>
</body>
</html>