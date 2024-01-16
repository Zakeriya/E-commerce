<?php
// require_once './app/connection.php' ;

 function getProducts($products)
{
    if(!isset($_GET['catigory']))
    {
    if(!isset($_GET['brand']))
        {
        if(empty($products))
        {?>
            <h2 class="text-center text-danger"> no stuck found</h2>
            
        <?php }    
    
        foreach ($products as $product) 
        {?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                    <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="185px" style="object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-5">Add to cart</a>
                        <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">View</a>
                    </div>
                </div>
            </div>

  <?php   
        } 

    }
}       
}

function get_All_Products($products)
{
    if(!isset($_GET['catigory']))
    {
    if(!isset($_GET['brand']))
        {
        if(empty($products))
        {?>
            <h2 class="text-center text-danger"> no stuck found</h2>
            
        <?php }    
    
        foreach ($products as $product) 
        {?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                    <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="185px" style="object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-5">Add to cart</a>
                        <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">View</a>
                    </div>
                </div>
            </div>

  <?php   
        } 

    }
}       
}

function get_uique_catigories($products)
{
        if(empty($products))
        {?>
            <h2 class="text-center text-danger"> no stuck found</h2>
    <?php   }
        foreach ($products as $product) 
        {?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                    <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="185px" style="object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-5">Add to cart</a>
                        <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">View</a>
                    </div>
                </div>
            </div>

  <?php   
        } 

    }
      


function get_uique_brands($products)
{

        if(empty($products))
             {?>
                 <h2 class="text-center text-danger"> no stuck found</h2>
        <?php   }

        foreach ($products as $product) 
        {?>
            <div class="col-md-4 mb-2">
                <div class="card" >
                    <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="185px" style="object-fit: contain;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['name']; ?></h5>
                        <p class="card-text"><?php echo $product['description']; ?></p>
                        <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-5">Add to cart</a>
                        <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">View</a>
                    </div>
                </div>
            </div>

  <?php   
        } 

    }
      



function getBrands($brands)
{  
            foreach ($brands as $brand) {
                
            ?>
            <li class="nav-items">
                <a href="index.php?brand=<?php echo $brand['id'] ?> " class="text-light nav-link"> <?php echo $brand['brandName'] ?> </a>
            </li>

            <?php
                }
          
}

function getCatigory($catigories)
{
   
            foreach ($catigories as $catigory) {
                
            ?>
            <li class="nav-items">
                <a href="index.php?catigory=<?php echo $catigory['id'] ?> " class="text-light nav-link"> <?php echo $catigory['catigoryName'] ?> </a>
            </li>

            <?php
                }
         
}

function get_Searched_Products($products)
        {
            // var_dump($product);
          
                if(empty($products))
            {
                ?>
                 <h2 class="text-center text-danger"> not found</h2> 
                
             <?php 
            }    
        else
        {
                foreach ($products as $product)
                    {
                
                    
            
            ?> 
                 <div class="col-md-4 mb-2">
                    <div class="card" >
                        <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="185px" style="object-fit: contain;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info me-5">Add to cart</a>
                            <a href="view.php?id=<?php echo $product['id']; ?>" class="btn btn-secondary">View</a>
                        </div>
                    </div>
                </div> 

     
  <?php  } }   } 

  function getOneProduct($product)
  {?>
    <div class="row">
        <div class="col-md-4">
        <div class="card" >
                        <img src="images/database_Images/<?php echo $product['product_image1']; ?>" class="card-img-top" alt="..." width="100%" height="180px" style="object-fit: contain;">
                        <div class="card-body text-center">
                            <h5 class="card-title"><?php echo $product['name']; ?></h5>
                            <p class="card-text"><?php echo $product['description']; ?></p>
                            <div class="text-center">
                            <a href="handles/cart.php?id=<?php echo $product['id']; ?>" class="btn btn-info  ">Add to cart</a>
                            </div>
                            <a href="index.php" class="btn btn-secondary my-2 p-2">Back</a>
                        </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center text-info">Related Products</h2>
                </div>
                <div class="col-md-6   rounded-start">
                <img src="images/database_Images/<?php echo $product['product_image2']; ?>" class="card-img-top" alt="..." width="80%" height="30%" style="object-fit: contain;">

                </div>
                <div class="col-md-6 ">
                <img src="images/database_Images/<?php echo $product['product_image3']; ?>" class="card-img-top" alt="..." width="100%" height="30%" style="object-fit: contain;">
                </div>
            </div>
        </div>
    </div>
                
 <?php }

    
function get_ip()
{
    $ip='';
	// if user from the share internet 
	if(!empty($_SERVER['HTTP_CLIENT_IP'])) { 
		// echo 'IP address = '.$_SERVER['HTTP_CLIENT_IP']; 
        $ip=$_SERVER['HTTP_CLIENT_IP'];
	} 
	//if user is from the proxy 
	elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) { 
		// echo 'IP address = '.$_SERVER['HTTP_X_FORWARDED_FOR']; 
        $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
	} 
	//if user is from the remote address 
	else{ 
		// echo 'IP address = '.$_SERVER['REMOTE_ADDR']; 
        $ip=$_SERVER['REMOTE_ADDR'];
	}

    return $ip;


}

function dispaly_total($total)
{
    return $total;
}