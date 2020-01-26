<?php include('../app/views/layouts/header.php');?>

<div class= "row justify-content-left"> 
    <img class="cd-img" src = "/images/logo.png">
</div>

<div class="wrapper well">

    <?php include('../app/views/layouts/errors.php');?>
	<div class = "card bg-light " style="width:400px">
	    <h1>Reset Password</h1>

	    <form method="post">

	    <div class="control-group">
	        <label class="control-label" for="email"> Email</label>
	        <input class="form-control" id="email" type="text" name="email" />
	    </div>

	    <br>

	    <p class="pull-left"><button type="submit" class="btn btn-block btn-sm btn-primary" name="submit">Send reset email</button></p>
	    <p class="pull-right"><a href="/admin/login">Login</a></p>

	    <div class="clearfix"></div>

	    </form>

	</div>
</div>

<?php include('../app/views/layouts/footer.php');?>