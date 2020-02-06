<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>

<div class="wrapper well">
    <div class= "row justify-content-center"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/roles/edit/id" method="post">


        <h1 class="text-center mt-5">Edit Role.</h1>
        <div class="control-group">
                <label class="control-label" for="name"> Title</label>
                <input class="form-control" id="title" type="text" name="title" value="<?=$role->title;?>" required />
        </div>
        <div class="control-group">
                <label class="control-label" for="description"> Description</label>
                <input class="form-control" id="description" type="text" name="description" value="<?=$role->description;?>" />
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary "  name="submit">Save</button></p>
        <span class="pull-right"><a href="/admin"><--Back to dashboard</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>