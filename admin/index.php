<?php
session_start();
$_SESSION["cur_page"] = "index.php";
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';

if ($_SESSION["admin_islogin"] == 0) {
    header('Location: login.php');

}
?>
<div class = "container "style="margin-top: 100px; margin-bottom: 40px;>
  	<div class= "row">
  		<div class = "container container-center col-md-9">
        <div class="list-group">
          <a href="bus.php" class="list-group-item d-flex justify-content-between align-items-center ">ADD BUS
            <span class="badge badge-primary badge-pill">✚</span>
          </a>
          <a href="user.php" class="list-group-item d-flex justify-content-between align-items-center">USER
            <span class="badge badge-primary badge-pill">★</span>
          </a>
          <a href="ticket.php" class="list-group-item d-flex justify-content-between align-items-center">TICKETS
            <span class="badge badge-primary badge-pill">▼</span>
          </a>
        </div>
    </div>
  </div>
</div>

	<!-- <div class="list-group " style="min-height: 550px; margin-top: 70px; margin-bottom: 40px;">
		<a href="bus.php"><div class="list-group-item list-group-item-action active col-md-3 que_cont">Add Bus</div></a>
		<a href="user.php"><div class="list-group-item list-group-item-action active col-md-3 que_cont">User</div></a>
		<a href="ticket.php"><div class="list-group-item list-group-item-action active col-md-3 que_cont">Tickets</div></a>
	</div> -->
<?php include 'includes/footer.php'?>




<script src="js/bootstrap.min.js" type="text/css"></script>
