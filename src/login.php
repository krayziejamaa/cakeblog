<?php require_once("includes/header.php"); ?>
<?php require("includes/navigation.php"); ?>
<?php

if ($session->is_signed_in()) {
    redirect("index.php");
}

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
}

//verify user from User class


?>


<section class="container-fluid">


</section>
<?php include "includes/panel-top.php"; ?>
<div class="container">

    <div class="form-gap"></div>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-3">
            <div class="login">
                <div class="panel-body">
                    <h3 id="login"><i class="fa fa-user fa-1x"></i><span>Login</span></h3>
                    <form class="form-container">

                        <form id="login-form" role="form" autocomplete="off" class="form" method="post">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
                                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                                </div>
                            </div>

                            <div class="form-group">

                                <input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
                            </div>


                        </form>
                    </form>

                </div><!-- Body-->

            </div>
            <!-- </div> -->
        </div>
        <!-- </div>
        </div> -->
    </div>
</div>

<?php include "includes/panel-bottom.php"; ?>




<?php include "includes/footer.php"; ?>