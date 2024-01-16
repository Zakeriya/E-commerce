

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="my-3 mx-2">
<table class="table" >
  <thead>
    <tr>
      <th scope="col">sl no</th>
      <th scope="col">order number</th>
      <th scope="col">Amount</th>
      <th scope="col">Total products</th>
      <th scope="col">invoice number</th>
      <th scope="col">Date</th>
      <th scope="col">complete/incompelete</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
        $count=1;
        foreach ($orders as $order) :
          // if($order['order_status']=='pending'){

          
    ?>
    <tr>
      <th scope="row"><?php echo $count  ?></th>
      <td><?= $order['order_id']  ?></td>
      <td><?= $order['amount']  ?></td>
      <td><?= $order['total_products']  ?></td>
      <td><?= $order['invoice_number']  ?></td>
      <td><?= $order['order_date']  ?></td>
      <td><div class="text-center"><span ><?= $order['order_status']=='pending'? "incomplete":"complete"; ?></span></div></td>
      <?php
      if($order['order_status']=='pending')
      {?>

<td><a href="profile_pages/confirm.php?order_id=<?= $order['order_id'] ;?>" class="text-info">confirm</a></td>
      <?php }
      else {?>
        <td>Paid</td>
       <?php }
      ?>
      
    </tr>
    <?php
        $count++;
      // }
        endforeach;
    ?>
  </tbody>
</table>
</div>
</body>
</html>