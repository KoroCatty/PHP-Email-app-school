<?php
// dbconnection
// include('./includes/Connection.inc.php');

// header
include('./templates/header.php');
?>

<?php
// =======================================
// リダイレクト　function
// =======================================
// function Redirect_to($New_Location)
// {
//   header("Location:" . $New_Location); // go to this location
//   exit;
// }
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
    if (isset($_POST['submit'])) {

      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $email = $_POST['email'];

      echo $fname;


      if (empty($fname)) {
    header("Location: index.php"); // go to this location
  exit();
      }
    }




    ?>
    <!-- ------------ -->
    <!-- Form : START -->
    <!-- ------------ -->
    <form action="./addUser.php" method="POST" class="row align-items-center gx-3 gy-2">

      <!-- fname -->
      <div class="col-sm-3">
        <label class="visually-hidden" for="fname">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="fname">
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

      <!-- Submit -->
      <div class="col-sm-3">
        <button name="submit" type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    <!-- Form: END -->

    <div class="links">
      <a href="./index.php">Index.php</a>
      <a href="./manageUsers.php">Index.php</a>
      <a href="./addUsers.php">Index.php</a>
    </div>

  </div>


  <?php
  include('./templates/header.php');
  ?>