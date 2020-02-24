<?php include('../app/views/layouts/header.php');?>
<?php include('../app/views/layouts/nav.php');?>
<?php include('../app/views/layouts/sidebar.php');?>



<div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
    <div class= "card mt-5">

        <div class="row  ">
            <div class="col-xl-12 col-md-12 col-sm-12 mx-auto">

                <!-- Profile widget -->
                <div class="bg-white shadow rounded overflow-hidden">
                    <div class="px-4 pt-5 pb-4 bg-light">
                        
                        <div class="row justify-content-center ">
                            <div class="profile "><img src="https://d19m59y37dris4.cloudfront.net/university/1-1-1/img/teacher-4.jpg" alt="..." width="200" class="rounded mb-2 img-thumbnail">
                                
                                <a href="/users/edit" class="btn btn-dark btn-sm btn-block mt-5">Edit profile</a> 

                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3" >
                        <form action="users/addPic" method="post" enctype="multipart/form-data" >
                            <input type="file" name="avatar" >
                            <input type="submit" name="submit" value="Upload " >
                        </form>
                    </div>
                            
            <div class="py-4 px-4 mt-5">
                        
                <div class="row justify-content-center bg-light">

                    <div >
                        <h5><b>First Name :</b></h5><span><?=htmlentities($profile->first_name);?></span>
                        <h5><b>Last Name :</b></h5><span><?=htmlentities($profile->last_name);?></span>
                        <h5><b>Username :</b></h5><span><?=htmlentities($profile->username);?></span>
                        <h5><b>Email :</b></h5><span><?=htmlentities($profile->email);?></span>
                    </div>
                    
                </div><!-- End profile widget -->
            </div>
            </div>
        </div>

    </div>
</div>



</div>
</div>



<?php include('../app/views/layouts/footer.php');?>