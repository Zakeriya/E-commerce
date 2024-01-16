<?php
session_start();
require_once '../app/connection.php';
if(isset($_POST['login']))
{
    $user_email=$_POST['user_email'];
    $user_password=$_POST['user_password'];

    if(!empty($user_email) && !empty($user_password))
    {
                $search_user="select * from `users` where `user_email`='$user_email'";
                $runQuery=mysqli_query($conn,$search_user);
                
                if(mysqli_num_rows($runQuery)==1)

                {
                   $user=mysqli_fetch_assoc($runQuery);
                   if($user['type']==1)
                   {
                    
                  
                   $databasePassword=$user['user_password'];

                   $check_pass=password_verify($user_password,$databasePassword);

                   if($check_pass)
                   {
                        $_SESSION['admin_name']=$user['user_name'];
                        $_SESSION['success']='Entered successfully';
                        header('location:index.php');

                   }

                    
                    else {
                        $_SESSION['errors']=['invalid credentials'];
                        header('location:admin_login.php');

                    }

                }

                else {
                    $_SESSION['errors']=['user is not an admin'];
                    header('location:admin_login.php');

                }
                }

                else {
                    $_SESSION['errors']=['invalid credentials'];
                    header('location:admin_login.php');
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
    header('location:admin_login.php');

}