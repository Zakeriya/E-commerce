<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="row">
        <h3 class="text-center text-success">Edit Account</h3>
        <div class="text-center ">
            <form action="handles/user_update.php?user_id=<?php echo $user['user_id'] ?>" method="post" enctype="multipart/form-data" >
                <input type="text" name="user_name" id="" class="form-control w-75 m-auto my-4" value="<?php echo $user['user_name'] ?>">
                <input type="email" name="user_email" id="" class="form-control w-75 m-auto my-4" value="<?php echo $user['user_email'] ?>">
                <div class="d-flex w-75 m-auto border border-2 border-light">
                <input type="file" name="user_image" id="" class="form-control  my-4 mx-2" >
                <img src="images/users_images/<?php echo $user['user_image'] ?>" alt="" style="width: 15%; height:15%">
                </div>
                <input type="text" name="user_address" id="" class="form-control w-75 m-auto my-4" value="<?php echo $user['user_address'] ?>">
                <input type="text" name="user_mobile" id="" class="form-control w-75 m-auto my-4" value="<?php echo $user['user_mobile'] ?>">

                <input type="submit" value="update user" class="btn btn-info" name="update_user">


            </form>
        </div>
        
    </div>
</body>
</html>

<?php




?>