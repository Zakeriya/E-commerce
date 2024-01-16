<?php

$conn=mysqli_connect("localhost","root","","mystore");
if(!$conn)
{
    die("faild connection");
}
// global $conn;