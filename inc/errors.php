<?php
if(isset($_SESSION['errors']))
{
    foreach ($_SESSION['errors'] as $error) 
    {?>
            <div class="alert alert-danger my-3 text-center m-auto w-50"> <?= $error;?> </div>
<?php   }
}unset($_SESSION['errors']);
?>