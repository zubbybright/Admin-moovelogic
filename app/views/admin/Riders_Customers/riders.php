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

      <h1 class= "row justify-content-center mt-5">Riders</h1>

      <?php include('../app/views/layouts/errors.php');?>


      <!-- <p><a href="/riders/add" class="btn btn-xs btn-info">Create A Rider</a></p>
      <p><a href="/customers/add" class="btn btn-xs btn-info">Create A Customer</a></p> -->

          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>Type Of User</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>On a ride </th>
                <th>Location</th>
                <th>Action</th>
            </tr>
            <?php foreach($riders as $row) { ?>
            <tr>
               
                <td><?=htmlentities($row->user_type);?></td>
                <td><?=htmlentities($row->first_name);?></td>
                <td><?=htmlentities($row->last_name);?></td>
                <td><?=htmlentities($row->email);?></td>
                <td><?=htmlentities($row->phone_number);?></td>
                <td><?=htmlentities($row->on_a_ride);?></td>
                <td><?=htmlentities($row->current_location);?></td>
              
                <td>
                    <a href="/trips/assign_trip/<?=$row->id;?>" class="btn btn-xs btn-success mt-3">Assign a Trip</a>
                </td>
            </tr>
            <?php } ?>
            </table>
          </div>

                <!-- Footer -->
      




    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
