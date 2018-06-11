<?php
session_start();
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
//$_SESSION["islogin"]=0;

if ($_SESSION["islogin"] == 0) {
    header("Location: index.php"); /* Redirect browser */
    exit();
}
?>
	<div class="container" style="background-color: rgba(255, 255, 255, 0.8); padding: 15px 15px 30px; margin-top: 70px; margin-bottom: 40px;">

	<div >
			<h1 style="text-align: center;"><?php echo $_SESSION["user_name"] ?></h1>
			<img class="profile_photo" src="img/reg.png">
		</div>
		<form style="padding-left: 25%;" method="POST">
			<div class="form-group">
			    <label ><b>Username</b></label>
			    <br>
			    <input type="text" class="form-control " style=" width: 50%;" placeholder="username" id="user_name" readonly value="<?php echo $_SESSION["user_name"] ?>">
			</div>
			<div class="form-group">
			    <label ><b>Name</b></label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 34%;" id="first_name" placeholder="First name" value="<?php echo $_SESSION["first_name"] ?>">
			    <input type="text" class="form-control" id="last_name" style="display: inline-block; margin-left: 20px; width: 33%;" placeholder="Last name" value="<?php echo $_SESSION["last_name"] ?>">
			</div>
			<div class="form-group ">
			    <label for="exampleInputEmail1" ><b>Email Address</b></label>
			    <input type="email" class="form-control" id="email_id" style=" width: 70%;" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $_SESSION["email_id"] ?>" readonly>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1"><b>SSN</b></label>
			    <input type="text" class="form-control" id="ssn" style=" width: 70%;" id="exampleInputEmail1"  value="<?php echo $_SESSION["ssn"] ?>" readonly>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1"><b>Birth Day</b></label>
			    <input type="text" class="form-control" id="bday" style=" width: 70%;" id="exampleInputEmail1"  value="<?php echo $_SESSION["bday"] ?>" readonly>
			</div>
			<div class="form-group">
			    <label ><b>Phone number</b></label>
			    <input type="text" name="num" id="phone_no" data-validation="number" style=" width: 70%;" data-validation-allowing="negative,number" input name="color" data-validation="number" datavalidation-ignore="$" required="required" class="form-control"  placeholder="Phone Number" maxlength="10" minlength="10" pattern="\d*" value="<?php echo $_SESSION["phone_no"] ?>">
			</div>
			<button type="submit" onclick="update_profile()" class="btn btn-primary"><b>SUBMIT</b></button>
		</form>

	</div>
<?php include 'includes/footer.php'?>




<script src="js/bootstrap.min.js" type="text/css"></script>
