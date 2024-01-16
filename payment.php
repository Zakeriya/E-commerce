<?php
// echo $user_id;
?>
<body>
   <div class="container my-5">
    <h1 class="text-center text-info"> Payment options</h1>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6 my-4">
            <a href="https://www.paypal.com" class="text-decoration-none"><img src="../images/360_F_419958510_5RWBOEdL8zk7f4YNv7jnpsnnY2yEbekX.jpg" alt="" width="100%" > </a>
        </div>
        <div class="col-md-6">
            <a href="../handles/order.php?user_id=<?php echo $user_id ?>" class="text-decoration-none"><h2 class="text-center text-danger">pay offline</h2></a>
        </div>
    </div>
   </div>
</body>
</html>