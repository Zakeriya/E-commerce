<?php
session_start();

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
    <div class="container-fluid  my-2">
        <h1 class="text-center">New user registeration form</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="../handles/handleRegister.php" method="post" enctype="multipart/form-data" class="">
                    <!-- user name -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_name" class="label-control mb-2" >UserName</label>
                    <input type="text" name="user_name" id="" placeholder="Enter user name" autocomplete="off" class="form-control " required>
                    </div>
                    <!-- Email -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_email" class="label-control mb-2">Email</label>
                    <input type="email" name="user_email" id="" placeholder="Enter user email" autocomplete="off" class="form-control " required>
                    </div>
                    <!-- image -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_iamge" class="label-control mb-2">image</label>
                    <input type="file" name="user_image" id=""  autocomplete="off" class="form-control " required>
                    </div>
                    <!--  password -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_password" class="label-control mb-2" >Password</label>
                    <input type="password" name="user_password" id="" placeholder="Enter user password" autocomplete="off" class="form-control " required>
                    </div>
                    <!-- confirm password  -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="confirm_password" class="label-control mb-2" >Confirm password</label>
                    <input type="password" name="confirm_password" id="" placeholder="confirm password" autocomplete="off" class="form-control " required>
                    </div>
                    <!-- Address -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_address" class="label-control mb-2" >Address</label>
                    <input type="text" name="user_address" id="" placeholder="Enter address" autocomplete="off" class="form-control " required>
                    </div>
                    <!-- Contact -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_mobile" class="label-control mb-2" >Mobile number</label>
                    <input type="text" name="user_mobile" id="" placeholder="Enter user mobile" autocomplete="off" class="form-control " required>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-info my-2 py-2 px-3">Register</button>
                    </div>
                    <p class="text-center small fw-bold mt-2">Have an account ?  <a href="login.php" class="text-danger text-decoration-none"> Login</a></p>
                </form>
            </div>
        </div>
    </div>
    <?php
    require_once '../inc/errors.php';
    require_once '../inc/success.php';

    ?>
</body>
</html>