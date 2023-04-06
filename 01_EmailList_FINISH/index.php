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

    <h1 class="display-4">Email Newsletter</h1>
    <p class="lead">Please sign up for our Newsletter:</p>
    
    <!-- Form : START -->
    <form class="row align-items-center gx-3 gy-2" action="addUser.php" method="POST">
      <div class="col-sm-3">
        <label class="visually-hidden" for="fname">First Name</label>
        <input type="text" class="form-control" placeholder="First Name" name="fname">
      </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="lname">Last Name</label>
        <input type="text" class="form-control" placeholder="Last Name" name="lname">
      </div>
      <div class="col-sm-3">
        <label class="visually-hidden" for="email">Email</label>
        <input type="text" class="form-control" placeholder="Email" name="email">
      </div>
      <div class="col-sm-3">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </form>
    <!-- Form: END -->
    
  </div>
  
<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>