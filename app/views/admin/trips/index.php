<?php
include('../app/views/layouts/header.php'); 
include('../app/views/layouts/sidebar.php');
?>

<?php include('../app/views/layouts/errors.php');?>


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

      <h1 class= "row justify-content-center mt-5">Trips</h1>

      <?php include('../app/views/layouts/errors.php');?>


          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>S/N</th>
                <th>Current Location</th>
                <th>Start Location</th>
                <th>End Location</th>
                <th>Cost Of Trip</th>
                <th>Trip Status</th>
                <th>Recipient Name</th>
                <th>Recipient Phone Number</th>
                <th>Who Pays</th>
                <th>Payment Method</th>
                <th>Rider Id</th>
                <th>Customer Id</th>
                <th>Package Id</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php foreach($trips as $row) { ?>
            <tr>
                <td><?=htmlentities($row->id);?></td>
                <td><?=htmlentities($row->current_location);?></td>
                <td><?=htmlentities($row->start_location);?></td>
                <td><?=htmlentities($row->end_location);?></td>
                <td><?=htmlentities($row->cost_of_trip);?></td>
                <td><?=htmlentities($row->trip_status);?></td>
                <td><?=htmlentities($row->recipient_name);?></td>
                <td><?=htmlentities($row->recipient_phone_number);?></td>
                <td><?=htmlentities($row->who_pays);?></td>
                <td><?=htmlentities($row->payment_method);?></td>
                <td><?=htmlentities($row->rider_id);?></td>
                <td><?=htmlentities($row->customer_id);?></td>
                <td><?=htmlentities($row->package_id);?></td>
                <td><?=htmlentities($row->updated_at);?></td>
              
                <td>
                    <!-- <a href="/trips/edit/<?=$row->id;?>" class="btn btn-xs mb-2 btn-warning">Edit</a> -->
                    <!-- <a href="/trips/delete/<?=$row->id;?>" class="btn btn-xs mb-2 btn-danger">Delete</a> -->
                    <a href="/trips/view/<?=$row->id;?>" class="btn btn-xs mb-2 btn-success">View</a>
                    <a href="/riders/all_riders" class="btn btn-xs mb-2 btn-warning">Assign Rider</a>

                    
                </td>
            </tr>
            <?php }?>
            </table>
          </div>






    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
