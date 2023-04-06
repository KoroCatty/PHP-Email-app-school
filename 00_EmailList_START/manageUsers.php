<?php
// dbconnection
include('./includes/Connection.inc.php');

// header
include('./templates/header.php');
?>


<body>
  <?php
  include('./templates/navbar.php');
  ?>

  <div class="container-fluid">
    <h1 class="display-4">Email Newsletter</h1>
    <p class="lead">Manage Users page:</p>



    <!-- テーブルをセットアップし、<tbody>の中身はループで出力する（よく使われる!!!!） -->
    <table class="table table-striped table-hover container">
      <thead class="thead-dark">
        <tr>
          <th>No. </th>
          <th>UserID</th>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email Address</th>
          <th>EDIT</th>
          <th>DELETE</th>
        </tr>
      </thead>

      <?php
      $sql = "select * from tblEmailList";

      // $execute = $conn->query($sql);
      $result = mysqli_query($conn, $sql);

      $serialNo = 0;

      // ループで表示。( fetch()は使えないので注意 ) fetches DB data and inserts the rows into an "associative array
      while ($DbRows = $result->fetch_assoc()) :
        $userId = $DbRows['id'];
        $fname = $DbRows['fname'];
        $lname = $DbRows['lname'];
        $email = $DbRows['email'];
        $serialNo++
      ?>

        <!-- Display DB data to HTML -->
        <tbody>
          <tr>
            <td><?php echo htmlentities($serialNo); ?></td>
            <td><?php echo htmlentities($userId); ?></td>
            <td><?php echo htmlentities($fname); ?></td>
            <td><?php echo htmlentities($lname); ?></td>
            <td><?php echo htmlentities($email); ?></td>
            <td>
              <a href="./EditUser.php">EDIT</a>
            </td>
            <td>
              <a href="./DeleteUser.php">DELETE</a>
            </td>
          </tr>
        </tbody>
      <?php endwhile; ?>
    </table>



    <?php
    // ==============================================
    // Display the users
    // ==============================================



    ?>


    <?php
    include('./templates/header.php');
    ?>