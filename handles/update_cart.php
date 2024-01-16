<?php
require_once '../app/connection.php';
 if(isset($_GET['id']))
 {
   $product_id= $_GET['id'];
 }

 else {
    header("location:../index.php");
 }

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>quantities</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
 </head>
 <body>
   <div class="container text-center mt-5">
      <form action="update_quantity.php?id=<?php echo $product_id ?>" method="post">
         <label for="">Update quantity</label>
         <input type="number" name="quantity" id="" class="form-control my-2" placeholder="set quantity counts">
         <button type="submit" name="update_quantity" class="btn btn-info ">update</button>
      </form>
   </div>
 </body>
 </html>


 <?php

 