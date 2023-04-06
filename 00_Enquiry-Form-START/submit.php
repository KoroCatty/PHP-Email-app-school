<?php

// 1. connect DB
// require('./connectDB.php');

// Define
  $servername = 'localhost';
  $dbname = 'myFormDB';
  $username = 'root';
  $password = 'root';
  
// b. create connection variable $ connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

// c. Connect & check connection
if(!$conn) {
  die("Connectioin failed:: " . mysqli_connect_error() );
}

echo "DB sucess. Proceed to savign data....";
echo "<br>";


// ===================================================
// 2. DB Operations: Sanitizing & Saving the Data
// Save the form data + validate/sanitize
// ===================================================
$name = mysqli_real_escape_string($conn, $_GET['name']);
$email = mysqli_real_escape_string($conn, $_GET['email']);
$regards = mysqli_real_escape_string($conn, $_GET['regards']);
$subject = mysqli_real_escape_string($conn, $_GET['subject']); 

echo $name;
echo "<br>";

echo $email;
echo "<br>";

echo $regards;
echo "<br>";

echo $subject;
echo "<br>";


// b. save the SQL Command to dave data to DB

// DB カラム名、valuesが入れたい文字列。
$sql = "INSERT INTO myuserdata (id, name, email, regards, subject) 
VALUES ( NULL, '$name', '$email', '$regards', '$subject' );";

// c. Insuring the Query 
$result = mysqli_query($conn, $sql); // 接続できたかどうかを true or falseで返す関数 
echo $result;

if (!$result ) {
  echo "eroorrrrr";
} else {
  echo "<p>From Submitted</p>";
}




