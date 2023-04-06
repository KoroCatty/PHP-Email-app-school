<!-- 3. NEW connection.php: Copy the first script tag in addUser.php, which was 1. to 3. and copy to new connection file -->
<?php         
  // 1. Save our Database Config to Variables to use for our Connection function
  $servername = "localhost";
  $username = "root";
  $password = "root"; // If Windows, it will be an empty string ""
  $dbname = "emailListDb";

  // 2. Create connection variable with database passing in the database configs
  // NOTE: We have changed from procedural style to object oriented style
  $conn = new mysqli($servername, $username, $password, $dbname);

  // 3. Check connection with DB & issue commands to database if successful
  // NOTE: Slight change to conditional - where it checks for a connection error, in line with our change to OOP!  In this case the conditional statement reads: "if the connect_error method, of the connection object, is equal to true, present the "die" value"
  // SYNTAX: Standard PHP OOP reads as object->method
  if ($conn->connect_error) {
    die('<div class="alert alert-warning mt-3" role="alert"><h4>Connection Failed<h4>' . $conn->connect_error . '</div>');
  } else {
    echo('<div class="alert alert-success mt-3" role="alert">Connection Successful</div>');
  }

?>