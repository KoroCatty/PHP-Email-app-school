<?php
// dbconnection
// include('./includes/Connection.inc.php');

// header
include('./templates/header.php');
?>

<body>
  <?php
  include('./templates/navbar.php');
  ?>

  <div class="container-fluid">
    <h1 class="display-4">Email Newsletter</h1>
    <p class="lead">Please sign up for our Newsletter:</p>

    <?php
    // Form Validation
    if (isset($_POST['send'])) {
      $error = []; // 初期化

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];
      $message = $_POST['message'];

      // mb_language("Japanese");
      // mb_internal_encoding("UTF-8");


      // Form Validation
        // エラー設定
        if ($_POST['fname'] === '') {
        $error['fname'] = 'blank';
        }



        echo "Fill out the form properly!!!";

        // 成功時
 
      
    }




    ?>
    <!-- ------------ -->
    <!-- Form : START -->
    <!-- ------------ -->
    <form action="" method="POST" class="row align-items-center gx-3 gy-2">

      <!-- fname -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="fname">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="fname">
        <?php 
        // 空の時にエラー表示
        if ($error['fname'] === 'blank') : ?>
          <p class="">Fill in the Name!!</p>
        <?php endif; ?>
      </div>

      <!-- lname -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="lname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" name="lname">
      </div>

      <!-- Email -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email">
      </div>

      <!-- text -->
      <textarea name="message" id="" cols="30" rows="10"></textarea>

      <!-- Submit -->
      <div class="col-sm-3">
        <button name="send" type="submit" class="btn btn-primary">Send</button>
      </div>
    </form>
    <!-- Form: END -->


  </div>


  <?php
  include('./templates/header.php');
  ?>