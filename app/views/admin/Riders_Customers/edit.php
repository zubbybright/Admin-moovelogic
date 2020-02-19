<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>

<div class="wrapper well">
    <div class= "row justify-content-center"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/riders/edit/<?=$rider->id;?>" method="post">


        <h1 class="text-center mt-5">Edit Details</h1>
        <div class="control-group">
                
                <input class="form-control" placeholder= "first name" id="title" type="text" name="first_name" value="<?=$rider->first_name;?>" required />
        </div>
        <div class="control-group">
            
                <input class="form-control" id="title" placeholder= "last name" type="text" name="last_name" value="<?=$rider->last_name;?>" required />
        </div>
        
        <div class="control-group">
                
                <input class="form-control" id="title" placeholder= "Email" type="email" name="email" value="<?=$rider->email;?>" required />
        </div>
        <div class="control-group">
                
                    <input class="form-control" id="title" placeholder= "Phone" type="text" name="phone_number" value="<?=$rider->phone_number;?>" required />
            </div>
        <div class="control-group">
        
                <input class="form-control" id="title" placeholder= "Password" type="password" name="password" > 
        </div>
        <div class="control-group">
        
                <input class="form-control" id="title" placeholder= "Confirm Password" type="password" name="password_confirm" > 
        </div>
        <div class="control-group">
        
                <input class="form-control" id="title" placeholder= "Location" type="text" name="location" > 
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