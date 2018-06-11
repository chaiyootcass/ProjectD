<?php
session_start();
$_SESSION["cur_page"] = "index.php";
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
$msg_error = "";
if (isset($_POST['username'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    if ((!$email) || (!$password)) {
        $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password!</p>";
    } else {

        $sql = "SELECT * FROM `admin` where email='$email' and password='$password'";
        if ($query_run = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $_SESSION["admin_islogin"] = 1;
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["email_id"] = $row['email'];
                $_SESSION["cur_page"] = "index.php";
                header('Location: index.php');
            }
        } else {
            $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password sql!</p>";
        }
    }
}

?>

	<div class="container " style="margin-top: 100px; margin-bottom: 40px;">
    <?php
echo "$msg_error";
?>

    <form class="form-signin" action="login.php" method="POST">
    	<h2 class="form-signin-heading"><center><b>ADMIN</b></center></h2>
    	<input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
    	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
      <br>
    	</label>
    	<button class="btn btn-lg btn-danger btn-block " type="submit">Login</button>

    </form>
	</div>

<?php include 'includes/footer.php'?>




<script src="js/bootstrap.min.js" type="text/css"></script>
