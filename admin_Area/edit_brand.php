<?php
ob_flush();
require_once '../app/connection.php';
   
$brand_id=$_GET['brand_id'];

$search_brand="select * from `brands` where `id` = $brand_id";
$runQuery=mysqli_query($conn,$search_brand);

if(mysqli_num_rows($runQuery)==1)
{
$brand=mysqli_fetch_assoc($runQuery);
}
else {
    header("location:index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="text-center">
    <h2 class="text-center text-info">Edit brand</h2>

    <div >
    <form action="" method="post" >
        <label for="">brand name</label>
        <input type="text" name="brandName" id="" value="<?=$brand['brandName']?>">
        <button type="submit" name="edited_brand" class="btn btn-info">update</button>
    </form>
    </div>

</body>
</html>

<?php



if(isset($_POST['edited_brand']))
{
    $brandName=$_POST['brandName'];
    $updatebrand="update `brands` set `brandName` ='$brandName' where `id`=$brand_id";
    $runQuery=mysqli_query($conn,$updatebrand);

    if($runQuery)
    {
        header("location:index.php?view_brand");
       
    }
    else {
        $_SESSION['errors']=['error while updating brand name'];
    header("location:index.php");
    ob_end_flush();

   
    

    }
}



