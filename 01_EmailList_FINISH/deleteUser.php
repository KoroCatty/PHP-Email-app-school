<!-- 1. INCLUDE all the template sections from header, navbar, connection & footer -->
<!-- Head: START -->
<?php include 'templates/header.php' ?>
<!-- Head: END -->

<body>
  <!-- Nav: START -->
  <?php include 'templates/navbar.php' ?>
  <!-- Navbar: END -->

  <div class="container-fluid">
    
    <!-- PHP Connection: START -->
    <?php include 'includes/connection.inc.php' ?>
    <!-- PHP Connection: END -->

    <!-- 2. Setup Basic Structure to Notify Page Change -->
    <h1 class="display-4">Email List</h1>
    <p class="lead">Delete User:</p>

    <!-- 3. Script to Delete User from DB -->
    <!-- As this page just executes, it does not need to display anything beforehand -->
    <?php         
      // (a) Strings must be escaped to prevent SQL injection attack
      $id = mysqli_real_escape_string($conn, $_GET['id']); 
      $id = intval($id);

      // (b) Save SQL query to Variable
      $sql = "DELETE FROM tblEmailList WHERE id=$id"; 
      
      // (c) Call SQL query & return result based on if successful + close connection
      if (!$conn->query($sql) === TRUE) {
        echo '<div class="alert alert-danger mt-2" role="alert">Error: User was not submitted <br>' . $sql . '<br>' . $conn->error . '</div>';
      } else {
        echo '<div class="alert alert-success mt-2" role="alert">The user was deleted</div>';
      }
      $conn->close();

    ?>

  </div>

<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>