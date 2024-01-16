<?php
require_once '../app/connection.php';
$selectcatigories="select * from `catigories`";
$runQuery=mysqli_query($conn,$selectcatigories);
$catigories=[];
if(mysqli_num_rows($runQuery)>0)
{
    $catigories=mysqli_fetch_all($runQuery,MYSQLI_ASSOC);
    $catigory_id=0;
}
$number=1;
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
    <h1 class="text-center text-success my-1">All catigories</h1>
  <div class="w-75 m-auto mb-5">
  <table class="table table-bordered mt-3 mx-1 text-center ">
        <thead class="bg-secondary">
        <tr>
            <th>sl number</th>
            <th>catigory Title</th>
            <th>Edit</th>
            <th>Delete</th>
            
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($catigories as $catigory) :
                    $catigory_id=$catigory['id'];
            ?>
            <tr>
                <td><?=$number?></td>
                <td><?= $catigory['catigoryName'];?></td>
                <td><a href="index.php?edit_catigory&catigory_id=<?= $catigory['id'];?>" class="text-light"> <i class="fa-solid fa-pen-to-square"></i> </a></td>
                <td class="text-center"><a href="deleteCatigory.php?catigory_id=<?= $catigory['id'];?>"
                type="button" class=" text-light" data-bs-toggle="modal" data-bs-target="#exampleModal"
                > <i class="fa-solid fa-trash"></i> </a></td>
            </tr>
            <?php
            $number++;
                endforeach;
            ?>
        </tbody>
    </table>

    <!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
      <div class="modal-body">
        Are you sure ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-bs-dismiss="modal"><a href="" class="text-decoration-none text-light">No</a></button>
        
        
        <button type="button" class="btn btn-danger"><a href="deleteCatigory.php?catigory_id=<?= $catigory['id'];?>"
                 class=" text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>

<?php
