<?php
    if(isset($_GET['insertBrands'])){?>
    <div class="container my-3">
        
        <div class="text-center">
            <h2 class="text-center">Insert brands</h2>
            <form action="../handles/insertBrandsHandle.php" method="post">
            <div class="input-group mb-3">
                <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-comment"></i></span>
                <input type="text" class="form-control" placeholder="Insert brand" name="brand_Name" >
            </div>
            <button type="submit" class="btn btn-light bg-info p-3" name="brandsInsert">Inseart brand</button>
            </form>
        </div>
    </div>
    <?php } ?>