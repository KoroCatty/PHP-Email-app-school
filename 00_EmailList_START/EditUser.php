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
    <h1 class="display-4">Edit Users</h1>


    <?php
    // Form Validation
    if (isset($_POST['update'])) {

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

      // URL tab から取得
      $id = $_GET['id'];

      echo $id; // ex) 26


      // 一つでも空なら、UPDATEさせないValidation 
      if ( empty($fname)  || empty($lname) || empty($email)) {
        // header("Location: EditUser.php"); 
        echo "<h2 class='text-center text-success'>fill out form properly!!</h2>";

        // フォーム達が空じゃない時、下記が実行
      } else {

      // UPDATE a row ($idを使い特定している)
      $sql = "UPDATE tblEmailList SET fname = '$fname', lname = '$lname', email = '$email' WHERE id = $id ";

      $execute = mysqli_query($conn, $sql);

      // メッセージを表示
      if ($execute) {
        echo
        "<p class='display-1 text-danger text-center'>Successfully UPDATED!!
        </p>";
      } else {
        echo "failed to UPDATE";
      }
    }
  }
    ?>


<!-- ------------------------- -->
<!-- DBにあるデータをページ読み込み時に表示するためのquery  -->
<!-- ------------------------- -->
    <?php
    // URL tab から取得
     $id = $_GET['id']; // ex) 34

    // DBからデータを取得。
    $sql = "select * from tblEmailList where id = $id";
    $execute = mysqli_query($conn, $sql);
    while ($DbRows = $execute->fetch_assoc()) :
      $aaa = $DbRows['fname'];
      $bbb = $DbRows['lname'];
      $ccc = $DbRows['email'];
    endwhile;
    ?>


    <!-- ------------ -->
    <!-- DBに入ってる情報をHTMLに出力している -->
    <!-- ------------ -->
    <form action="" method="POST" class="row align-items-center gx-3 gy-2">

      <!-- fname -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="fname">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php echo $aaa; ?>">
      </div>

      <!-- lname -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="lname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php echo $bbb; ?>">
      </div>

      <!-- Email -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $ccc; ?>">
      </div>

      <!-- Submit -->
      <div class="col-sm-3">
        <button name="update" type="submit" class="btn btn-primary">UPDATE</button>
      </div>
    </form>
    <!-- Form: END -->

  </div>


  <?php
  include('./templates/header.php');
  ?>