<?php
include 'includes/vars.php';
include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
$msg_error = "";
//$_SESSION["islogin"]=0;

?>
	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">
    <?php
echo "$msg_error";
?>
    <form class="form-signin" action="index.php" method="POST">
    	<h2 class="form-signin-heading"><center><b>LOGIN</b></center></h2>
    	<input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
    	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
    	<label class="checkbox">
    	<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
    	</label>
    	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>

    </form>








	</div>
<?php include 'includes/footer.php'?>




<script src="js/bootstrap.min.js" type="text/css"></script>
