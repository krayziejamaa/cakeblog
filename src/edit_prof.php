<?php require_once("includes/header.php"); ?>


<?php

// $user = User::find_by_id($id);



if (!$session->is_signed_in()) {;
    redirect("login.php");
} ?>

<?php

$currentuser = User::find_by_id($_GET['id']);
// if ($user) {
//     $currentuser = User::find_by_id($user);
//     if ($currentuser) {
if (isset($_POST['update'])) {
    if ($currentuser) {
        $currentuser->username = $_POST['username'];
        $currentuser->firstname = $_POST['firstname'];
        $currentuser->lastname = $_POST['lastname'];



        $currentuser->save();

        //     redirect("")
        // }
    }


    // echo $user->username;
}


// redirect("profile.php");


?>









<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <!-- <ul class="nav justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user fa-0.5x"></i>
                    <?php
                    // $loggeduser = $session->user_id;
                    // if ($loggeduser) {
                    //     $currentuser = User::find_by_id($loggeduser);
                    //     if ($currentuser) {
                    //         echo $currentuser->username;
                    //     }
                    // }

                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="" ../logout.php"">Logout</a>
                    <a class="dropdown-item" href="../edit_prof.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../registration.php">Register</a>
            </li>
        </ul> -->
    </div>
</nav>

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
                                <input type="text" name="username" class="form-control" value="<?php echo $user->username; ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="first name">First Name</label>
                                <input type="text" name="firstname" class="form-control" value="<?php echo $user->firstname; ?>">
                            </div>

                            <div class=" form-group">
                                <label for="last_name">Last Name</label>
                                <input type="text" name="lastname" class="form-control" value="<?php echo $user->lastname; ?>">
                            </div>

                            <div class=" form-group">
                                <input type="submit" name="update" class="btn btn-primary pull-right" Value="Update">
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