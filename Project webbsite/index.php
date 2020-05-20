<?php
  session_start();

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  }
?>

<?php
// initializing variables
$username = "";
$email    = "";
$errors = array();
$type = "";

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project_db');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  $user_check_query = "SELECT * FROM users WHERE user_email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user) { // if user exists
    if ($user['user_email'] === $email) {
      // first check the database to make sure
      // a user does not already exist with the same username and/or email
      $user_check_query = "SELECT * FROM users WHERE account_username='$username' LIMIT 1";
      $result = mysqli_query($db, $user_check_query);
      $user = mysqli_fetch_assoc($result);

      if ($user) { // if user exists
        if ($user['account_username'] === $username) {
          array_push($errors, "Username already exists");
        }
      }

      // Finally, register user if there are no errors in the form
      if (count($errors) == 0) {
      	$password = md5($password_1);//encrypt the password before saving in the database

      	$query = "Update users set account_username='$username' where user_email='$email'";
      	mysqli_query($db, $query);
        $query = "Update users set account_password='$password' where user_email='$email'";
        mysqli_query($db, $query);
      	$_SESSION['username'] = $username;
      	$_SESSION['success'] = "You are now logged in";
          	header('location: home.php');
      }
    }
    else {
      array_push($errors, "This email is not registered");
    }
  }
  else{
    array_push($errors, "This email is not registered");

  }



}

// ...
// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if(isset($_POST['type'])) {
      if($_POST['type'] == 'user') {
        if (count($errors) == 0) {
          $password = md5($password);
          $query = "SELECT * FROM users WHERE account_username='$username' AND account_password='$password'";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: home.php');
          }else {
            array_push($errors, "Wrong username/password combination");
          }
        }
      } elseif($_POST['type'] == 'admin') {
        if (count($errors) == 0) {
          $password = md5($password);
          $query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "You are now logged in";
            header('location: homeadmin.php');
          }else {
            array_push($errors, "Wrong username/password combination");
          }
        }
      }
  }
  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM admins WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
      header('location: homeadmin.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
  }
}

?>


<!DOCTYPE html>
<html>
<head>
  <title>Smart Toll Collection</title>
  <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:600italic,400,800,700,300' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=BenchNine:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>

<body>

  <div class="content">
    	<!-- notification message -->
    	<?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
        	<h3>
            <?php
            	echo $_SESSION['success'];
            	unset($_SESSION['success']);
            ?>
        	</h3>
        </div>
    	<?php endif ?>


  </div>


  <div class="form">

      <ul class="tab-group">
        <li class="tab active"><a href="#signup">Sign Up</a></li>
        <li class="tab"><a href="#login">Log In</a></li>
      </ul>

      <div class="tab-content">
        <div id="signup">
          <form action="" method="post">
            <?php  if (count($errors) > 0) : ?>
              <div class="error">
              	<?php foreach ($errors as $error) : ?>
              	  <p><?php echo $error ?></p>
              	<?php endforeach ?>
              </div>
            <?php  endif ?>

          <div class="top-row">
            <div class="field-wrap">
              <label>
                User Name<span class="req">*</span>
              </label>
            </div>
            <input type="text" name="username" value="<?php echo $username; ?>" required autocomplete="off" />
            <div class="field-wrap">

            </div>
          </div>

          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
          </div>
          <input type="email" name="email" value="<?php echo $email; ?>" required autocomplete="off"/>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
          </div>
          <input type="password" name="password_1" required autocomplete="off"/>

          <div class="field-wrap">
            <label>
              Confirm Password<span class="req">*</span>
            </label>
          </div>
          <input type="password" name="password_2" required autocomplete="off"/>
          <div>
          <br></div>
          <button type="submit" class="button button-block" name="reg_user">Get Started</button>

          </form>

        </div>

        <div id="login">
          <h1 style="color:black">Welcome Back!</h1>

          <form action="" method="post">
            <?php  if (count($errors) > 0) : ?>
              <div class="error">
              	<?php foreach ($errors as $error) : ?>
              	  <p><?php echo $error ?></p>
              	<?php endforeach ?>
              </div>
            <?php  endif ?>
            <div class="top-row">
              <div class="field-wrap">
               <label>
                 User Name<span class="req">*</span>
               </label>
              </div>

              <input type="text" name="username" required autocomplete="off"/>
              <div class="field-wrap">

              </div>
            </div>

          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
          </div>
          <input type="password" name="password" required autocomplete="off"/>
          <div> <br></div>

          <input class="w3-radio" type="radio" name="type" value="user" checked style="display: inline-block">
          <span class="radio" style="font-size:20px" style="display: inline-block">User</span>

          <input class="w3-radio" type="radio" name="type" value="admin"  style="display: inline-block">
          <span class="radio" style="font-size:20px" style="display: inline-block">Admin</span>
          <div><br></div>

          <button class="button button-block" name="login_user">Log In</button>

          </form>

        </div>

      </div><!-- tab-content -->

</div> <!-- /form -->
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script  src="index.js"></script>

</body>
</html>
