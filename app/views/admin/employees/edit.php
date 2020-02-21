<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>

<div class="wrapper well">
    <div class= "row justify-content-center"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/employees/edit/<?=$employee->id;?>" method="post">


        <h1 class="text-center mt-5">Edit Employee Details.</h1>
        <div class="control-group">
                <label class="control-label" for="first_name"> FirstName</label>
                <input class="form-control" id="title" type="text" name="first_name" value="<?=$employee->first_name;?>" required />
        </div>
        <div class="control-group">
                <label class="control-label" for="last_name"> LastName</label>
                <input class="form-control" id="description" type="text" name="last_name" value="<?=$employee->last_name;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="username"> Username</label>
                <input class="form-control" id="description" type="text" name="username" value="<?=$employee->username;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="email"> Email</label>
                <input class="form-control" id="description" type="email" name="email" value="<?=$employee->email;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="description">Phone</label>
                <input class="form-control" id="description" type="text" name="phone_number" value="<?=$employee->phone_number;?>" />
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