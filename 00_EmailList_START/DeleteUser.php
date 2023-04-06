<?php
session_start();

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
    // まずは全て取得
    $sql = "select * from tblEmailList";
    $result = mysqli_query($conn, $sql);

    // ループで表示。( fetch()は使えないので注意 ) fetches DB data and inserts the rows into an "associative array idのみループする
    while ($DbRows = $result->fetch_assoc()) :
      $userId = $DbRows['id'];
    endwhile;
    ?>

    <?php
    // URL tab から取得
    $id = $_GET['id']; // ex) 11

    // DELETE a row
    if (isset($userId)) {
      $sql = "DELETE FROM tblEmailList WHERE id= $id";

      $execute = mysqli_query($conn, $sql);

      // メッセージを表示
      if ($execute) {
        echo
        "<p class='display-1 text-danger text-center'>Successfully Deleted a User!!
        </p>";
      } else {
        echo "failed to delete";
      }
    }

    ?>
  </div>

  </div>


  <?php
  include('./templates/header.php');
  ?>