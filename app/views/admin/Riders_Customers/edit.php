<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>
<div id="content-wrapper" class="d-flex flex-column ml-5 ">

<!-- Main Content -->
  <div id="content">

  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <div class="topbar-divider d-none d-sm-block"></div>
      <li><a class="nav-link" href="/admin/logout">Logout</a></li>
    </ul>
  </nav>
<div class="wrapper well">
    <div class= "row justify-content-center"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/riders/edit/<?=$rider->id;?>" method="post">


        <h1 class="text-center mt-5">Edit Details</h1>
        <div class="control-group">
                
                <input class="form-control" placeholder= "first name" id="first_name" type="text" name="first_name" value="<?=$rider->first_name;?>" required />
        </div>
        <div class="control-group">
            
                <input class="form-control" id="last_name" placeholder= "last name" type="text" name="last_name" value="<?=$rider->last_name;?>" required />
        </div>
        
        <div class="control-group">
                
                <input class="form-control" id="email" placeholder= "Email" type="email" name="email" value="<?=$rider->email;?>" required />
        </div>
        <div class="control-group">
                
                    <input class="form-control" id="phone" placeholder= "Phone" type="text" name="phone_number" value="<?=$rider->phone_number;?>" required />
            </div>
        <div class="control-group">
        
                <input class="form-control" id="password" placeholder= "Password" type="password" name="password" > 
        </div>
        <div class="control-group">
        
                <input class="form-control" id="confirm_password" placeholder= "Confirm Password" type="password" name="password_confirm" > 
        </div>
        <div class="control-group">
        
                <input class="form-control" id="Location" placeholder= "Location" type="text" name="location" > 
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