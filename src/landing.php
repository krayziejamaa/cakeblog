<?php require_once("includes/header.php"); ?>


<?php

if (!$session->is_signed_in()) {;
    redirect("login.php");
}
?>
<?php $users = User::find_all(); ?>

<nav class="navbar navbar-expand-sm navbar-dark bg-primary">
    <!-- <a class="navbar-brand" href="#">Navbar</a> -->
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId" aria-expanded="false" aria-label="Toggle navigation"></button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">Home<span class="sr-only">(current)</span></a>
            </li>
        </ul>
        <ul class="nav justify-content-end">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user fa-0.5x"></i>
                    <?php
                    $loggeduser = $session->user_id;
                    if ($loggeduser) {
                        $currentuser = User::find_by_id($loggeduser);
                        if ($currentuser) {
                            echo $currentuser->username;
                        }
                    }

                    ?>
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="../logout.php"">Logout</a>
                    <a class=" dropdown-item" href="../edit_prof.php">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../registration.php">Register</a>
            </li>
        </ul>
    </div>
</nav>


<div>
    <h1> Welcome to the Landing Page

    </h1>
</div>