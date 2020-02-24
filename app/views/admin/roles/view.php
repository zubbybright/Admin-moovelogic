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
                    <h5><b>Title :</b></h5><span class="mb-5"><?=htmlentities($role->title);?></span>
                    <h5><b>Description :</b></h5><span  class="mb-5"><?=htmlentities($role->description);?></span>
                </div>
                <div>
                    
                </div>
          </div>
        </div>





    </div>
  </div>
</div>

<?php include('../app/views/layouts/footer.php');?>
