<?php require_once("includes/header.php"); ?>
<?php require_once("includes/navigation.php"); ?>
<?php

if (isset($_POST['submit'])) {
    $username = trim($_POST['username']);
    $user_password = trim($_POST['user_password']);


    //verify user from User class
    $user_success = User::user_verify($username, $user_password);

    if ($user_success) {
        $session->login($user_success);
        // echo "Welcome!";
        redirect("profile.php");
    } else {
        $the_message = "Your username and/or password are incorrect";
    }
} else {
    $the_message = "";
    $username = "";
    $user_password = "";
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
                <h4 class="bg-danger"><?php echo $the_message; ?></h4>

                <form id="login-id" action="" method="post">

                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo htmlentities($username); ?>">

                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="user_password" value="<?php echo htmlentities($password); ?>">

                    </div>

                    <div class="form-group">
                        <a href="#">Forgot Password?</a>
                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">

                    </div>


                </form>
            </div>

        </div>
        <!-- </div>
        </div> -->
    </div>
</div>

<?php include("includes/panel-bottom.php"); ?>




<?php include("includes/footer.php"); ?>