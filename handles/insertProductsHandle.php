<?php
session_start();
require_once '../app/connection.php';

if(isset($_POST['insert_product']))
{

    
    $product_Name=$_POST['product_Name'];
$description=$_POST['description'];
$Product_keywords=$_POST['product_keywords'];
$prodect_catigories=$_POST['product_catigories'];
$prodect_brands=$_POST['product_brands'];
$price=$_POST['price'];
$status='true';

// //images
$image1=$_FILES['image1']['name'];
$image2=$_FILES['image2']['name'];
$image3=$_FILES['image3']['name'];

// //tmp_images
$tmp_name1=$_FILES['image1']['tmp_name'];
$tmp_name2=$_FILES['image2']['tmp_name'];
$tmp_name3=$_FILES['image3']['tmp_name'];

if(empty($product_Name)or empty($description)or empty($Product_keywords)or empty($prodect_catigories)
or empty($prodect_brands)or empty($price)
)
{
    $_SESSION['errors']=['can not be empty'];
    header("location:../admin_area/index.php");
    die();
}
elseif( !isset($image1)or !isset($image2) or !isset($image3)  )
{
    $_SESSION['errors']=['images can not be empty '];
    header("location:../admin_area/index.php");
    die();
}


$query="INSERT INTO products(`name`,`description`,`keywords`,`catigory_id`,`brand_id`,
`product_image1`,`product_image2`,`product_image3`,`price` ,`status`) VALUES('$product_Name',
'$description','$Product_keywords','$prodect_catigories','$prodect_brands','$image1','$image2','$image3',
'$price','$status'
 )";

$runQuery=mysqli_query($conn,$query);
if($runQuery)
{
    $_SESSION['success']='data inserted in products successfully';
    move_uploaded_file($tmp_name1,"../images/database_Images/$image1");
    move_uploaded_file($tmp_name2,"../images/database_Images/$image2");
    move_uploaded_file($tmp_name3,"../images/database_Images/$image3");
    header("location:../admin_area/index.php"); 
    

}
else
{
    $_SESSION['errors']=['Error while inserting in products database'];
    header("location:../admin_area/index.php"); 
}


}

else 
{
    $_SESSION['errors']=['Error '];
    header("location:../admin_area/index.php"); 
}


// var_dump( $product_Name."<br>"." name"."<br>");
// var_dump( $description."<br>"." description"."<br>");
// var_dump( $Product_keywords."<br>"." key"."<br>");
// var_dump( $prodect_catigories."<br>"." catigory"."<br>");
// var_dump( $prodect_brands."<br>"." brands"."<br>");
// var_dump( $price."<br>"." price"."<br>");
// var_dump( $image1."<br>"." image1"."<br>");
// var_dump( $image3."<br>"." image3"."<br>");
// var_dump( $image2."<br>"." image2"."<br>");
