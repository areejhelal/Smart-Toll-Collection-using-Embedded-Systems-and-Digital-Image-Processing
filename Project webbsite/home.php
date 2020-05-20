<?php
session_start();
$username = $_SESSION['username'];


// connecting to the databse
$user = 'root';
$pass = '';
$db = 'project_db';
$conn = mysqli_connect('localhost', $user , $pass , $db);
if(mysqli_connect_errno())
{
  die("Connection failed" .mysqli_connect_error());
}



// getting the user data
$sql="select * from users where account_username='$username'";
$res = mysqli_query($conn , $sql);
if(!$res)
{
	die("Query Failed!");
}
while($row=$res->fetch_assoc())
{
  $id = $row["user_id"];
	$fullname =  $row["user_name"];
	$phone_no = $row["user_phone_no"];
	$email = $row["user_email"];
	$national_id = $row["user_national_id"];
	$bank_account = $row["user_bank_account"];

}
mysqli_free_result($res);


 ?>


<!DOCTYPE html>
<!--
	ubusina by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com
-->
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Smart Toll Collection</title>
  <style>
.info{
  font-size: 30px;
  color:white;
}
.myTable {
border-collapse:collapse;
margin-left: 380px;
}
.myTable th {
background-color:white;
text-align: center;
padding:5px;
border:1px solid white;
color:black;
font-size: 26px;
}
.myTable td {
padding:5px;
border:1px solid white;
color:white;
font-size: 26px;

}
</style>
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
</head>
<body>

	<!-- ====================================================
	header section -->
	<header class="top-header">
		<div class="container">
			<div class="row">
				<div class="col-xs-5 header-logo">
					<br>
					<h1><a href="home.php" align="left" style="color:black" >Smart Toll Collection</a></h1>
				</div>

				<div class="col-md-7">
					<nav class="navbar navbar-default">
					  <div class="container-fluid nav-bar">
					    <!-- Brand and toggle get grouped for better mobile display -->
					    <div class="navbar-header">
					      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					      </button>
					    </div>

					    <!-- Collect the nav links, forms, and other content for toggling -->
					    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

					      <ul class="nav navbar-nav navbar-right">
					        <li><a class="menu active" href="#home" >Home</a></li>
                  <li><a class="menu" href="#service">view account </a></li>
                  <li><a class="menu" href="#about">News</a></li>
					        <li><a class="menu" href="#contact"> contact us</a></li>
					      </ul>


					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->




			<section class="slider" id="home">
				<div class="container-fluid">
					<div class="row">

					    <div id="carouselHacked" class="carousel slide carousel-fade" data-ride="carousel">
							<div class="header-backup"></div>
					        <!-- Wrapper for slides -->
					        <div class="carousel-inner" role="listbox">
					            <div class="item active">
					            	<img src="img/1.jpg" alt="">
					                <div class="carousel-caption">
				               			<h1>No Congestion </h1>
				               			<p>no stopping gates</p>
					                </div>
					            </div>
					            <div class="item">
					            	<img src="img/2.jpg" alt="">
					                <div class="carousel-caption">
														<h1>Save Time</h1>
				               			<p>no longer waiting in queues</p>
					                </div>
					            </div>
					            <div class="item">
					            	<img src="img/3.jpg" alt="">
					                <div class="carousel-caption">
				               			<h1>Save Money</h1>
				               			<p>less gas consumption</p>
					                </div>
					            </div>
					            <div class="item">
					            	<img src="img/4.jpg" alt="">
					                <div class="carousel-caption">
				               			<h1>Future of roads</h1>
				               			<p></p>
					                </div>
					            </div>
					        </div>

					        <!-- Controls -->
					        <a class="left carousel-control" href="#carouselHacked" role="button" data-slide="prev">
					            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					            <span class="sr-only">Previous</span>
					        </a>
					        <a class="right carousel-control" href="#carouselHacked" role="button" data-slide="next">
					            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					            <span class="sr-only">Next</span>
					        </a>
					    </div>

					</div>
				</div>
			</section><!-- end of slider section -->

      <!-- service section starts here -->

			<section class="service text-center" id="service">
				<div class="container">
					<div class="row">
            <br>
            <br>
						<h2>Account Information</h2>
						<h3 class="info">User Name:  <?php echo $username ?></h3>
						<h3 class="info">Full Name:  <?php echo $fullname ?></h3>
						<h3 class="info">Phone Number:  <?php echo $phone_no ?></h3>
						<h3 class="info">Email:  <?php echo $email ?></h3>
						<h3 class="info">National Id:  <?php echo $national_id ?></h3>
						<h3 class="info">Bank Account Number:  <?php echo $bank_account ?></h3>
            <?php $sql="select * from cars where user_id='$id'";
            $res = mysqli_query($conn , $sql);
            if(!$res)
            {
            	die("Query Failed!");
            }
            echo "<br>";
            echo "<table  border=1 cellpadding=1 class='myTable'><tr><th>Cars Owned</th><th>Last Toll Date</th><th>Number of Times</th></tr>";
            while($row=$res->fetch_assoc())
            {
              $last_updated = $row["last_updated"];
              $car_logs = $row["car_logs"];
              $car_number = $row["car_number"];
              echo "<tr><td>" . $row["car_number"]. "</td><td>" . $row["last_updated"]. "</td><td>". $row["car_logs"]. "</td></tr>";
            }
            echo "</table>";
            mysqli_free_result($res); ?>

            <br>
						<br>
<br>
<br>
				</div>
			</section><!-- end of service section -->


			<!-- about section -->
			<section class="about text-center" id="about">
				<div class="container">
					<div class="row">
            <br>
            <br>
						<h2>Latest News</h2>
						<h4>Recent Egypt Highway News</h4>

						<div class="col-md-4 col-sm-6">
							<div class="single-about-detail clearfix">
								<div class="about-img">
									<img src="img/news1.jpg" alt="" style="height:240px">
								</div>

								<div class="about-details" style="height:200px">

                 <p></p>
									<h3><a href="https://invest-gate.me/features/egypts-top-10-roads-exploring-the-national-roads-project/" target="_blank" style="color:white">Egypt’s Top 10 Roads: Exploring the National Roads Project</a></h3>
									<p></p>
								</div>
							</div>
						</div>

						<div class="col-md-4 col-sm-6">
							<div class="single-about-detail">
								<div class="about-img">
									<img class="img-responsive" src="img/news2.jpg" alt="" style="height:240px">
								</div>

								<div class="about-details">
                  <p></p>
									<h3><a href="https://www.egypttoday.com/Article/2/62713/2018-Accomplishment-National-Road-Project-puts-Egypt-75-globally-in" target="_blank" style="color:white">2019 Accomplishment: National Road Project puts Egypt 75 globally in road quality</a></h3>
									<p></p>
								</div>
							</div>
						</div>


						<div class="col-md-4 col-sm-6">
							<div class="single-about-detail">
								<div class="about-img">
									<img class="img-responsive" src="img/news3.jpg" alt="" style="width:360px">
								</div>

								<div class="about-details" style="height:200px">
									<p></p>
									<h3><a href="http://www.worldhighways.com/sections/emergent/features/egypts-new-concrete-highway-connecting-cairo-with-suez/" target="_blank" style="color:white">Egypt’s new concrete highway connecting Cairo with Suez</a></h3>
									<p></p>
						</div>
							</div>
              <br>
  <br>
  <br>
						</div>

					</div>
				</div>
			</section><!-- end of about section -->


<br>
<br>



			<!-- map section -->
			<section class="api-map" id="contact">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 map" id="map"></div>
					</div>
				</div>
			</section><!-- end of map section -->

			<!-- contact section starts here -->
			<section class="contact">
				<div class="container">
					<div class="row">
							<div class="contact-caption clearfix">
								<div class="contact-heading text-center">
									<h2>contact us</h2>
								</div>

								<div class="col-md-5 contact-info text-left">
									<h3>contact information</h3>
									<div class="info-detail">
										<ul><li><i class="fa fa-calendar"></i><span>Monday - Friday:</span> 9:30 AM to 6:30 PM</li></ul>
										<ul><li><i class="fa fa-map-marker"></i><span>Address:</span> 123 Some Street , California, US, CP 123</li></ul>
										<ul><li><i class="fa fa-phone"></i><span>Phone:</span> (01) 999-1235</li></ul>
										<ul><li><i class="fa fa-fax"></i><span>Fax:</span> (01) 999-1234</li></ul>
										<ul><li><i class="fa fa-envelope"></i><span>Email:</span> info@domain.com</li></ul>
									</div>
								</div>


								<div class="col-md-6 col-md-offset-1 contact-form">
									<h3>leave us a message</h3>

									<form class="form">
										<input class="name" type="text" placeholder="Name">
										<input class="email" type="email" placeholder="Email">
										<input class="phone" type="text" placeholder="Phone No:">
										<textarea class="message" name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
										<input class="submit-btn" type="submit" value="SUBMIT">
									</form>
								</div>

							</div>
					</div>
				</div>
			</section><!-- end of contact section -->


			<!-- footer starts here -->
			<footer class="footer clearfix">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 footer-para">
							<p>&copy; <a href="http://localhost/webbsite/home.php">electronictollcollection.com</a> All right reserved</p>
						</div>

						<div class="col-xs-6 text-right">
							<a href="https://www.facebook.com/" target="_blank"><i class="fa fa-facebook"></i></a>
							<a href="https://twitter.com/" target="_blank"><i class="fa fa-twitter"></i></a>
							<a href="https://www.skype.com/ar/" target="_blank"><i class="fa fa-skype"></i></a>
						</div>
					</div>
				</div>
			</footer>





	<!-- script tags
	============================================================= -->
	<script src="js/jquery-2.1.1.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/button.js"></script>
</body>
</html>
