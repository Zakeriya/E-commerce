<?php
ob_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
</head>
<body>
    <h3 class="text-danger text-center my-3">Delete account</h3>
    <form action="" method="post" class="mt-3">
        <div class="form-outlien mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="delete_account" value="Delete account">
        </div>
        <div class="form-outlien mb-4">
            <input type="submit" class="form-control w-50 m-auto" name="dont_delete_account" value="Don't delete account">
        </div>
    </form>
</body>
</html>

<?php
if(isset($_POST['delete_account']))
{
$email=$_SESSION['user_email'];
$deleteAccount="delete from `users` where `user_email`='$email'";
$runQuery=mysqli_query($conn,$deleteAccount);
if($runQuery)
{
    session_destroy();
    $_SESSION['success']='account deleted ';
    
    header("location:index.php");
}
else {
    echo "no";
}
}

if(isset($_POST['dont_delete_account']))
{
    
    header("location: index.php");
    ob_end_flush();
}