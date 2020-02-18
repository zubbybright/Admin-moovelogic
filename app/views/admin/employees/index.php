<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>

<?php include('../app/views/layouts/errors.php');?>


<div id="wrapper">

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

      <h1 class= "row justify-content-center mt-5"> Employees</h1>

      <?php include('../app/views/layouts/errors.php');?>


      <p><a href="/employees/add" class="btn btn-xs btn-info">Create An Employee</a></p>

          <div class='table-responsive'>
            <table class='table table-striped table-hover table-bordered'>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Username</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
            <?php foreach($employees as $row) {
               ?>
            <tr>
                <td><?=htmlentities($row->first_name);?></td>
                <td><?=htmlentities($row->last_name);?></td>
                <td><?=htmlentities($row->username);?></td>
                <td><?=htmlentities($row->email);?></td>
                <td><?=htmlentities($row->phone_number);?></td>
                <td>
                    <a href="/employees/edit/<?=$row->id;?>" class="btn btn-xs btn-warning">Edit</a>
                    <a href="/employees/delete/<?=$row->id;?>" class="btn btn-xs btn-danger">Delete</a>
                    <a href="/employees/view/<?=$row->id;?>" class="btn btn-xs btn-success">View</a>
                </td>
            </tr>
            <?php } ?>
            </table>



            <footer class="sticky-footer bg-white mt-5 ">
            <div class="container my-auto">
              <div class="copyright text-center my-auto">
                <span>Copyright &copy; Moovelogic 2020</span>
              </div>
            </div>
          </footer>

          </div>





    </div>
  </div>
</div>
<?php include('../app/views/layouts/footer.php');?>