<?php
// DB Connection 
include('./includes/Connection.inc.php');

// DBをincludeしてるので下記が使える
// [B] RETRIEVING FORM DATA & INSERTING INTO DB (3 steps)
$fname = mysqli_real_escape_string($conn, $_POST['fname']);
$lname = mysqli_real_escape_string($conn, $_POST['lname']);
$email = mysqli_real_escape_string($conn, $_POST['email']);

// Validation (POSTメソッドなのでaction先でValidateする)
if (empty($fname) || empty($fname) || empty($email)) {
  echo 'You have to fill out ';

  // put back to index.php
  header("Location: index.php");
} else {
  // Store SQL query
  $sql = "INSERT INTO tblEmailList VALUES (NULL,'$fname','$lname','$email');";

  // put data to DB
  $result = mysqli_query($conn, $sql);

  // DBに接続状況できたかで、メッセージを出す
  if (!$result) {
    echo "<p style='color: red'>Oops! Something went wrong: <span style='color: black'>" . mysqli_error($conn) . "</span></p>";
  } else {
    echo "<p style='color: darkgreen'>Form submitted</p>";
  }
}

?>


<?php
// header
include('./templates/header.php');
?>

<body>
  <?php
  // navbar
  include('./templates/navbar.php');
  ?>














  <?php
  include('./templates/header.php');
  ?>