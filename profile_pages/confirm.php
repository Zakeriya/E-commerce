<?php
require_once '../app/connection.php';
session_start();
if(isset($_GET['order_id'])){

$order_id=$_GET['order_id'];

$query="select * from `user_orders` where `order_id`=$order_id ";
$runQuery=mysqli_query($conn,$query);
$order=[];
if(mysqli_num_rows($runQuery)==1)
{
    $order=mysqli_fetch_assoc($runQuery);
    $invoice=$order['invoice_number'];
    $amount=$order['amount'];
    
    
}
// echo $order_id;
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrp -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
    <!-- font awsome -->
    <link rel="stylesheet" href="../css/logo.css">
    <link rel="stylesheet" href="../css/all.min.css">
    
    
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center text-light">
                confirm payment
        </h1>
        <form action="../handles/payment_handle.php?order_id=<?=$order_id?>" method="post">
            <div class="my-4 m-auto w-50 text-center">
                <label for="" class="my-2 h-1">Amount</label>
                <input type="text" name="amount" class="form-control" value="<?= $amount?>">
            </div>
            <div class="my-4 m-auto w-50 text-center">
                <label for="" class="my-2 h-1">invoice number</label>
                <input type="text" name="invoice_number" class="form-control" value="<?=$invoice ?>">
            </div>
            <div class="my-4 m-auto w-50 text-center">
            <select  class="form-class m-auto w-50" name="payment_mode">
                <optgroup label="Select payment mode ">
                    <option value="UPI">UPI</option>
                    <option value="Netbanking">Netbanking</option>
                    <option value="Paypal">PAYPAL</option>
                    <option value="Cash">Cash on delivery</option>
                    <option value="Payofflie">Payofflie</option>
                    
                </optgroup>
                
            </select>
            </div>

            <div class="my-4 m-auto w-50 text-center">
                
                <input type="submit" name="confirm" class="btn btn-info my-3" value="confirm">
            </div>
        </form>
    </div>
</body>
</html>

<?php

}

else {
    header("location:../profile.php");
}