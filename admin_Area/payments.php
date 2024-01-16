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
            <th>Invoice Number</th>
            <th>Amount</th>
            <th>payment mode</th>
            <th>Order Date</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($orders as $order) :
                    $order_id=$order['order_id'];
                    $seelct_mode="select * from `payment` where `order_id`=$order_id";
                    $runQuery=mysqli_query($conn,$seelct_mode);
                    if(mysqli_num_rows($runQuery)==1){
                        $payment=mysqli_fetch_assoc($runQuery);
                        $payment_mode=$payment['mode'];
                    }
                 if($order['order_status']=='compelete'):
            ?>
            <tr>
                <td><?= $num?></td>
                <td><?= $order['invoice_number'];?></td>
                <td><?= $order['amount'];?></td> 

                <td><?= $payment_mode;?></td>
                <td><?= $order['order_date'];?></td>
                <td class="text-center"><a href="../handles/deleteProduct.php?product_id=<?= $order['order_id'];?>" class="text-light"> <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
            $num++;
                 endif; 
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