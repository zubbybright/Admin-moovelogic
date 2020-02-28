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
      <h1 class= "row justify-content-center mt-5"> Locations</h1>

      <?php include('../app/views/layouts/errors.php');?>


      <p><a href="/locations/add" class="btn btn-xs btn-info">Create A Location</a></p>

          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>S/N</th>
                <th>Country</th>
                <th>State</th>
                <th>City</th>
                <th>L.G.A</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
            <?php foreach($locations as $row) {
               ?>
            <tr>
                <td><?=htmlentities($row->id);?></td>
                <td><?=htmlentities($row->country);?></td>
                <td><?=htmlentities($row->state);?></td>
                <td><?=htmlentities($row->city);?></td>
                <td><?=htmlentities($row->local_govt);?></td>
                <td><?=htmlentities($row->full_address);?></td>
                <td>
                    <a href="/locations/edit/<?=$row->id;?>" class="btn btn-xs btn-warning">Edit</a>
                    <a href="/locations/delete/<?=$row->id;?>" class="btn btn-xs btn-danger">Delete</a>
                    <a href="/locations/view/<?=$row->id;?>" class="btn btn-xs btn-success">View</a>
                </td>
            </tr>
            <?php } ?>
            </table>

          </div>





    </div>
  </div>
</div>
</div>
<?php include('../app/views/layouts/footer.php');?>