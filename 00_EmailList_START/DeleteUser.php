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
    <h1 class="display-4">Thanks for deleting Me!!!</h1>


    <?php
      $sql = "select * from tblEmailList";

      // $execute = $conn->query($sql);
      $result = mysqli_query($conn, $sql);






?>
    </div>

  </div>


  <?php
  include('./templates/header.php');
  ?>