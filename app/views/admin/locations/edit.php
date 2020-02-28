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
    <div class= "row justify-content-center  mt-5 pt-5"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/locations/edit/<?=$location->id;?>" method="post">


        <h1 class="text-center mt-5">Edit Location.</h1>
        <div class="control-group">
                <label class="control-label" for="country"> Country</label>
                <input class="form-control" id="country" type="text" name="country" value="<?=$location->country;?>" required />
        </div>
        <div class="control-group">
                <label class="control-label" for="state"> State</label>
                <input class="form-control" id="state" type="text" name="state" value="<?=$location->state;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="city"> City</label>
                <input class="form-control" id="city" type="text" name="city" value="<?=$location->city;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="local_govt"> L.G.A</label>
                <input class="form-control" id="local_govt" type="text" name="local_govt" value="<?=$location->local_govt;?>" />
        </div>
        <div class="control-group">
                <label class="control-label" for="full_address"> Address</label>
                <input class="form-control" id="full_address" type="text" name="full_address" value="<?=$location->full_address;?>" />
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary "  name="submit">Save</button></p>
        <span class="pull-right"><a href="/locations"><--Back to locations</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

</div>
</div>
<?php include('../app/views/layouts/footer.php');?>