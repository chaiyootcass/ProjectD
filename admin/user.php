<?php
session_start();
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';

//$_SESSION["admin_islogin"]=0;
?>

	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">

<form name="form1" style="padding-left: 25%;" action="user.php" method="POST" onsubmit="return required()">
    <div class="form-group">
        <label >Username :</label>
        <br>
        <input type="text" class="form-control" name="username" style="width: 70%;" id="username" placeholder="Enter User id or User name or Email" >
    </div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
</form>
<?php
include 'includes/conn.php';
if (isset($_POST["submit"])) {
    $id = $_POST["username"];
    $query = "SELECT * FROM user WHERE email_id='$id' OR user_name='$id' OR user_id='$id'";
    $res = mysqli_query($connection, $query);
    if (!$res || mysqli_num_rows($res) == 0) {
        echo "<h1 style=\"color:red;\" >No result found</h1>";
    } else {
        echo "<h1>Search results:</h1>";
        ?>
        <?php
while ($row = mysqli_fetch_assoc($res)) {
            $userid = $row["user_id"];
            $username = $row["user_name"];
            $email = $row["email_id"];
            $phone = $row["phone_no"];
            $fn = $row["first_name"];
            $ln = $row["last_name"];
            $bday = $row["bday"];
            $ssn = $row["ssn"];
            ?>

			<div class="form-group">
			    <label >Username:</label>
			    <br>
			    <input type="text" class="form-control " style=" width: 70%;" placeholder="username" id="user_name" readonly value="<?php echo $username ?>">
			</div>
			<div class="form-group">
			    <label >Name:</label>
			    <br>
			    <input type="text" class="form-control " style="display: inline-block; width: 34%;" id="first_name" placeholder="First name" readonly value="<?php echo $fn ?>">
			    <input type="text" class="form-control" id="last_name" style="display: inline-block; margin-left: 20px; width: 33%;" placeholder="Last name" readonly value="<?php echo $ln ?>">
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Email :</label>
			    <input type="email" class="form-control" id="email_id" style=" width: 70%;" id="exampleInputEmail1" aria-describedby="emailHelp"  value="<?php echo $email ?>" readonly>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">SSN:</label>
			    <input type="text" class="form-control" id="ssn" style=" width: 70%;" id="exampleInputEmail1"  value="<?php echo $ssn ?>" readonly>
			</div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Bday:</label>
			    <input type="text" class="form-control" id="bday" style=" width: 70%;" id="exampleInputEmail1"  value="<?php echo $bday ?>" readonly>
			</div>
			<div class="form-group">
			    <label >Phone number:</label>
			    <input type="text" name="num" id="phone_no" data-validation="number" style=" width: 70%;" data-validation-allowing="negative,number" input name="color" data-validation="number" datavalidation-ignore="$" required="required" class="form-control"  placeholder="Phone Number" maxlength="10" minlength="10" pattern="\d*" readonly value="<?php echo $phone ?>">
			</div>
    <?php

        }
    }
}
?>
<?php include 'includes/footer.php'?>