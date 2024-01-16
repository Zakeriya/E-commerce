<?php
session_start();
require_once '../app/connection.php';
require_once '../functions/all_functions.php';

if(isset($_POST['register']))
{
    
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $confirm_password=$_POST['confirm_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];

    //image
    $image=$_FILES['user_image'];
    $user_image=$image['name'];
    $tmp_name=$image['tmp_name'];

//     $image1=$_FILES['image1']['name'];
// $image2=$_FILES['image2']['name'];
// $image3=$_FILES['image3']['name'];

// // //tmp_images
// $tmp_name1=$_FILES['image1']['tmp_name'];
// $tmp_name2=$_FILES['image2']['tmp_name'];
// $tmp_name3=$_FILES['image3']['tmp_name'];

    $ip=get_ip();


    
    
    $select_all="select * from users where `user_email` = '$user_email'";
    $runQuery=mysqli_query($conn,$select_all);

    if(mysqli_num_rows($runQuery)>0)
    {
    $_SESSION['errors']=["account already exsists"];
    header("location: ../user_area/register.php");
    die();
    }



    if($confirm_password!=$user_password)
    {
        $_SESSION['errors']=["passwords don't match"];
        header("location: ../user_area/register.php");
        die();  
    }
    $hashed_pass=password_hash($user_password,PASSWORD_BCRYPT);
    $insert="INSERT INTO users (`user_email`,`user_password`,`user_name`,`user_ip`,
    `user_address`,`user_image`,`user_mobile`)
     VALUES('$user_email','$hashed_pass','$user_name','$ip','$user_address','$user_image','$user_mobile')";
    
    $runInsert=mysqli_query($conn,$insert);

    if($runInsert)
    {
    
    move_uploaded_file($tmp_name,"../images/users_images/$user_image");
    // move_uploaded_file($tmp_name3,"../images/database_Images/$image3");
    $check_cart="select * from `cart_details` where `ip_address`='$ip'";
    $run_check_cart_Query=mysqli_query($conn,$check_cart);

    if(mysqli_num_rows($run_check_cart_Query)>0)
    {
    echo "<script>alert('you have items in the cart')</script>";
    $_SESSION['user_name']=$user_name;
    header("location:../user_area/checkout.php ");
    die();
    }
    $_SESSION['success']="New user inserted successfully ";
    header("location: ../user_area/login.php");
    // echo "success";
    
    }
    else
    {
    $_SESSION['errors']=["error while inserting"];
    header("location: ../user_area/register.php");
    }

}
else
{
    $_SESSION['errors']=["cam't"];
    header("location: ../user_area/register.php");

}