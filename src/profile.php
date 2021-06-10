<?php require_once("includes/header.php"); ?>


<?php

if (!$session->is_signed_in()) {;
    redirect("login.php");
}
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
                    <a class="dropdown-item" href="../logout.php">Logout</a>
                    <a class=" dropdown-item" href="../edit_prof.php?id=<?php echo $currentuser->id; ?>">Edit Profile</a>
                    <div class="dropdown-divider"></div>
                </div>
            </li>

    </div>
</nav>


<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    <?php echo "Welcome $currentuser->username"; ?>

                </h1>


                <div class="row">
                    <!-- Blog Entries Column -->
                    <div class="row">
                        <!-- Blog Entries Column -->
                        <div class="col-md-12">
                            <!-- <div class="thumbnails row">
                                <?php foreach ($photos as $photo) :  ?>
                                    <div class="col-xs-6 col-md-3">
                                        <a class="thumbnail" href="/includes/photo.php?id=<?php echo $photo->id; ?>">
                                            <img class="home_page_photo img-responsive" src="<?php echo $photo->picture_path(); ?>" alt="">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div> -->
                            <!-- <div class="row">
                                <ul class="pager"> -->
                            <?php
                            // if ($paginate->page_total() > 1) {
                            //     if ($paginate->has_next()) {

                            //         echo "<li class='next'><a href='index.php?page={$paginate->next()}'>Next</a></li>";
                            //     }
                            //     for ($i = 1; $i <= $paginate->page_total(); $i++) {
                            //         if ($i == $paginate->current_page) {
                            //             echo  "<li class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                            //         } else {

                            //             echo  "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                            //         }
                            //     }
                            //     if ($paginate->has_previous()) {
                            //         echo "<li class='previous'><a href='index.php?page={$paginate->previous()}'>Previous</a></li>";
                            //     }
                            // }
                            ?>
                            <!-- </ul>
                            </div> -->

                        </div>
                    </div>

                    <!-- Blog Sidebar Widgets Column -->
                </div>



            </div>
        </div>
        <!-- /.row -->


    </div>
    <!-- /.container-fluid -->

</div>