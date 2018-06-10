<?php
session_start();

include 'includes/vars.php';

include 'includes/header.php';
include 'includes/nav_bar.php';
include 'includes/conn.php';
$_SESSION["start"] = "Select";
if (isset($_GET["lang"])) {
    $_SESSION["start"] = $_GET["lang"];
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
                $_SESSION["ssn"] = $row['ssn'];
                $_SESSION["bday"] = $row['bday'];
                $_SESSION["cur_page"] = "index.php";
                header("Refresh:0");
            }
        } else {
            $msg_error = "<p style='color: #ffffff; font-weight: bold;'>Wrong email or password sql!</p>";
        }
    }
}

?>

	
	<div class="container" style="margin-top: 50px; margin-bottom: 40px; height: 500px; opacity: 0.9; background-color: rgba(255, 255, 255, 0.9);">
		<h1 style="padding-left:100px; "><b>BOOKING</b></h1>
		<?php
$min_date = date("Y-m-d");
$max_date = date('Y-m-d', strtotime($min_date . ' + 29 days'));

if (isset($_POST['submit'])) {
    $source = $_POST['source'];
    $date = $_POST['date'];
    //echo $date;
    $source = trim($source);
    $source = strtolower($source);
    $destination = $_POST['destination'];
    $destination = trim($destination);
    $destination = strtolower($destination);
}
?>

		<form  style=" " class="form-inline" action="index.php" method="POST">
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="source">BusStation:</label>
		      <div class="col-sm-10">
              <select name="source" class="form-control" id="source" onChange="document.location.href='index.php?lang=' + this.value">
                <option <?php if (isset($_POST['submit'])) {echo 'value="' . $source . '"';} else {echo 'value="' . $_SESSION["start"] . '"';}?> > <?php
if (isset($_POST['submit'])) {
    echo $source;
} else {
    echo $_SESSION["start"];
}
?></option>
<?php
$strSQL = "SELECT DISTINCT start_station FROM station";
$objQuery = mysqli_query($connection, $strSQL);
while ($objResuut = mysqli_fetch_array($objQuery)) {
    ?>
<option value="<?php echo $objResuut["start_station"]; ?>"><?php echo $objResuut["start_station"]; ?></option>
<?php
}
?>
</select>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-3" for="pwd">Destination:</label>
		      <div class="col-sm-10">
              <select name="destination" class="form-control" id="destination">
                <option <?php if (isset($_POST['submit'])) {echo 'value="' . $destination . '"';}?> > <?php
if (isset($_POST['submit'])) {
    echo $destination;
} else {
    echo 'Select';
}
?></option>
<?php
$strSQL = "SELECT DISTINCT end_station FROM station WHERE start_station='" . $_SESSION["start"] . "'";
$objQuery = mysqli_query($connection, $strSQL);
while ($objResuut = mysqli_fetch_array($objQuery)) {
    ?>
<option value="<?php echo $objResuut["end_station"]; ?>"><?php echo $objResuut["end_station"]; ?></option>
<?php
}
?>

		        >
		      </div>
		    </div>

		    <div class="form-group">
		      <label class="control-label col-sm-3">Date:</label>
		      <div class="col-sm-10">
		        <input type="date" min=<?php echo $min_date; ?> max=<?php echo $max_date; ?> name="date" class="form-control" id="date" placeholder="dd/mm/yyyy"
		        <?php
if (isset($_POST['submit'])) {
    echo 'value="' . $date . '"';
}
?>
		        >
		      </div>
		    </div>

		    <div class="form-group">
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" name="submit" class="btn btn-primary">Search</button>
		      </div>
		    </div>
		</form>

		<?php
if (isset($_POST['submit'])) {
    $source = $_POST['source'];
    $date = $_POST['date'];
    $_SESSION["date"] = $date;
    //echo $date;
    $source = trim($source);
    $source = strtolower($source);
    $_SESSION["source"] = $source;
    $destination = $_POST['destination'];
    $destination = trim($destination);
    $destination = strtolower($destination);
    $_SESSION["destination"] = $destination;

    $query = "SELECT * FROM bus WHERE intermediate_station LIKE '%" . $source . "%" . $destination . "%'";

    $res = mysqli_query($connection, $query);

    if ($source == "") {
        echo "<h1 style=\"color:red;\" >Enter source</h1>";
    } else if ($destination == "") {
        echo "<h1 style=\"color:red;\" >Enter destination</h1>";
    } else if ($date == 0) {
        echo "<h1 style=\"color:red;\" >Select date</h1>";
    } else if (mysqli_num_rows($res) == 0) {
        echo "<h1 style=\"color:red;\" >No result found</h1>";
    } else {
        echo "<h1>Search results:</h1>";
        ?>
				<div class="table-responsive" style="background-color: rgba(117, 177, 169, 0.824);">
				    <table class="table table-hover">
				  		<thead>
				      	<tr>
				        	<th>Bus No.</th>
				        	<th>Arival time </th>
				        	<th>Destination time </th>
				        	<th>Intermediate Stops </th>
				        	<th>Available seats </th>
				        	<th>Price</th>
				        	<th>Book</th>
				        </tr>
				    </thead>
				  	<?php
while ($row = mysqli_fetch_assoc($res)) {
            $bus_no = $row["bus_no"];
            $bus_id = $row["bus_id"];
            $intermediate_time = $row["intermediate_time"];
            $intermediate_price = $row["intermediate_price"];
            $intermediate_station = $row["intermediate_station"];
            $total_seats = $row["total_seats"];
            $photo = $row["photo"];

            ////////////////////available seats
            $query = "SELECT * FROM seats WHERE bus_id = $bus_id and date1 = '$date'";
            $res1 = mysqli_query($connection, $query);
            if ($row1 = mysqli_fetch_assoc($res1)) {
                $available_seats = $row1["available_seats"];
            } else {
                $query = "INSERT INTO seats (bus_id,date1,available_seats) VALUES ($bus_id,'$date',$total_seats)";
                $res1 = mysqli_query($connection, $query);
                $available_seats = $total_seats;
            }

            ////////////////////

            $arrival_time = "00:00";
            $destination_time = "00:00";
            $intermediate_stops = "";
            $i = 0;
            $fare = 0;
            $f = 0;
            $f1 = 0;
            $curs = explode(",", $intermediate_station);
            $curt = explode(",", $intermediate_time);
            $curf = explode(",", $intermediate_price);
            for ($i = 0;; $i = $i + 1) {
                global $i, $f, $fare, $f1;
                $curs[$i] = trim($curs[$i]);
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

            }?>
					<tr>
						<td><?php echo $bus_no; ?></td>
						<td><?php echo $arrival_time; ?></td>
						<td><?php echo $destination_time; ?></td>
						<td><?php echo $intermediate_stops; ?></td>
						<td><?php echo $available_seats; ?></td>
						<td><?php echo $fare; ?></td>
						<td><?php
if ($available_seats > 0) {
                ?>
							<a href=<?php echo "book.php?bus_id=" . $bus_id . "&fare=" . $fare; ?> >Book now</a>
							<?php
} else {
                echo "No seats available";
            }
            ?></td>
					</tr>
						<?php
}
        ?>
				  </table>
				</div>

		<?php	}}
?>

	</div>
<?php include 'includes/footer.php'?>




<script src="js/bootstrap.min.js" type="text/css"></script>
