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
        <form action="/locations/add" method="post">


        <h1 class="text-center mt-5">Add A Location.</h1>

        <div class="control-group">
            <input class="form-control" id="country" type="text" name="country" placeholder= "Country" />
        </div>
        <div class="control-group">
            <input class="form-control" id="state" type="text" name="state" placeholder= "State" />
        </div>
        <div class="control-group">
            <input class="form-control" id="city" type="text" name="city" placeholder= "City" />
        </div>
        <div class="control-group">
            <input class="form-control" id="local_govt" type="text" name="local_govt" placeholder= "L.G.A" />
        </div>
        <div class="control-group">
            <input class="form-control" id="full_address" type="text" name="full_address" placeholder= "Full Address" />
        </div>
        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary " name="submit">Add</button></p>
        <span class="pull-right"><a href="/locations"><--Back to locations</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>