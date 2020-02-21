<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');

?>

<?php include('../app/views/layouts/errors.php');?>


<div id="wrapper ">


  <div id="content-wrapper" class="d-flex flex-column card ml-5 pl-5" style= "width:100%">
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

  <!-- Topbar Navbar -->
  <ul class="navbar-nav ml-auto">

    <div class="topbar-divider d-none d-sm-block"></div>
    <li><a class="nav-link" href="/admin/logout">Logout</a></li>
  </ul>
  </nav>
  <!-- Main Content -->
    <div id="content">

   

     

      <?php include('../app/views/layouts/errors.php');?>

          <div class='row justify-content-center ml-5 mt-5'>
            
                <div >
                    <h5><b>First name :</b></h5><span class="mb-5"><?=htmlentities($rider->first_name);?></span>
                    <h5><b>Last Name :</b></h5><span  class="mb-5"><?=htmlentities($rider->last_name);?></span>
                    <h5><b>Email :</b></h5><span  class="mb-5"><?=htmlentities($rider->email);?></span>
                    <h5><b>Phone Number :</b></h5><span  class="mb-5"><?=htmlentities($rider->phone_number);?></span>
                    <h5><b>Type Of User :</b></h5><span  class="mb-5"><?=htmlentities($rider->user_type);?></span>
                    <h5><b>Location :</b></h5><span  class="mb-5"><?=htmlentities($rider->current_location);?></span>
                </div>
                <div>
                    
                </div>
          </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
