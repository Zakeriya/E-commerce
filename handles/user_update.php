<?php
require_once '../app/connection.php';
session_start();
if(isset($_POST['update_user']))
{
    $user_id=$_GET['user_id'];
    $user_name=$_POST['user_name'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];

    $image=$_FILES['user_image'];
    $user_image_name=$image['name'];
    $user_tmp_name=$image['tmp_name'];

   

    // echo $user_email;
    // echo "<hr>";
    

   
    
        
        $update_user="update users set `user_name` ='$user_name' ,`user_email`= '$user_email'
        ,`user_address`='$user_address',`user_mobile`='$user_mobile',`user_image`='$user_image_name'
         where `user_id` =$user_id
        ";
        $run_upadte=mysqli_query($conn,$update_user);

        if($run_upadte)
        {       
                $image_path="images/users_images/".$user['user_image'];
                unlink($image_path);
                move_uploaded_file($user_tmp_name,"../images/users_images/$user_image_name");
                $_SESSION['success']='user updateded successfully';
                unset($_SESSION['user_email']);
                unset($_SESSION['user_name']);
                $_SESSION['user_email']=$user_email;
                $_SESSION['user_name']=$user_name;
                header("location:../profile.php");
        }

        else
        {
            $_SESSION['errors']=["Error while updating "];
            header("location:../profile.php");
        }


}

else {
    header("location:../profile.php");

}