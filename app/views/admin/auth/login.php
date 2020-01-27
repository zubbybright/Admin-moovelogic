<?php include('../app/views/layouts/header.php');?>

<div class= "row justify-content-left"> 
    <img class="cd-img" src = "/images/logo.png">
</div>
  <div class="wrapper well">

    <?php include('../app/views/layouts/errors.php');?>
    <div class = "card bg-light " style="width:400px">
        <form action="/admin/login" method="post">


        <h1>Welcome Back Admin!</h1>

        <div class="control-group">
            <input class="form-control" id="username" type="text" name="username" placeholder="Username" />
        </div>

        <div class="control-group">
            <input class="form-control" id="password" type="password" name="password" placeholder="Password" />
        </div>

        <br>

        <p class="pull-left"><button type="submit" class="btn btn-block btn-primary " name="submit">Login</button></p>
        <p class="pull-right"><a href="/admin/reset">Forgot Password</a></p>
        
        <div class="clearfix"></div>
        </form>
    </div>

</div>
<?php include('../app/views/layouts/footer.php');?>