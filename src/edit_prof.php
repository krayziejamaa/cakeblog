<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>




<?php
$user = new User();
if (isset($_POST['create'])) {

    // echo "Connected!";
    if ($user) {
        $user->firstname = $_POST['firstname'];
        $user->lastname = $_POST['lastname'];
        $user->username = $_POST['username'];
        $user->password = $_POST['password'];

        $user->save();
    }
}



?>

<section class="container-fluid">


</section>

<?php include("includes/panel-top.php"); ?>
<div class="container">

    <div class="form-gap"></div>

    <div class="row justify-content-center">
        <div class="col-md-4 col-md-offset-3">
            <div class="register">

                <div class="panel-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <div class="col-md-6 col-md-offset-3">

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input type="text" name="firstname" class="form-control">
                            </div>

                            <div class=" form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="lastname" class="form-control">
                            </div>

                            <div class=" form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" autocomplete="off">
                            </div>

                            <div class=" form-group">
                                <input type="submit" name="create" class="btn btn-primary pull-right">
                            </div>

                        </div>


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

<?php include("includes/panel-bottom.php"); ?>

<?php include("includes/footer.php"); ?>