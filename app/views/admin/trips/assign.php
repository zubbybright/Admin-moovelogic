<?php
include('../app/views/layouts/header.php');
include('../app/views/layouts/sidebar.php');
?>

<div class="wrapper well">
    <div class= "row justify-content-center"> 
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/trips/assign_trip/<?=$rider->id;?>" method="post">


        <h1 class="text-center mt-5">Please Input The Trip ID</h1>
        <div class="control-group">
                
            <input class="form-control" placeholder= "Trip ID" id="tripId" type="text" name="tripId"  required />
        </div>
        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary "  name="submit">Save</button></p>
        <span class="pull-right"><a href="/trips"><--Back to trips</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>