<?php
session_start();
require_once './config.php';
include 'includes/vars.php';
include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
$token = $_POST['stripeToken'];
$email = $_POST['stripeEmail'];

$customer = \Stripe\Customer::create(array(
    'email' => $email,
    'source' => $token,
));

$charge = \Stripe\Charge::create(array(
    'customer' => $customer->id,
    'amount' => $_SESSION['totalfare'],
    'currency' => 'usd',
));

//echo '<h1>Successfully charged ! Redirect in 5 sec</h1>';
//header('Refresh: 5; URL=http://localhost/bus_ticketing_system/');
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
?>


<div class="container" style=" margin-top: 70px; margin-bottom: 40px">
<h2>Successfully Paid !</h2><br>
<?php
$fare = $_SESSION['totalfare'];
$bus_id = $_SESSION["bus_id"];
$date = $_SESSION["date"];
$user_id = $_SESSION["user_id"];
$source = $_SESSION["source"];
$destination = $_SESSION["destination"];
$time = date("Y-m-d h:i:sa") . " GMT";
$number = $_SESSION["number"];
$query = "INSERT INTO `ticket` (`ticket_id`, `user_id`, `bus_id`, `source`, `destination`, `price`, `time_of_booking`, `no_of_passenger`,`date_of_journey`) VALUES (NULL, '" . $user_id . "', '" . $bus_id . "', '" . $source . "', '" . $destination . "', '" . $fare . "', '" . $time . "', '" . $number . "','$date')";
$query1 = "UPDATE  seats
          SET     available_seats	 = GREATEST(0, available_seats - $number)
          WHERE   bus_id = $bus_id and date1 = '$date'";
$result = mysqli_query($connection, $query);
$result1 = mysqli_query($connection, $query1);
$sql = "SELECT * FROM `ticket` WHERE ticket_id=(SELECT MAX(ticket_id) FROM `ticket`)";
$query = mysqli_query($connection, $sql);
while ($row = mysqli_fetch_assoc($query)) {
    $_SESSION["ticketid"] = $row['ticket_id'];
    $_SESSION["time"] = $row['time_of_booking'];
    $_SESSION["date"] = $row['date_of_journey'];
}
?>
 
    <div class = "container col-md-6" style ="background : rgba(117, 177, 169, 0.824); border:solid black 2px; border-radius: 8px;margin: 10px; padding:10px;">
            <h1 style = "font-size: 35px;"><b>MY TICKET</b> </h1>
            <h1 style = "font-size: 15px;"><b>*Please capture screen for confirm at staton </b> </h1>
    </div>
    <div class="container col-md-6" style="background : rgba(117, 177, 169, 0.824); border:solid black 2px; border-radius: 8px;margin: 10px; padding:10px;">
        <h1 style = "font-size: 35px;">
        <b>Ticket id:</b> <?php echo $_SESSION["ticketid"]; ?><br></h1> 
        <h1 style = "font-size: 35px;">
        <b>From : </b><?php echo $_SESSION["source"]; ?>
        <br><b>To : </b><?php echo $_SESSION["destination"]; ?>     
        <br><b> Price : </b><?php echo $_SESSION["fare"]; ?><b> per person</b>
        <br><b> Number Passenger : </b><?php echo $_SESSION["number"]; ?>
		<br><b> Arrival Time : </b><?php echo $_SESSION["arrival_time"]; ?>
			<br><b>Destination Time : </b><?php echo $_SESSION["destination_time"]; ?>
            <br><b>Time of booking : </b><?php echo $_SESSION["time"]; ?>
            <br><b>Date of journey : </b><?php echo $_SESSION["date"]; ?>
			<br> <span><b>Total Price : </b><?php echo $_SESSION['totalfare']; ?></span> </h1>
	</div>

<?php include 'includes/footer.php'?>
<script src="js/bootstrap.min.js" type="text/css"></script>
