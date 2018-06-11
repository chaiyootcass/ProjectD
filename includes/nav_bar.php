<!-- <div class = "container">
	<div class= "row">
		<div class = "col-md-12"> -->

		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
			<a class="navbar-brand" style=" font-size:25px;" href="index.php"><b>My Bus </b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				<span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
			</button>

			<div class="collapse navbar-collapse" id="navbarColor01">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a class="nav-link success" href="index.php#"> <b> HOME </b> <span class="sr-only">(current)</span></a>
				</li>
		
				<li class="nav-item">
					<a class="nav-link" href="about.php"> <b> ABOUT </b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link"><b>HOW TO</b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="contact.php"><b>CONTACT</b></a>
				</li>
			</ul>
				
				<ul class="nav navbar-nav navbar-right">
			    	<?php
					//$_SESSION["user_name"]="hello";
					if ($_SESSION["islogin"] == 0) {
						$str = "<li class=\"nav-item\"><a class=\"nav-link\" style=\" font-size:15px;\" href=\"login.php\"><span class=\"glyphicon glyphicon-user\"></span> <b> LOGIN </b></a></li>
								<li class=\"nav-item\"><a class=\"nav-link\" style=\" font-size:15px;\" href=\"register.php\"><span class=\"glyphicon glyphicon-log-in\"></span> <b> SIGNUP </b></a></li>";
						echo $str;
					} else {?>

											<li class="nav-item"><a class="nav-link" style=" font-size:15px;" href="profile.php"><b> PROFILE </b></a></li>
											<li class="nav-item"><a class="nav-link" style=" font-size:15px;" href="showticket.php"> <b> MY TICKET </b></a></li>
											<li class="nav-item"><a class="nav-link text-danger" style=" font-size:15px;" href="index.php" onclick="logout()"> <b> LOGOUT </b></a></li>
										<?php
					}
					?>
				</ul>

								
			</div>
		</nav>

					<?php
					if ($_SESSION["islogin"] == 0) {
						include 'login.php';
					}
					?>

					<script src="js/bootstrap.min.js" type="text/css"></script>
			
		<!-- </div>
	</div>
</div> -->
