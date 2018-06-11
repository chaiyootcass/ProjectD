<?php
session_start();
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';

//$_SESSION["admin_islogin"]=0;
?>

	<div class="container" style="margin-top: 70px; margin-bottom: 40px;">

<form name="form1" style="padding-left: 25%;" action="ticket.php" method="POST" onsubmit="return required()">
    <input type="text" style="display: none;" name="st_num" id="st_num" value="0">
    <div class="form-group">
        <label class="text-white">Ticket ID:</label>
        <br>
        <input type="text" class="form-control " name="ticket" style=" width: 70%;" id="ticket" placeholder="Ticket number" >
    </div>
    <button type="submit" name="submit" class="btn btn-danger">Submit</button>
</form>
<?php
include 'includes/conn.php';
if (isset($_POST['submit'])) {
    $id = $_POST['ticket'];
    $query = "SELECT * FROM ticket,user WHERE ticket.ticket_id=$id and user.user_id=ticket.user_id";
    $res = mysqli_query($connection, $query);
    if (mysqli_num_rows($res) == 0) {
        echo "<h5 style=\"color:red;\" ><center>No result found!</center></h5>";
    } else {
        echo "<h5><center>Search results:</center></h5>";
        ?>
<div class="table-responsive" style="background-color: rgba(206, 228, 229,0.8);">
				    <table class="table table-hover">
				  		<thead>
				      	<tr>
				        	<th>Ticket id.</th>
				        	<th>User name</th>
				        	<th>Bus id</th>
				        	<th>Source</th>
				        	<th>Destination</th>
				        	<th>price</th>
				        	<th>time_of_booking</th>
				        	<th>Number of passenger</th>
                  <th>Date of journey</th>
				        </tr>
				    </thead>
        <?php
while ($row = mysqli_fetch_assoc($res)) {
            $ticketid = $row["ticket_id"];
            $username = $row["user_name"];
            $busid = $row["bus_id"];
            $source = $row["source"];
            $destination = $row["destination"];
            $price = $row["price"];
            $timebook = $row["time_of_booking"];
            $number = $row["no_of_passenger"];
            $datej = $row["date_of_journey"];
            ?>

<tr>
						<td><?php echo $ticketid; ?></td>
						<td><?php echo $username; ?></td>
						<td><?php echo $busid; ?></td>
						<td><?php echo $source; ?></td>
                        <td><?php echo $destination; ?></td>
						<td><?php echo $price; ?></td>
						<td><?php echo $timebook; ?></td>
						<td><?php echo $number; ?></td>
                        <td><?php echo $datej; ?></td>
                        <tr>
    <?php

        }
    }
}
?>
<?php include 'includes/footer.php'?>
