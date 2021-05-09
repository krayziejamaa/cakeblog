<?php include("includes/header.php"); ?>
<?php include("includes/navigation.php"); ?>
<?php
if ($session->is_signed_in()) {
    redirect("landing.php");
}
?>

<div class="container">

</div>

<div id="front-land">

    <h1>Welcome Cake Lover</h1>
    <a class="btn btn-success" href="login.php">Login</a>
    <br>
    <span class="reg">
        <a href="registration.php" style="color: white; font:200; margin-top: 10px;">No account? Sign up!</a>
    </span>
</div>

<div class="front-page">

</div>

<?php include("includes/footer.php"); ?>