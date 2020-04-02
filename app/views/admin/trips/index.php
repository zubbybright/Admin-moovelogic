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
      
      <p><button class="btn btn-xs btn-info" onClick="window.location.reload();">Refresh Page</button></p>


          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
 <tr>
                <th>S/N</th>
                <th>Start Location</th>
                <th>End Location</th>
                <th>Cost Of Trip</th>
                <th>Trip Status</th>
                <th>Customer Id</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            <?php foreach($trips as $row) { ?>
            <tr>
                <td><?=htmlentities($row->id);?></td>
                <td><?=htmlentities($row->start_location);?></td>
                <td><?=htmlentities($row->end_location);?></td>
                <td><?=htmlentities($row->cost_of_trip);?></td>
                <td><?=htmlentities($row->trip_status);?></td>
                <td><?=htmlentities($row->customer_id);?></td>
                <td><?=htmlentities($row->updated_at);?></td>
                <td>
                    <!-- <a href="/trips/edit/<?=$row->id;?>" class="btn btn-xs mb-2 btn-warning">Edit</a> -->
                    <!-- <a href="/trips/delete/<?=$row->id;?>" class="btn btn-xs mb-2 btn-danger">Delete</a> -->
                    <a href="/trips/view/<?=$row->id;?>" class="btn btn-xs mb-2 btn-success">View</a>
                     <a href="/riders/all_riders" class="btn btn-xs mb-2 btn-warning">Assign Rider</a>
                     <div class="dropdown">
                      <button class="btn btn-xs mb-2 btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        More Options
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" data-toggle="modal" data-target="#startTrip<?=$row->id;?>" >Start Trip</a>
                        <a class="dropdown-item"data-toggle="modal" data-target="#endTrip<?=$row->id;?>" >End Trip</a>
                        <a class="dropdown-item" data-toggle="modal" data-target="#cancelTrip<?=$row->id;?>">Cancel Trip</a>
                      </div>
                    </div>
                    
                    
                    <!--******* Modals******-->
                    <!--start trip-->
                    <div id="startTrip<?=$row->id;?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">You are trying to start this trip!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to start this trip?</p>
                              </div>
                              <div class="modal-footer">
                                 <a class="btn btn-success" href= "/trips/start_trip/<?=$row->id;?>">Yes</a>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                    
                    <!--cancel trip-->
                    <div id="cancelTrip<?=$row->id;?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">You are trying to cancel this trip!</h4>
                              </div>
                              <div class="modal-body">
                                <p>Are you sure you want to cancel this trip?</p>
                              </div>
                              <div class="modal-footer">
                                 <a class="btn btn-success" href= "/trips/cancel_trip/<?=$row->id;?>">Yes</a>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
                              </div>
                            </div>
                        
                          </div>
                        </div>
                    <!--end trip-->
                    
                    <div id="endTrip<?=$row->id;?>" class="modal fade" role="dialog">
                         <div class="modal-dialog">
                        
                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">You are trying to end this trip!</h4>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                              </div>
                              <div class="modal-body">
                                <p>Was the Package Delivered?</p>
                              </div>
                              <div class="modal-footer">
                                 <a class="btn btn-success" href= "/trips/end_trip/<?=$row->id;?>">Yes</a>
                              </div>
                              <div class="modal-footer">
                                <a class="btn btn-secondary" href= "/trips/end_trip_2/<?=$row->id;?>">No</a>
                              </div>
                            </div>
                        
                          </div>
                    </div>
                  
                   
                </td>
              </tr>
            <?php }?>
            </table>
          </div>






    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
