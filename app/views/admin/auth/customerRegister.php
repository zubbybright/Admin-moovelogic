<?php include('../app/views/layouts/header.php');?>



  <div class="wrapper well">
    <div class= "row justify-content-center"> 
       
    
    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/customers/add" method="post">


        <h1 class="text-center mt-5">Register A Customer Here.</h1>

        <div class="control-group">
            <input class="form-control" id="first_name" type="text" name="first_name" placeholder="First Name" />
        </div>
        <div class="control-group">
            <input class="form-control" id="last_name" type="text" name="last_name" placeholder="Last Name" />
        </div>
        <div class="control-group">
            <input class="form-control" id="username" type="text" name="username" placeholder="Username" />
        </div>
        <div class="control-group">
            <input class="form-control" id="email" type="text" name="phone_number" placeholder="Phone Number" />
        </div>
        <div class="control-group">
            <input class="form-control" id="email" type="email" name="email" placeholder="Email" />
        </div>
        <div class="control-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
        </div>
        <div class="control-group">
            <input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Confirm Password" />
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary " name="submit">Register</button></p>
        <span class="pull-right"><a href="/riders"><--Riders & Customers</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>
    </div>

          <!-- Footer -->
       

</div>
<?php include('../app/views/layouts/footer.php');?>