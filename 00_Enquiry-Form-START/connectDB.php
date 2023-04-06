<?php
// function db_connect() {
  $servername = 'localhost';

  $dbname = 'myFormDB';

  $username = 'root';

  $password = 'root';
  
// };
// db_connect();

// b. create connection variable $ connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// c. Connect & check connection
if(!$conn) {
  die("Connectioin failed:: " . mysqli_connect_error() );
}

echo "DB sucess. Proceed to savign data....";
echo "<br>";

// [2] DB
