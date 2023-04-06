<!-- Head: START -->
<?php include 'templates/header.php' ?>
<!-- Head: END -->

<body>
  <!-- Nav: START -->
  <?php include './templates/navbar.php' ?>
  <!-- Navbar: END -->

  <!-- 3b. AT THIS POINT - We are connected to the DB & can write some feedback to the User! -->
  <div class="container-fluid">

    <!-- PHP Connection: START -->
    <?php include 'includes/connection.inc.php' ?>
    <!-- PHP Connection: END -->

    <h1 class="display-4">Add New User</h1>
    <p class="lead">User Status:</p>

  <?php   
    // 4. SQL Validation: Strings must be escaped to prevent SQL injection attack
    $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
    $lname = mysqli_real_escape_string($conn, $_POST['lname']); 
    $email = mysqli_real_escape_string($conn, $_POST['email']); 

    // 5. Save SQL Command to Variable
    $sql = "INSERT INTO tblEmailList VALUES (NULL, '$fname', '$lname', '$email');"; 
    
    // 6. Issue our query to DB: to save/insert the data in using the saved sql variable with the database connection configs
    // NOTE: In this case, we're shortening the previous example into just one BIG if statement, rather than storing the result
    // ALSO NOTE: Because we're using OOP, we just reference the object & the method (object->method) we want RATHER THAN issuing a connection call everytime!
    if($conn->query($sql) === FALSE) {
      // Echo out fail feedback + our sql command + the error stack to analyse where we went wrong!
      echo('<div class="alert alert-danger mt-2" role="alert">Error: User was not submitted <br>' . $sql . '<br>' . $conn->error . '</div>');
    } else {
      echo('<div class="alert alert-success mt-2" role="alert">New user was added!</div>');
    }

    // 7. Call the Close Method - which closes the connection to database
    $conn->close();

  ?>

  </div>

<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>