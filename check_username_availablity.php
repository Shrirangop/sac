<?php 
include_once('connection.php');
// Establish database connection 

// Establish database connection using MYSQLI.
  $DB_NAME = 'aam';
  $db = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

 //####### End of dbconfig.php #######

// code user Email availablity
if(!empty($_POST["email"])) {
  $email= $_POST["email"];
  if (filter_var($email, FILTER_VALIDATE_EMAIL)===false) {

    echo "error :you did not enter a valid email.";
  }
  else {
    $sql ="SELECT `email` FROM `aam` WHERE `email` = '$email' ";
    $results = mysqli_query($db, $sql);


    if($results -> num_rows)
    {
      echo "<div style='color:red; display: block;'> Email already exists .</div>";
      echo "<script>$('#submit').prop('disabled',true);</script>";
    } else{
      
      echo "<div style='color:green'> Email available for Registration .</div>";
      echo "<script>$('#submit').prop('disabled',false);</script>";
    }
  }
}
// End code check email