<?php

require_once "../app/connection.php";
// session_destroy();
session_start();
if(isset($_POST['submit']))
{
    $catigory_Name=$_POST['catigory_Name'];
    

    if(empty($catigory_Name))
    {
        $_SESSION['errors']=['there is no catigory name'];
        header("location:../admin_area/index.php?insertCatigory");
        // die("$catigory_Name");
    }
    elseif (is_numeric($catigory_Name))

    {
        $_SESSION['errors']=['catigory name can not be a number'];
        header("location:../admin_area/index.php?insertCatigory");
        // die("yes");
    }

    else
    {
            
            $selectAll="select * from catigories";
            $allRunQuery=mysqli_query($conn,$selectAll);
            $catigories=[];
            if(mysqli_num_rows($allRunQuery)>0)
            {
                $catigories=mysqli_fetch_all($allRunQuery,MYSQLI_ASSOC);
                foreach ($catigories as $catigory)
                {
                    if($catigory_Name==$catigory['catigoryName'])
                        {
                            $_SESSION['errors']=['catigory name is exsits'];
                            header("location:../admin_area/index.php?insertCatigory");
                            die(); 
                        }
                }
            }    

            $query="insert into catigories(`catigoryName`)values('$catigory_Name')";
            $runQuery=mysqli_query($conn,$query);
                
            if($runQuery)
                {
                    $_SESSION['success']="catigory inserted successfully";
                    header("location:../admin_area/index.php");
                    // die();
                }
            else
            {
                    $_SESSION['errors']=['error while inserting'];
                    header("location:../admin_area/index.php?insertCatigory");
                    // die(); 
            }
            
        }
            
    
}
    


else 
{
    $_SESSION['errors']=['faild to open'];
    header("location:../admin_area/index.php?insertCatigory");
}