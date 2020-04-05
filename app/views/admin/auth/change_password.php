<?php include('../app/views/layouts/header.php');?>

<div class="wrapper well pt-5 mt-5">

    <?php include('../app/views/layouts/errors.php');?>

    <h1>Change Password</h1>

    <form method="post">
    <input type='hidden' name="token" value='<?=$token;?>'>

    <div class="control-group">
        <label class="control-label" for="password"> Password</label>
        <input class="form-control" id="password" type="password" name="password" required />
    </div>

    <div class="control-group">
        <label class="control-label" for="password_confirm">Confirm Password</label>
        <input class="form-control" id="password_confirm" type="password" name="password_confirm" required />
    </div>

    <br>

    <p class="pull-left"><button type="submit" class="btn btn-sm btn-success" name="submit">Change Password</button></p>
    <p class="pull-right"><a href="/admin/login">Login</a></p>

    <div class="clearfix"></div>

    </form>

    </div>

<?php include('../app/views/layouts/footer.php');?>

