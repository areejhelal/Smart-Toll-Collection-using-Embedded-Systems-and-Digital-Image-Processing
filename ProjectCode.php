<?php
// connecting to the databse
$user = 'root';
$pass = '';
$db = 'project_db';
$conn = mysqli_connect('localhost', $user , $pass , $db);
if(mysqli_connect_errno())
{
  die("Connection failed" .mysqli_connect_error());
}



  // recieving image from RPI and saving it in images folder
  $info = pathinfo($_FILES['image']['name']);
  $ext = $info['extension'];
  $newname = round(microtime(true));
  $target = 'images/'. $newname . '.' . $ext;
  move_uploaded_file($_FILES['image']['tmp_name'], $target);

  // scanning barcodes from images recieved
  exec('C:\\"Program Files (x86)"\\ZBar\\bin\\zbarimg -q C:\\xampp\\htdocs\\images\\'.$newname.'.' . $ext, $result);
  $value = $result[0];
  $results = explode(":", $value);
  $barcode = $results[1];

  // if the barcode is scanned
  if (strlen($barcode) > 0) {

    // saving the barcode as text in barcodes folder
    $f = fopen('C:\\xampp\\htdocs\\barcodes\\' . $newname . '.txt', 'w');
    fwrite($f, $barcode);
    fclose($f);

    // getting the last time for updated barcode
    $sql="select last_updated from cars where car_barcode like '%{$barcode}%'";
    $res = mysqli_query($conn , $sql);
    if(!$res)
    {
      die("Query Failed!");
    }
    while($row=$res->fetch_assoc())
    {
      $last_time =  $row["last_updated"];
    }
    mysqli_free_result($res);

    // getting current time
    $now = new DateTime();
    // substracting 10 minutes
    $now->modify('-10 minute');
    $time = $now->format('Y-m-d H:i:s');

    if($time > $last_time)
    {
          // querying the database using the barcode
          $sql="select user_id from cars where car_barcode like '%{$barcode}%'";
          $res = mysqli_query($conn , $sql);
          if(!$res)
          {
            die("Query Failed!");
          }
          while($row=$res->fetch_assoc())
          {
            $id = $row["user_id"];
          }
          mysqli_free_result($res);

          // adding image information in database
          $sql="insert into images ( image_path , image_name , car_barcode) values ('xampp/htdocs/images' , '.$newname.'.jpeg' , '$barcode' )";
          $res = mysqli_query($conn , $sql);
          mysqli_free_result($res);

          // adding to car logs
          $sql="Update cars SET car_logs=car_logs+1 WHERE car_barcode like '%{$barcode}%'";
          $res = mysqli_query($conn , $sql);
          if(!$res) {
           die("Query Failed!");
          }

          // getting the user bank account
          $sql="select user_bank_account from users where user_id like '%{$id}%'";
          $res = mysqli_query($conn , $sql);
          if(!$res) {
           die("Query Failed!");
          }
          while($row=$res->fetch_assoc())
          {
           $bank_account = $row["user_bank_account"];
          }
          mysqli_free_result($res);
    }


  }

// closing the connection
mysqli_close($conn);

?>

<html>
    <head>
      <title> Querying the database </title>
    </head>
    <body>
    </body>
</html>
