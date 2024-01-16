<?php
session_start();
require_once '../app/connection.php';
if(isset($_POST['register']))
{
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    
    
    $user_image=$_FILES['user_image'];
    $image_name=$user_image['name'];
    $tmp=$user_image['tmp_name'];

    $ip=0;
    if(!empty($_SERVER['HTTP_CLIENT_IP'])) {   
        $ip=$_SERVER['HTTP_CLIENT_IP'];   
    }   
    //if user is from the proxy   
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];   
    }   
    //if user is from the remote address   
    else{   
       $ip=$_SERVER['REMOTE_ADDR'];   
    } 

    if(!empty($user_name)&& !empty($user_address) && !empty($user_email) && !empty($user_mobile) &&
    !empty($user_image) && !empty($user_password)
    )
    {
                $search_user="select * from `users` where `user_email`='$user_email'";
                $runQuery=mysqli_query($conn,$search_user);
                
                if(mysqli_num_rows($runQuery)< 0)

                {
                    $hash_pass=password_hash($user_password,PASSWORD_DEFAULT);
                    $insert_user="INSERT INTO users 
                    (`user_email`,`user_password`,`user_name`,`user_ip`,`user_address`,`user_image`,`user_mobile`)
                    VALUES('$user_email','$hash_pass','$user_name','$ip','$user_address','$image_name','$user_mobile') ";

                    $runQuery=mysqli_query($conn,$insert_user);

                    if($runQuery)
                    {
                        move_uploaded_file($tmp,"../images/users_images/$image_name");
                        $_SESSION['success']='user registered successfully';
                        header('location: admin_login.php');
                    }
                    
                    else {
                        $_SESSION['errors']=['error while inserting user'];
                    }
                }

                else {
                    $_SESSION['errors']=['user has an account'];
                    header('location:admin_register.php');
                }

                    
                
    }

            
            
        
            
                //else 
                else 
            {
                    $_SESSION['errors']=['all data must be filled'];
                    header('location:admin_register.php');

            }
    
}

else 
{
    header("location:index.php");
}