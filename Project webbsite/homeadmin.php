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
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style1.css">
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
					<h1><a href="homeadmin.php" align="left" style="color:white" >Smart Toll Collection</a></h1>
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
					        <h2 style="margin-left: 450px"><a href="#" align="left" style="color:white" >Welcome,  <?php echo $username ?> </a></h2>
					    </div><!-- /navbar-collapse -->
					  </div><!-- / .container-fluid -->
					</nav>
				</div>
			</div>
		</div>
	</header> <!-- end of header area -->


	<div class="sidenav">
	  <a href="#" id="carsusers">Cars and Users</a>
	  <a href="#" id="cars">Cars</a>
	  <a href="#" id="users">Users</a>
	  <a href="#" id="alerts">Alerts</a>
    <a href="#" id="admins">Admins</a>
    <a href="#" id="images">Images</a>
	</div>
<div class="main">
			<section class="slider" id="home">
				<div class="container-fluid">
					<div class="row">
					</div>
				</div>
			</section><!-- end of slider section -->

      <!-- service section starts here -->

			<section class="service text-center" id="service">
				<div class="container" >
					<div class="row" style="display:block" id="table1">
            <br>
            <br>
						<h2>Cars and Users Table</h2>
            <input type="text" id="myInput1" onkeyup="myFunction1()" placeholder="Search by car numbers..">
            <?php $sql="SELECT * FROM cars INNER JOIN users ON cars.user_id=users.user_id ";
            $res = mysqli_query($conn , $sql);
            if(!$res)
            {
            	die("Query Failed!");
            }
            echo "<br>";
            echo "<table  border=1 cellpadding=1 class='myTable1' id='myTable1'><tr><th>Car Number</th><th>Car Barcode</th><th>Owner Name</th><th>Owner Number</th><th>Owner Email</th><th>Owner Bank Account</th><th>Owner National ID</th></tr>";
            while($row=$res->fetch_assoc())
            {
              echo "<tr><td>" . $row["car_number"]. "</td><td>" . $row["car_barcode"]. "</td><td>" . $row["user_name"]. "</td><td>" . $row["user_phone_no"]. "</td><td>" . $row["user_email"]. "</td><td>" . $row["user_bank_account"]. "</td><td>" . $row["user_national_id"]. "</td></tr>";
            }
            echo "</table>";
            mysqli_free_result($res); ?>

            <br>
						<br>

				</div>


        <div class="row" style="display:none" id="table2">
          <br>
          <br>
          <h2>Cars Table</h2>
          <input type="text" id="myInput2" onkeyup="myFunction2()" placeholder="Search by car numbers..">
          <?php $sql="SELECT * FROM cars";
          $res = mysqli_query($conn , $sql);
          if(!$res)
          {
            die("Query Failed!");
          }
          echo "<br>";
          echo "<table  border=1 cellpadding=1 class='myTable2' id='myTable2'><tr><th>Car Number</th><th>Cars ID</th><th>Car Barcode</th><th>Car Status</th><th>Car Owner ID</th><th>Car Logs</th><th>Last Log</th></tr>";
          while($row=$res->fetch_assoc())
          {
            echo "<tr><td>" . $row["car_number"]. "</td><td>" . $row["car_id"]. "</td><td>" . $row["car_barcode"]. "</td><td>" . $row["car_status"]. "</td><td>" . $row["user_id"]. "</td><td>". $row["car_logs"]. "</td><td>" . $row["last_updated"]. "</td></tr>";
          }
          echo "</table>";
          mysqli_free_result($res); ?>

          <br>
          <br>

      </div>


      <div class="row" style="display:none" id="table3">
        <br>
        <br>
        <h2>Users Table</h2>
        <input type="text" id="myInput3" onkeyup="myFunction3()" placeholder="Search by users names..">
        <?php $sql="SELECT * FROM users";
        $res = mysqli_query($conn , $sql);
        if(!$res)
        {
          die("Query Failed!");
        }
        echo "<br>";
        echo "<table  border=1 cellpadding=1 class='myTable2' id='myTable3'><tr><th>User Name</th><th>User ID</th><th>User Number</th><th>User Email</th><th>User Bank Account</th><th>User National ID</th><th>Account Name</th><th>Account Password</th></tr>";
        while($row=$res->fetch_assoc())
        {
          echo "<tr><td>" . $row["user_name"]. "</td><td>" . $row["user_id"]. "</td><td>" . $row["user_phone_no"]. "</td><td>" . $row["user_email"]. "</td><td>" . $row["user_bank_account"]. "</td><td>" . $row["user_national_id"]. "</td><td>". $row["account_username"]. "</td><td>**************</td></tr>";
        }
        echo "</table>";
        mysqli_free_result($res); ?>

        <br>
        <br>

    </div>

    <div class="row" style="display:none" id="table4">
      <br>
      <br>
      <h2>Alerts Table</h2>
      <input type="text" id="myInput4" onkeyup="myFunction4()" placeholder="Search by alerts locations..">
      <?php $sql="SELECT * FROM alerts";
      $res = mysqli_query($conn , $sql);
      if(!$res)
      {
        die("Query Failed!");
      }
      echo "<br>";
      echo "<table  border=1 cellpadding=1 class='myTable2' id='myTable4'><tr><th>Alert Location</th><th>Alert ID</th><th>Alert Date and Time</th><th>Alert Duration in Minutes</th></tr>";
      while($row=$res->fetch_assoc())
      {
        echo "<tr><td>" . $row["alert_location"]. "</td><td>" . $row["id"]. "</td><td>" . $row["alert_time"]. "</td><td>" . $row["alert_duration_mins"]. "</td></tr>";
      }
      echo "</table>";
      mysqli_free_result($res); ?>

      <br>
      <br>

  </div>
  <div class="row" style="display:none" id="table5">
    <br>
    <br>
    <h2>Admins Table</h2>
    <input type="text" id="myInput5" onkeyup="myFunction5()" placeholder="Search by admins names..">
    <?php $sql="SELECT * FROM admins";
    $res = mysqli_query($conn , $sql);
    if(!$res)
    {
      die("Query Failed!");
    }
    echo "<br>";
    echo "<table  border=1 cellpadding=1 class='myTable2' id='myTable5'><tr><th>Adimn User Name</th><th>Admin ID</th><th>Admin Email</th><th>Password</th></tr>";
    while($row=$res->fetch_assoc())
    {
      echo "<tr><td>" . $row["username"]. "</td><td>" . $row["id"]. "</td><td>" . $row["email"]. "</td><td>********************</td></tr>";
    }
    echo "</table>";
    mysqli_free_result($res); ?>

    <br>
    <br>

</div>
<div class="row" style="display:none" id="table6">
  <br>
  <br>
  <h2>Images Table</h2>
  <input type="text" id="myInput6" onkeyup="myFunction6()" placeholder="Search by cars barcodes..">
  <?php $sql="SELECT * FROM images";
  $res = mysqli_query($conn , $sql);
  if(!$res)
  {
    die("Query Failed!");
  }
  echo "<br>";
  echo "<table  border=1 cellpadding=1 class='myTable2' id='myTable6'><tr><th>Image Barcode</th><th>Image ID</th><th>Image path</th><th>Image Name</th><th>Image Date and Time</th></tr>";
  while($row=$res->fetch_assoc())
  {
    echo "<tr><td>" . $row["car_barcode"]. "</td><td>" . $row["id"]. "</td><td>" . $row["image_path"]. "</td><td>" . $row["image_name"]. "</td><td>" . $row["image_time"]. "</td></tr>";
  }
  echo "</table>";
  mysqli_free_result($res); ?>

  <br>
  <br>

</div>
			</section><!-- end of service section -->


</div>


			<!-- footer starts here -->
			<footer class="footer clearfix">
				<div class="container">
					<div class="row">
						<div class="col-xs-6 footer-para">
							<p>&copy; <a href="http://localhost/webbsite/homeadmin.php" style="margin-left:80px">smarttollcollection.com</a> All right reserved</p>
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

  <script src="js/tables.js"></script>
	<script src="js/jquery-2.1.1.js"></script>
	<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="js/gmaps.js"></script>
	<script src="js/smoothscroll.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/custom.js"></script>
	<script src="js/button.js"></script>
</body>
</html>
