<?php         
  // 1. Save our Database Config to Variables to use for our Connection function
  $servername = "localhost";
  $username = "root";
  $password = "root"; // If Windows, it will be an empty string ""
  $dbname = "myFormDB";

  // 2. Create connection variable with database passing in the database configs
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // 3. Check connection with DB & issue commands to database if successful
  // NOTE: Error always comes first!
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  } else {
    
    // 4. SQL Validation: Strings must be escaped to prevent SQL injection attack
    // NOTE: We pull the variables out of the $_GET Superglobal array, with the variable names defined in the form!
    $name = mysqli_real_escape_string($conn, $_GET['name']); 
    $email = mysqli_real_escape_string($conn, $_GET['email']); 
    $regards = mysqli_real_escape_string($conn, $_GET['regards']); 
    $subject = mysqli_real_escape_string($conn, $_GET['subject']); 

    // 5. Save SQL Command to Variable: SQL command to insert our form values, saved to these superglobal variables, to myFormDB database, inside the "myuserdata" table
    // NOTE: We echo out our sql command so we can see our variables have been entered correct!
    $sql = "INSERT INTO myuserdata VALUES (NULL, '$name', '$email', '$regards', '$subject');"; 
    echo("<p>" . $sql . "</p>");
    
    // 6. Issue our query to DB: to save/insert the data in using the saved sql variable with the database connection configs
    // NOTE: We echo back the result, which will either be 0/false (query failed) or 1/true (query executed correctly!) = AKA a Boolean
    $result = mysqli_query($conn, $sql);

    if($result !== true){
      echo("<p>Oops! Something went wrong with saving to the database!</p>");
    } else {
      echo("<p>Form submitted!</p>");
    }
    
  }
?>
