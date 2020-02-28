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

<?php include('../app/views/layouts/errors.php');?>


<div id="wrapper ">
  <!-- Main Content -->
    <div id="content">
      <?php include('../app/views/layouts/errors.php');?>

          <div class='row justify-content-center ml-5 mt-5'>
            
                <div >
                    <h5><b>Country :</b></h5><span class="mb-5"><?=htmlentities($location->country);?></span>
                    <h5><b>State :</b></h5><span  class="mb-5"><?=htmlentities($location->state);?></span>
                    <h5><b>City :</b></h5><span  class="mb-5"><?=htmlentities($location->city);?></span>
                    <h5><b>L.G.A :</b></h5><span  class="mb-5"><?=htmlentities($location->local_govt);?></span>
                    <h5><b>Address :</b></h5><span  class="mb-5"><?=htmlentities($location->full_address);?></span>

                    <a href="/locations/edit/<?=$location->id;?>" class="btn btn-large btn-primary ml-5">Edit</a>
                </div>
                <div>
                
                </div>
          </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
