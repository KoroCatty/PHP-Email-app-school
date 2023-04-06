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

    <!-- 2. Setup Structure to Display Updating User -->
    <!-- NOTE: To save time, as its just an edit, we can just copy the original form in index.php & modify that! -->
    <h1 class="display-4">Email List</h1>
    <p class="lead">Update User:</p>

    <!-- 3. Setup to Pull Specific User Data into an Edit Form! -->
    <?php
    // (a) Strings must be escaped to prevent SQL injection attack
    if(!empty($_GET)){
      $id = mysqli_real_escape_string($conn, $_GET['id']); 
      $id = intval($id);
  
      // (b) Save SQL query, result & array methods to variables
      $sql = "SELECT id, fname, lname, email FROM tblEmailList WHERE id=$id";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    }
    ?>

    <h1 class="display-4">Email Newsletter</h1>
    <p class="lead">Please sign up for our Newsletter:</p>
    
    <!-- Form : START -->
    <!-- (c) Pass dynamic user data, according to ID, into the form to be able to update it, using the "value" attribute
      - NOTE: We pull the pre-pop values from the $row array NOT a superglobal array!
    -->
    <!-- IMPORTANT 1: Change the ACTION script to updateUser.php -->
    <form class="row align-items-center gx-3 gy-2" action="updateUser.php" method="POST">      
      <div class="col-sm-3">
        <label class="visually-hidden" for="fname">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" value="<?php if(!empty($_GET)){echo $row["fname"];} ?>" name="fname">
      </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="lname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" value="<?php if(!empty($_GET)){echo $row["lname"];}  ?>" name="lname">
      </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" value="<?php if(!empty($_GET)){echo $row["email"];} ?>" name="email">
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      <!-- IMPORTANT 2: Create new id field for form AND make it hidden -->
      <div class="col-3">
        <input type="hidden" class="form-control" placeholder="id" value="<?php echo $row["id"]?>" name="userid">
      </div>

    </form>
    <!-- Form: END -->

    <!-- 4. Update Script that will edit DB with changed data in inputs -->
    <?php        
      if (!empty($_POST)) {

        // (a) Strings must be escaped to prevent SQL injection attack (including other data passed in)
        $userid = mysqli_real_escape_string($conn, $_POST['userid']); 
        $userid = intval($userid);
        $fname = mysqli_real_escape_string($conn, $_POST['fname']); 
        $lname = mysqli_real_escape_string($conn, $_POST['lname']); 
        $email = mysqli_real_escape_string($conn, $_POST['email']); 

        // (b) Save SQL query to variable
        $sql = "UPDATE tblEmailList SET fname='$fname', lname='$lname', email='$email' WHERE id=$userid"; 

        // (c) Call SQL query & return result based on if successful + close connection
        if (!$conn->query($sql)) {
          echo '<div class="alert alert-danger mt-2" role="alert">Error: User was not updated <br>' . $sql . '<br>' . $conn->error . '</div>';
        } else {
          echo '<div class="alert alert-success mt-2" role="alert">The user was updated</div>';
        }
        $conn->close();
      }
    ?>
  </div>

<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>