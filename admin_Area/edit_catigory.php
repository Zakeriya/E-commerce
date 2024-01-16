<?php
ob_flush();
require_once '../app/connection.php';
   
$catigory_id=$_GET['catigory_id'];

$search_catigory="select * from `catigories` where `id` = $catigory_id";
$runQuery=mysqli_query($conn,$search_catigory);

if(mysqli_num_rows($runQuery)==1)
{
$catigory=mysqli_fetch_assoc($runQuery);
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
    <h2 class="text-center text-info">Edit Catigory</h2>

    <div>
    <form action="" method="post" >
        <label for="">Catigory name</label>
        <input type="text" name="catigoryName" id="" value="<?=$catigory['catigoryName']?>">
        <button type="submit" name="edited_catigory" class="btn btn-info">update</button>
    </form>
    </div>

</body>
</html>

<?php



if(isset($_POST['edited_catigory']))
{
    $catigoryName=$_POST['catigoryName'];
    $updateCatigory="update `catigories` set `catigoryName` ='$catigoryName' where `id`=$catigory_id";
    $runQuery=mysqli_query($conn,$updateCatigory);

    if($runQuery)
    {
        header("location:index.php?view_catigory");
       
    }
    else {
        $_SESSION['errors']=['error while updating catigory name'];
    header("location:index.php");
    ob_end_flush();

   
    

    }
}



