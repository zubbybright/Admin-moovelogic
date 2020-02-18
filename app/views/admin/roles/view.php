<?php
include('../app/views/layouts/header.php');

?>

<?php include('../app/views/layouts/errors.php');?>


<div id="wrapper">

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
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
    <a class="dropdown-item" href="/roles">Roles</a>
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

    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <div class="topbar-divider d-none d-sm-block"></div>
        <li><a class="nav-link" href="/admin/logout">Logout</a></li>
      </ul>
    </nav>

     

      <?php include('../app/views/layouts/errors.php');?>

          <div class='row ml-5 mt-5'>
            
                <div >
                    <h5><b>Title :</b></h5><span class="mb-5"><?=htmlentities($role->title);?></span>
                    <h5><b>Description :</b></h5><span  class="mb-5"><?=htmlentities($role->description);?></span>
                </div>
                <div>
                    
                </div>
          </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
