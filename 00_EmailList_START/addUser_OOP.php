<?php

  $servername = 'localhost';

  $dbname = 'emailListDB';

  $username = 'root';

  $password = 'root';
  
// b. create connection variable $ connect
$conn = new mysqli_connect($servername, $username, $password, $dbname);

// c. Connect & check connection
if(!$conn->connect_error) {
  die("Connectioin failed:: " . $conn->connect_error );
}

  // [B] RETRIEVING FORM DATA & INSERTING INTO DB (3 steps)
  $fname = $conn->mysqli_real_escape_string( $_POST['fname']);
  $lname = mysqli_real_escape_string($conn, $_POST['lname']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  // Store SQL query
  $sql = "INSERT INTO tblEmailList VALUES (NULL,'$fname','$lname','$email');";

  // Issue our SQL query
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo "<p style='color: red'>Oops! Something went wrong: <span style='color: black'>" . mysqli_error($conn) . "</span></p>"; 
  } else {
    echo "<p style='color: darkgreen'>Form submitted</p>";
  }
echo "DB connection success!!";
echo "<br>";


// connectDB();
?>




<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add user page</title>


  <!-- Bootstrap 5.0 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <!-- FontAwesome Kit -->
  <script src="https://kit.fontawesome.com/3956b000b9.js" crossorigin="anonymous"></script>
</head>
<body>
  
<?php



?>




  <!-- Bootstrap 5.0 JavaScript Plugin -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>






