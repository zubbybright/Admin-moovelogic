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
                
                <input class="form-control" placeholder= "first name" id="title" type="text" name="first_name" value="<?=$user->first_name;?>" required />
        </div>
        <div class="control-group">
            
                <input class="form-control" id="title" placeholder= "last name" type="text" name="last_name" value="<?=$user->last_name;?>" required />
        </div>
        <div class="control-group">
                
                <input class="form-control" id="title" placeholder= "Username" type="text" name="last_name" value="<?=$user->username;?>" required />
        </div>
        <div class="control-group">
                
                <input class="form-control" id="title" placeholder= "Username" type="email" name="email" value="<?=$user->email;?>" required />
        </div>
        <div class="control-group">
        
                <input class="form-control" id="title" placeholder= "Password" type="password" name="password" > 
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary "  name="submit">Save</button></p>
        <span class="pull-right"><a href="/admin/profile"><--Back to dashboard</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>