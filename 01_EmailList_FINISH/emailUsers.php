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

    <!-- 2. Open & Load Emails into Variable -->
    <?php
      // Store SQL & result from DB in variable
      $sql = "SELECT email FROM tblEmailList";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // NOTE: WHILE LOOP & Output data of each row like with manageUsers.php, but appends it into a list separated by commas
        while($row = $result->fetch_assoc()) {
          $emails = $emails . $row["email"] . ', ';   
        }
        // EXAMPLE - "Users: Fitzy@gmail.com, Bicky@gmail.com, johnnyd@gmail.com, joey@gmail.com"
        echo("<strong>Users: </strong>" . $emails);
      } else {
        echo "0 Users to Email";
      }
      $conn->close();
    ?>

    <!-- 3. Basic Structure of Email Form -->
    <h1 class="display-4">Email Users</h1>
    <p class="lead">Send a Email to All Users:</p>

    <form action="POST">
      <div class="mb-3">
        <input type="text" class="form-control" placeholder="Subject" name="subject">
      </div>
      <div class="mb-3">
        <textarea class="form-control" rows="3" name="body" placeholder="Body"></textarea>
      </div>
      <div>
        <button type="submit" class="btn btn-primary">Send</button>
      </div>
    </form>

    <!-- 4. Structure the Email by Passing in Emails Variable + Form Data + Web Host Header Information -->
    <?php
      if (!empty($_POST)) {
        $to = $emails;
        $subject = mysqli_real_escape_string($conn, $_POST['subject']); 
        $message = mysqli_real_escape_string($conn, $_POST['body']); 
        $headers = array(
          // CHECK & UPDATE: These change to the web host specific details
          'From' => 'webmaster@example.com',
          'Reply-To' => 'webmaster@example.com',
          'X-Mailer' => 'PHP/' . phpversion()
        );
        // SEND: Email with Mail function
        mail($to, $subject, $message, $headers);
      }
    ?>
    
  </div>

<!-- Footer INCLUDE -->
<?php include 'templates/footer.php' ?>