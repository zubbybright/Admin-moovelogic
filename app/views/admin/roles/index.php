<?php
include('../app/views/layouts/header.php');

?>

<?php include('../app/views/layouts/errors.php');?>


<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text"><img class='logo' src="/images/logo.png" alt='logo'></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider mt-5">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="/admin">
      <span>Dashboard</span></a>
  </li>
  <li class = "nav-item">
    <a class="nav-link" href="/admin/profile">Profile </a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Modules
  </div>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
aria-haspopup="true" aria-expanded="false">
    Users Management
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    <a class="dropdown-item" href="/users/viewRoles">Roles</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Employees</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Customers</a>
    <div class="dropdown-divider"></div>
    <a class="dropdown-item" href="#">Agents</a>
    </div>
                   
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#"  >Trips</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#"  >Locations</a>
  </li>                    
  <li class="nav-item">
      <a class="nav-link" href="#" >Billing/Invoicing</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Settings</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Complaint Management</a>
  </li>
  <li class="nav-item">
      <a class="nav-link" href="#">Vehicle Management</a>
  </li>

</ul>

  <div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
    <div id="content">

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
                </td>
            </tr>
            <?php } ?>
            </table>
          </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
