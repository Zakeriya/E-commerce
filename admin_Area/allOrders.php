<?php
require_once '../app/connection.php';
$select_orders='select * from `user_orders`';
$runQuery=mysqli_query($conn,$select_orders);
if(mysqli_num_rows($runQuery))
{
    $orders=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
$num=1;
}

?>

<h1 class="text-center text-success my-2">All Orders</h1>
<?php
if(!empty($orders)){
?>
<div class="w-75 m-auto">
<table class="table table-bordered mt-3 mx-1 text-center ">
        <thead class="bg-secondary">
        <tr>
            <th>sl no</th>
            <th>Amount</th>
            <th>Invoice Number</th>
            <th>Total products</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($orders as $order) :
            ?>
            <tr>
                <td><?= $num?></td>
                <td><?= $order['amount'];?></td> 
                <td><?= $order['invoice_number'];?></td>
                <td><?= $order['total_products'];?></td>
                <td><?= $order['order_date'];?></td>
                <td><?= $order['order_status'];?></td>
                <td class="text-center"><a href="../handles/deleteProduct.php?product_id=<?= $order['order_id'];?>" class="text-light"> <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
            $num++;
                endforeach;
            ?>
        </tbody>
    </table>
    <?php
}

else {
  echo "<div class='text-center text-danger'> No orders</div>";  
}


?>
</div>