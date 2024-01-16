<?php
if(isset($_SESSION['success'])){?>
<div class="alert alert-success my-3 text-center m-auto w-50"><?=  $_SESSION['success'] ?></div>
<?php } unset($_SESSION['success']); ?>