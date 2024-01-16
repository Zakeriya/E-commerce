<?php
// session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet"
     integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid  my-2">
        <h1 class="text-center">User Login</h1>
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-lg-12 col-xl-6">
                <form action="../handles/handleLogin.php" method="post" enctype="multipart/form-data" class="">
                    <!-- user name -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_email" class="label-control mb-2" >User email</label>
                    <input type="email" name="user_email" id="" placeholder="Enter user email" autocomplete="off" class="form-control " required>
                    </div>
                    
                    <!--  password -->
                    <div class="outline w-100 m-auto mb-3">
                    <label for="user_password" class="label-control mb-2" >Password</label>
                    <input type="password" name="user_password" id="" placeholder="Enter user password" autocomplete="off" class="form-control " required>
                    </div>
                    <p class="text-center small fw-bold mt-2"><a href="register.php" class="text-info"> Forget password</a></p>
                    <div class="text-center">
                        <button type="submit" name="Login" class="btn btn-info my-2 py-2 px-3">Login</button>
                    </div>
                    <p class="text-center small fw-bold mt-2"> don't have an account ?  <a href="register.php" class="text-danger text-decoration-none"> register</a></p>
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