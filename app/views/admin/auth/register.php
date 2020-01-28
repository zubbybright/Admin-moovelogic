<?php include('../app/views/layouts/header.php');?>

<div class= "row justify-content-left"> 
    <img class="cd-img" src = "/images/logo.png">
</div>
  <div class="wrapper well">

    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/users/add" method="post">


        <h1>Register Here.</h1>

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
            <input class="form-control" id="email" type="email" name="email" placeholder="Email" />
        </div>
        <div class="control-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
        </div>
        <div class="control-group">
            <input class="form-control" id="password_confirm" type="password" name="password_confirm" placeholder="Confirm Password" />
        </div>
        <div class="control-group">
            <input class="form-control" id="role" type="text" name="role" placeholder="Role" />
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary " name="submit">Register</button></p>
        <span class="pull-right">Already have an account?<a href="/"> Login.</a></span>
        
        <div class="clearfix"></div>
        </form>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>