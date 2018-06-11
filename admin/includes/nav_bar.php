


	<nav class="navbar navbar-expand-lg navbar-dark bg-success">
		<a class="navbar-brand" style=" font-size:25px;" href="index.php"><b>My Bus </b></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
			</button>

		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav mr-auto">
			    	<li class="nav-item"><a class="nav-link " href="index.php#"><b>ADMIN</b></a></li>
						<li class="nav-item">
							<a class="nav-link" href="about.php"> <b> ABOUT </b></a>
						</li>
					</ul>


			    <ul class="nav navbar-nav navbar-right">
			    	<?php
//$_SESSION["admin_user_name"]="hello";
if ($_SESSION["admin_islogin"] == 0) {
    // header('Location: login.php');
    $str = "<li class=\"nav-item\"><a class=\"nav-link\" href=\"login.php\"><span class=\"glyphicon glyphicon-user\"> </span><b>LOGIN</b></a></li>";
    echo $str;
} else {?>
				    <li class="nav-item"><a href="index.php" class="nav-link text-danger" onclick="logout()"><b>LOGOUT</b></a></li>
			    	<?php
}
?>
			    </ul>

			</div>
	    </div>
	</nav>


<script src="js/bootstrap.min.js" type="text/css"></script>
