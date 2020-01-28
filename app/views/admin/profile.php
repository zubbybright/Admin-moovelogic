<?php include('../app/views/layouts/header.php');?>
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
                <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-white">
                <img class='logo' src="/images/logo.png" alt='logo'>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>

              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                  <li class="nav-item ">
                        <a class="nav-link" href="/admin">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="/admin/profile">Profile </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
 aria-haspopup="true" aria-expanded="false">
                        Users Management
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Customers</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Roles</a>
                        </div>
                       
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="/users/add">Create Admin </a>
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
                    <li><a class="nav-link" href="/admin/logout">Logout</a></li>
                </ul>
              </div>
            </nav>
        </header>
      </div>

<div class="row ">
    <div class="col-xl-12 col-md-12 col-sm-12 mx-auto">

        <!-- Profile widget -->
        <div class="bg-white shadow rounded overflow-hidden">
            <div class="px-4 pt-0 pb-4 bg-dark">
                <div class="media align-items-end profile-header">
                    <div class="profile mr-3"><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/teacher-4.jpg" alt="..." width="130" class="rounded mb-2 img-thumbnail"><a href="#" class="btn btn-dark btn-sm btn-block">Edit profile</a></div>
                    <div class="media-body mb-5 text-white">
                        <h4 class="mt-0 mb-0">
                            <?$user= new User(); 
                        echo $user['username'];
                        ?></h4>
                        <h5 class="mt-0 mb-0">
                            <?$user= new User(); 
                            echo $user['role'];
                            ?></h5>
                    </div>
                </div>
            </div>

            <div class="bg-light p-4 d-flex justify-content-end text-center">
                
            </div>

            <div class="py-4 px-4">
                <!-- <div class="d-flex align-items-center justify-content-between mb-3">
                    <h5 class="mb-0">Recent photos</h5><a href="#" class="btn btn-link text-muted">Show all</a>
                </div> -->
                <div class="row">
                    <!-- <div class="col-lg-6 mb-2 pr-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/nicole-honeywill-546848-unsplash_ymprvp.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 mb-2 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294927/dose-juice-1184444-unsplash_bmbutn.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pr-lg-1 mb-2"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294926/cody-davis-253925-unsplash_hsetv7.jpg" alt="" class="img-fluid rounded shadow-sm"></div>
                    <div class="col-lg-6 pl-lg-1"><img src="https://res.cloudinary.com/mhmd/image/upload/v1556294928/tim-foster-734470-unsplash_xqde00.jpg" alt="" class="img-fluid rounded shadow-sm"></div> -->
                </div>
                <footer class="sticky-footer bg-white">
                  <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                      <span>Copyright &copy; Moovelogic 2020</span>
                    </div>
                  </div>
                </footer>
            </div>
        </div><!-- End profile widget -->

    </div>
</div>



</div>

<?php include('../app/views/layouts/footer.php');?>