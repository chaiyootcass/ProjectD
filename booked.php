<?php
session_start();
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
//$_SESSION["islogin"]=0;
?>
	<div class="container" style="margin-top: 150px; margin-bottom: 40px">
<?php
if (($_SESSION["islogin"] == 1) && $_POST && isset($_POST['number'])) {
    $number = $_POST["number"];
    //$date = $_POST["date"];
    $fare = $_SESSION["fare"] * $number;
    $bus_id = $_SESSION["bus_id"];
    $date = $_SESSION["date"];
    $user_id = $_SESSION["user_id"];
    $source = $_SESSION["source"];
    $destination = $_SESSION["destination"];
    $time = date("Y-m-d h:i:sa") . " GMT";
    $_SESSION["number"] = $number;
    $ticket_id = 1;
    //echo $date;

    /* $query = "INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`,`date_of_journey`) VALUES (NULL, '" . $user_id . "', '" . $bus_id . "', '" . $source . "', '" . $destination . "', '" . $fare . "', '" . $time . "', '" . $number . "','$date')";
    $query1 = "UPDATE  seats
    SET     available_seats     = GREATEST(0, available_seats - $number)
    WHERE   bus_id = $bus_id and date1 = '$date'";

    $result = mysqli_query($connection, $query);
    $result1 = mysqli_query($connection, $query1);*/
    if ($ticket_id == 1) {
        ?>
        <div class="container col-md-6 card text-white bg-danger" style="margin: 5px; padding:0px;">
		<div class="card-header">
        <h1 style = "font-size: 35px;"><b>CONFIRMATION TICKET</b> </h1>
        <h1 style = "font-size: 15px;" class = "text-dark"><b>*Please check your ticket </b> </h1>
    </div>
        <div class="card-body">
        <h1 style = "font-size: 35px;">
        <b>TICKET</b></h1>
        <h1 style = "font-size: 25px;">
        <b>From : </b><?php echo $_SESSION["source"]; ?></b> 
        <br><b>To :</b><?php echo $_SESSION["destination"]; ?>     
        <br><b>Price : </b><?php echo $_SESSION["fare"]; ?><b> per person </b>
        <br><b>Number Passenger : </b><?php echo $_SESSION["number"]; ?>
			<br><b>Arrival Time : </b><?php echo $_SESSION["arrival_time"]; ?>
			<br><b>Destination Time: </b><?php echo $_SESSION["destination_time"]; ?>
			<br> <span><b>Total Price : </b><?php echo $fare; ?></span> </h1>
		</div>
        </div>
		<?php
require_once './config.php';
        $_SESSION['totalfare'] = $fare;
        ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button "
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-description="Access for a year"
          data-amount=$_SESSION['totalfare']
          data-locale="auto"></script>
</form>
		<?php
} else {
        echo "Something's not right.  No ticket was booked";
    }
}
?>
	</div>
<?php include 'includes/footer.php'?>



<script src="js/bootstrap.min.js" type="text/css"></script>
