<?php
session_start();
require_once '../app/connection.php';
require_once '../functions/all_functions.php';

if(isset($_POST['Login']))
{

    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    $select="select * from `users` where `user_email`= '$user_email'";
    $runQuery=mysqli_query($conn,$select);
    
    if(mysqli_num_rows($runQuery)==1)
    {
        $account=mysqli_fetch_assoc($runQuery);
        $pass=$account['user_password'];
        // $user_id

        $check_password=password_verify($user_password,$pass);

        if($check_password)
        {
            $ip=get_ip();
            $_SESSION['user_email']=$user_email;
            $_SESSION['user_name']=$account['user_name'];
        $_SESSION['user_id']=$account['user_id'];

            // $_SESSION['user_id']=$account['user_id'];
            $user_id=$account['user_id'];
            $check_cart="select * from `cart_details` where `user_id`= '$user_id' ";
            $run_cart=mysqli_query($conn,$check_cart);
            if(mysqli_num_rows($run_cart)>0)
            {
                $_SESSION['user_name']=$account['user_name'];
                
                header("location:../user_area/checkout.php");  
            }
            else
            {
              header("location:../profile.php");  
            }
            // echo $account['user_id'];
        }
        else
        {
            $_SESSION['errors']=["invalid credentials"];
            header("location: ../user_area/checkout.php");

        }

    }

    else
    {
        $_SESSION['errors']=["wrong email"];
        header("location: ../user_area/checkout.php");

    }
}

else
{
    $_SESSION['errors']=["cam't go towards it "];
    header("location: ../user_area/checkout.php");

}
