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

      <h1 class= "row justify-content-center mt-5"> Packages</h1>

      <?php include('../app/views/layouts/errors.php');?>

          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>S/N</th>
                <th>Package Status</th>
                <th>Customer ID</th>
                <th>Date</th>
            </tr>
            <?php foreach($packages as $row) { ?>
            <tr>
                <td><?=htmlentities($packages->id);?></td>
                <td><?=htmlentities($packages->package_status);?></td>
                <td><?=htmlentities($packages->customer_id);?></td>
                <td><?=htmlentities($packages->updated_at);?></td>
            </tr>
            <?php } ?>
            </table>
          </div>


                    <!-- Footer -->
     


    </div>
  </div>
  
</div>

</div>

<?php include('../app/views/layouts/footer.php');?>
