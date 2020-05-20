<?php
$user = 'root';
$pass = '';
$db = 'project_db';
$conn = mysqli_connect('localhost', $user , $pass , $db);
if(mysqli_connect_errno())
{
  die("Connection failed" .mysqli_connect_error());
}


$location = null;
if (isset($_POST['message'])) {
    $location = $_POST['message'];
    if($location=="2")
    {
      $sql="select alert_time from alerts where alert_location='kilo 200'";
      $res = mysqli_query($conn , $sql);
      if(!$res)
      {
        die("Query Failed!");
      }
      while($row=$res->fetch_assoc())
      {
        $last_time =  $row["alert_time"];
      }
      mysqli_free_result($res);

      // getting current time
      $now = new DateTime();
      // substracting 10 minutes
      $now->modify('-1 minute');
      $time = $now->format('Y-m-d H:i:s');

      if($time > $last_time)
      {
        $sql="insert into alerts (alert_location) values ('kilo 200')";
        $res = mysqli_query($conn , $sql);
      }

    }

}


mysqli_close($conn);

?>
