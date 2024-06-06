<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create Account</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>



    <div class="main">

      <?php
      
        if(isset($_GET['success'])) {
          echo "<div class='alert'><strong>Successful!</strong> Your account has been created.</div>" ;
        }

      ?>

        <h1>Create a new account</h1>
      <form action="assets/php/__insert.php" method="post">

      <div class="form-group">
          <label for="" class="form-label">Name</label>
          <input type="text" class="form-control" name="username" />
        </div>
       
        <div class="form-group">
          <label for="" class="form-label">Email</label>
          <input type="text" class="form-control" name="email" />
        </div>
        <div class="form-group">
          <label for="" class="form-label">Password</label>
          <input type="text" class="form-control" name="password" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="createBtn">Create account</button>
        </div>
        <div class="form-group">
           Already have an account ? <a href="login.php">Login</a>
        </div>
      </form>
    </div>


    <script src="assets/js/hide.js"></script>

  </body>
</html>
