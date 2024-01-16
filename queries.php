<?php
// @session_start();
$query="select * from catigories ";
$runQuery=mysqli_query($conn,$query);
$catigories=[];
// $user_id=$_SESSION['user_id'];


if(mysqli_num_rows($runQuery)>0)
{
    $catigories=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}
$query="select * from brands ";
$runQuery=mysqli_query($conn,$query);
$brands=[];
if(mysqli_num_rows($runQuery)>0)
{
    $brands=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}

$query="select * from products order by rand() limit 0,3";
$runQuery=mysqli_query($conn,$query);
$products=[];
if(mysqli_num_rows($runQuery)>0)
{
    $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($catigories);
}
if(isset($_GET['search_data'])){

    $searched=$_GET['search_input']; 
    $search_items="select * from products where name like '%$searched%' ";
    $runQuery=mysqli_query($conn,$search_items);
    $products=[];
    if(mysqli_num_rows($runQuery)>0)
    {
        // $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        $products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
        // var_dump($products);
    }
    }
    $ip_address=get_ip();
    // echo $ip_address;
    if(isset($_SESSION['user_id'])){

        $user_id=$_SESSION['user_id'];
        $check="select * from `cart_details` where `user_id`='$user_id'";
        $runQuery=mysqli_query($conn,$check);
        $count_num=mysqli_num_rows($runQuery);
        // echo $count_num;
        $_SESSION['count']=$count_num;
    }


    //get by ip
    if(isset($_SESSION['user_id'])){

        $total=0;
        $get_by_ip="select * from `cart_details` where `user_id`='$user_id'" ;//1
    $runQuery=mysqli_query($conn,$get_by_ip);
    if(mysqli_num_rows($runQuery)){
        $ip_rows=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);//
        // var_dump($ip_rows);
        // echo "<hr>";
        foreach ($ip_rows as $ip_row)
         {
             // var_dump($ip_row);//3
            $product_id=$ip_row['product_id'];//first id is 3  / second id is 5 
            $quantity=$ip_row['quantity'];//first id is 3  / second id is 5 
            // // echo $product_id."<br>";
            // echo "<hr>";
            // echo $quantity."<br>";
            // echo "<hr>";

            
            $query="select * from `products`where `id` =$product_id ";
            $runQuery=mysqli_query($conn,$query);
            $price=mysqli_fetch_assoc($runQuery);
            // echo "<hr>";
            // var_dump($price['price']);
            $total=$total+($price['price']*$quantity);
            
            // echo "<hr>";
            // echo "total is $total";
            // echo "<hr>";
            
        }
    }
    // dispaly_total($total);
}
$product_query="select * from products";
$runQuery=mysqli_query($conn,$product_query);
$all_products=[];
if(mysqli_num_rows($runQuery)>0)
{
    $all_products=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    // var_dump($all_products);
}


