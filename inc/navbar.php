<div class="container-fluid p-0">
<nav class="navbar navbar-expand-lg navbar-light  bg-info">
  <div class="container-fluid">
    <img src="images/logo.png" alt="" class="logo" width="5%" height="5%">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="display.php">Products</a>
        </li>
        <?php
        if(!isset($_SESSION['user_email'])){?>
        <li class="nav-item">
      <a class="nav-link" href="user_area/register.php">Register</a>
    </li>
   <?php     }  
   else {
   ?>
    <li class="nav-item">
      <a class="nav-link" href="profile.php">My profile</a>
    </li>
   <?php }?>
   
        
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li><li class="nav-item">
          <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sub><?php
          // echo $_SESSION['count'];
          if(isset($_SESSION['count']))
          {
            echo $_SESSION['count'];
          }
          ?> </sub></a>
        </li><li class="nav-item">
          <a class="nav-link" href="#">Price <?php if(!empty($total))
          {?>
            <span class="text-danger"><?= dispaly_total($total);?></span>
         <?php }  ?>/-</a>
        </li>
        
        
      </ul>
      <form class="d-flex" method="get" action="<?php $_SERVER['PHP_SELF']?>">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_input">
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
        <input type="submit" value="search" class="btn btn-outline-light" name="search_data">
      </form>
      <?php
      if(isset($_GET['search_data'])){?>

        <a href="index.php" class="btn btn-secondary mx-2">back</a>
    <?php  } ?>
    </div>
  </div>
</nav>
</div>