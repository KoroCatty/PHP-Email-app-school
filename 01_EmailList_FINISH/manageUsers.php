<!-- 1. INCLUDE all the template sections from header, navbar & connection -->
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

    <!-- 2. Save SQL & Result of DB Query to Variables  -->
    <?php 
    $sql = "SELECT id, fname, lname, email FROM tblEmailList";
    $result = $conn->query($sql);
    ?>

    <!-- 3. Setup Structure to Display Users -->
    <h1 class="display-4">Email List</h1>
    <p class="lead">List of all users:</p>

    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Email</th>
          <th scope="col">Delete</th>
          <th scope="col">Edit</th>
        </tr>
      </thead>

      <!-- 4. Call the SQL Query, Store Results in Array & Map to Custom Structure as Rows -->
      <tbody>
        <?php
        if($result->num_rows > 0) {
          // Outputs data to each row using another sql method (technically, fetches row as an "associative array")

          while($row = $result->fetch_assoc()) {
            // NOW: In an array, we can map the array data out to custom structure below - as new rows!
            // IMPORTANT: The th with the id will allow for a new row of data, for each unique user! WHILE LOOPS the data for as many users there are!
            echo
            '
            <tr>
              <th scope="row">id:'.$row["id"].'</th>
              <td>'.$row["fname"].'</td>
              <td>'.$row["lname"].'</td>
              <td>'.$row["email"].'</td>
              <td><a href="deleteUser.php?id='.$row["id"].'" class="btn btn-danger">Delete</a></td>
              <td><a href="updateUser.php?id='.$row["id"].'" class="btn btn-primary">Update</a></td>
            </tr>';
          }
        } else {
          echo "0 Results";
        }

        // 5. Close Connection to Database
        $conn->close();

        ?>

      </tbody>
    </table>
      
  </div>

<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>