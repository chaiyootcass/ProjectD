<?php
if (!isset($_SESSION["islogin"])) {
    $_SESSION["islogin"] = 0;
    $_SESSION["user_name"] = "";
    $_SESSION["user_id"] = "";
    $_SESSION["email_id"] = "";
    $_SESSION["phone_no"] = 0;
    $_SESSION["first_name"] = "";
    $_SESSION["last_name"] = "";
    $_SESSION["photo"] = "";
    $_SESSION["cur_page"] = "index.php";

}
if (isset($_POST['username'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    if ((!$email) || (!$password)) {
        $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password!</p>";
    } else {
        include 'conn.php';

        $sql = "SELECT * FROM `user`where email_id='$email' and password='$password'";
        if ($query_run = mysqli_query($connection, $sql)) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $_SESSION["islogin"] = 1;
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["user_id"] = $row['user_id'];
                $_SESSION["email_id"] = $row['email_id'];
                $_SESSION["phone_no"] = $row['phone_no'];
                $_SESSION["first_name"] = $row['first_name'];
                $_SESSION["last_name"] = $row['last_name'];
                $_SESSION["photo"] = $row['photo'];
                $_SESSION["cur_page"] = "index.php";

            }
        } else {
            $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password sql!</p>";
        }
    }
}
?>

<div id="id01" class="wrapper">
    <form class="form-signin" action="index.php" method="POST">
    	<h2 class="form-signin-heading">Please login</h2>
    	<input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" />
    	<input type="password" class="form-control" name="password" placeholder="Password" required=""/>
    	<label class="checkbox">
    	<input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
    	</label>
    	<button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </form>
 	</div>


<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
