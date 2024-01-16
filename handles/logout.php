<?php
session_start();
// require_once '../app/connection.php';
if(isset($_SESSION['user_email'])){
unset ($_SESSION['user_email']);
unset ($_SESSION['user_name']);
session_destroy();
header("location:../user_area/checkout.php");
}
else {
    header("location:../index.php");
}