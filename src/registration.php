<?php include "includes/header.php"; ?>
<?php include "includes/navigation.php"; ?>

<section class="container-fluid">


</section>

<?php include "includes/panel-top.php"; ?>
<div class="container">

    <div class="form-gap"></div>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-3">
            <div class="register">


                <div class="panel-body">
                    <form class="form-container-register">

                        <form id="login-form" role="form" autocomplete="off" class="form" method="post">

                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                                    <input name="firstname" type="text" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user color-blue"></i></span>

                                    <input name="lastname" type="text" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
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
                                <input name="register" class="btn btn-lg btn-primary btn-block" value="Register" type="submit">
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
</section>

<?php include "includes/panel-bottom.php"; ?>

<?php include "includes/footer.php"; ?>