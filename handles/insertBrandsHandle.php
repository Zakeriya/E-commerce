<?php

require_once "../app/connection.php";
// session_destroy();
session_start();
if(isset($_POST['brandsInsert']))
{
    $brand_Name=$_POST['brand_Name'];
    

    if(empty($brand_Name))
    {
        $_SESSION['errors']=['there is no brand name'];
        header("location:../admin_area/index.php?insertBrands");
        // die("$brand_Name");
    }
    elseif (is_numeric($brand_Name))

    {
        $_SESSION['errors']=['brand name can not be a number'];
        header("location:../admin_area/index.php?insertBrands");
        // die("yes");
    }

    else
    {
            
            $selectAll="select * from brands";
            $allRunQuery=mysqli_query($conn,$selectAll);
            $brands=[];
            if(mysqli_num_rows($allRunQuery)>0)
            {
                $brands=mysqli_fetch_all($allRunQuery,MYSQLI_ASSOC);
                foreach ($brands as $brand)
                {
                    if($brand_Name==$brand['brandName'])
                        {
                            $_SESSION['errors']=['brand name is exsits'];
                            header("location:../admin_area/index.php?insertBrands");
                            die(); 
                        }
                }
            }    

            $query="insert into brands(`brandName`)values('$brand_Name')";
            $runQuery=mysqli_query($conn,$query);
                
            if($runQuery)
                {
                    $_SESSION['success']="brand inserted successfully";
                    header("location:../admin_area/index.php");
                    // die();
                }
            else
            {
                    $_SESSION['errors']=['error while inserting'];
                    header("location:../admin_area/index.php?insertBrands");
                    // die(); 
            }
            
        }
            
    
}
    


else 
{
    $_SESSION['errors']=['faild to open'];
    header("location:../admin_area/index.php?insertBrands");
}