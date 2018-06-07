


	<nav class="navbar navbar-inverse navbar-fixed-top" style="padding-left: 50px; padding-right: 50px; background-color: #0c1a1e">
		<div class="container-fluid">

			<div class="navbar-header">
		        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		        </button>
		    	<a class="navbar-brand" style="color:#e82c2c; font-size: 35px;" href="index.php">MyBus</a>
		    </div>

		    <div class="collapse navbar-collapse" id="myNavbar">
			    <ul class="nav navbar-nav">
			    	<li class="active"><a href="#">Admin</a></li>
			    	<!-- <li><a href="#">Page 1</a></li> -->
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<?php
//$_SESSION["admin_user_name"]="hello";
if ($_SESSION["admin_islogin"] == 0) {
    // header('Location: login.php');
    $str = "<li><a href=\"login.php\"><span class=\"glyphicon glyphicon-user\"> </span>login</a></li>";
    echo $str;
} else {?>
				    <li><a href="index.php" onclick="logout()">Logout</a></li>
			    	<?php
}
?>
			    </ul>

			</div>
	    </div>
	</nav>


<script src="js/bootstrap.min.js" type="text/css"></script>
