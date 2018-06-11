<?php
session_start();
include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
//$_SESSION["islogin"]=0;
?>
	<div class="container " style="margin-top: 100px; margin-bottom: 40px">
		<?php
if (($_SESSION["islogin"] == 1)) {

    $bus_id = $_GET["bus_id"];
    $user_id = $_SESSION["user_id"];
    $source = $_SESSION["source"];
    $date = $_SESSION["date"];
    $destination = $_SESSION["destination"];
    $query = "SELECT * FROM bus WHERE bus_id = " . $_GET['bus_id'];
    $res = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($res);

    $intermediate_time = $row["intermediate_time"];
    $intermediate_price = $row["intermediate_price"];
    $intermediate_station = $row["intermediate_station"];

    $i = 0;
    $fare = 0;
    $f = 0;
    $f1 = 0;
    $arrival_time = "00:00";
    $destination_time = "00:00";
    $intermediate_stops = "";
    $curs = explode(",", $intermediate_station);
    $curt = explode(",", $intermediate_time);
    $curf = explode(",", $intermediate_price);
    for ($i = 0;; $i = $i + 1) {
        global $i, $f, $fare, $f1;
        $curs[$i] = trim($curs[$i]);
        // if($f==0 && strcmp($source,$curs[$i]) ==0)            $f=1;
        // if($f==1)         $fare = $fare + $curf[$i];
        // if($f==1 && strcmp($destination,$curs[$i]) ==0)                break;

        if ($f == 0 && strcmp($source, $curs[$i]) == 0) {
            $f = 1;
            $arrival_time = $curt[$i];
        }
        if ($f == 1) {
            $fare = $fare + $curf[$i];
        }
        if ($f == 1 && strcmp($destination, $curs[$i]) == 0) {
            $destination_time = $curt[$i];
            break;
        }
        if ($f == 1) {
            if ($f1 == 0) {
                $f1 = 1;
                continue;
            }
            if ($f1 == 1) {
                $f1 = 2;
                $intermediate_stops = $curs[$i];
                continue;
            }
            $intermediate_stops = $intermediate_stops . " , " . $curs[$i];
        }
    }
    $_SESSION["fare"] = $fare;
    $_SESSION["bus_id"] = $bus_id;
    $_SESSION["user_id"] = $user_id;
    $_SESSION["arrival_time"] = $arrival_time;
    $_SESSION["destination_time"] = $destination_time;

    ?>


		<div class="container col-md-6 card text-dark" style="background-color: rgba(255, 255, 255, 0.7); margin: 10px; padding:10px;">
        <div class="card-header">
        <h3 style = "font-size: 35px;"><b>TICKET</b> </h3></div>
        <div class="card-body ">
        <h3 style = "font-size: 25px;" >
            <b>From : </b> <?php echo $_SESSION["source"]; ?>
            <br><b>To : </b><?php echo $_SESSION["destination"]; ?>
            <br><b>Price : </b><?php echo $fare; ?><b> per person </b>
			<br><b>Arrival Time : </b><?php echo $arrival_time; ?>
			<br><b>Destination Time : </b><?php echo $destination_time; ?></h3>
</div>
		</div>
		<div class="container col-md-6 card text-dark " style="background-color: rgba(255, 255, 255, 0.7); margin: 10px; padding:10px;">

		<?php
//$query = "SELECT available_seats FROM bus WHERE   bus_id = $bus_id";
    $query = "SELECT * FROM seats WHERE bus_id = $bus_id and date1 = '$date'";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        echo "query not working";
    }

    $row = mysqli_fetch_assoc($result);
    $max_seat = $row["available_seats"];
    ?>

		<form action="booked.php" method="POST" style="display: inline-block;">
		<h4 class = "text-dark"style="display: inline-block;"><b>Number of passengers :</b></h4>
		    <input name="number" style="width: 60px;" data-bind="value: qty()" value="1" type="number" max="<?php echo $max_seat; ?>" min="1"  maxlength="6"/>
		    <br>

		    <button  class="btn btn-lg btn-primary " name="submit" value="submit" > <b>GO </b></button>
		</form>
		<?php
} else {
    echo "<h1 style=\"margin-top:40px;\">You are not logged in</h1>";
}

?>



		</div>
	</div>
<?php include 'includes/footer.php'?>



<script src="js/bootstrap.min.js" type="text/css"></script>
