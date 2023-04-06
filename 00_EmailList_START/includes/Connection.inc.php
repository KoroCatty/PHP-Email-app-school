<?php

// function connectDB() {
  $servername = 'localhost';

  $dbname = 'emailListDB';

  $username = 'root';

  $password = 'root';
  
// b. create connection variable $ connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// c. Connect & check connection
if(!$conn) {
  die("Connectioin failed:: " . mysqli_connect_error() );
} else {
  echo "DB connect 成功";
}
