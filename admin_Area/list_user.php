<?php
require_once '../app/connection.php';
$select_users='select * from `users`';
$runQuery=mysqli_query($conn,$select_users);
if(mysqli_num_rows($runQuery))
{
    $users=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
$num=1;
}

?>

<h1 class="text-center text-success my-2">All users</h1>
<?php
if(!empty($users)){
?>
<div class="w-75 m-auto">
<table class="table table-busered mt-3 mx-1 text-center ">
        <thead class="bg-secondary">
        <tr>
            <th>sl no</th>
            <th>User Name</th>
            <th>User Email</th>
            <th>User Address</th>
            <th>User Mobile</th>
            <th>User Image</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($users as $user) :
                    $user_id=$user['user_id'];
                    if($user['type']==0){

                    
                   
            ?>
            <tr>
                <td><?= $num?></td>
                <td><?= $user['user_name'];?></td>
                <td><?= $user['user_email'];?></td> 
                <td><?= $user['user_address'];?></td>
                <td><?= $user['user_mobile'];?></td>
                <td><img src="../images/users_images/<?= $user['user_image'];?>" alt="" style="width: 100px; height:100px"></td>
                <td class="text-center"><a href="../handles/deleteProduct.php?product_id=<?= $user_id?>" class="text-light"> <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
            $num++;
        }
                endforeach;
            ?>
        </tbody>
    </table>
    <?php
}

else {
  echo "<div class='text-center text-danger'> No users</div>";  
}


?>
</div>