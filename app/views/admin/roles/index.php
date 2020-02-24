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

      <h1 class= "row justify-content-center mt-5"> Roles</h1>

      <?php include('../app/views/layouts/errors.php');?>


      <p><a href="/roles/add" class="btn btn-xs btn-info">Add Role</a></p>

          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>title</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
            <?php foreach($roles as $row) { ?>
            <tr>
                <td><?=htmlentities($row->title);?></td>
                <td><?=htmlentities($row->description);?></td>
                <td>
                    <a href="/roles/edit/<?=$row->id;?>" class="btn btn-xs btn-warning">Edit</a>
                    <a href="/roles/delete/<?=$row->id;?>" class="btn btn-xs btn-danger">Delete</a>
                    <a href="/roles/view/<?=$row->id;?>" class="btn btn-xs btn-success">View</a>
                </td>
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
