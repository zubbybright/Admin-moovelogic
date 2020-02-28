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
        <div class= 'card bg-light mt-5 pt-5'>
          <div class='row justify-content-center ml-5 mt-5'>
            
                <div >
                    <h5><b>Current Location :</b></h5><span class="mb-5"><?=htmlentities($trip->current_location);?></span>
                    <h5><b>Start Location :</b></h5><span  class="mb-5"><?=htmlentities($trip->start_location);?></span>
                    <h5><b>End Location :</b></h5><span  class="mb-5"><?=htmlentities($trip->end_location);?></span>
                    <h5><b>Cost Of Trip :</b></h5><span  class="mb-5"><?=htmlentities($trip->cost_of_trip);?></span>
                    <h5><b>Trip Status :</b></h5><span  class="mb-5"><?=htmlentities($trip->trip_status);?></span>
                    <h5><b>Recipient Name :</b></h5><span  class="mb-5"><?=htmlentities($trip->recipient_name);?></span>
                    <h5><b>Recipient Phone Number :</b></h5><span  class="mb-5"><?=htmlentities($trip->recipient_phone_number);?></span>
                    <h5><b>Who Pays:</b></h5><span  class="mb-5"><?=htmlentities($trip->who_pays);?></span>
                    <h5><b>Payment Method :</b></h5><span  class="mb-5"><?=htmlentities($trip->payment_method);?></span>
                    <h5><b>Rider Id :</b></h5><span  class="mb-5"><?=htmlentities($trip->rider_id);?></span>
                    <h5><b>Customer Id :</b></h5><span  class="mb-5"><?=htmlentities($trip->customer_id);?></span>
                    <h5><b>Package Id:</b></h5><span  class="mb-5"><?=htmlentities($trip->package_id);?></span>
                    <h5><b>Date :</b></h5><span  class="mb-5"><?=htmlentities($trip->updated_at);?></span>

                   
                </div>
                <div>
                    
                </div>
          </div>
        </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
