<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css" />
  </head>
  <body>



    <div class="main">
      <?php

        if(isset($_GET['noAccount'])){
          echo "<div class='alert alert-danger'><strong>Error!</strong> No account found.</div>" ;
        }

        if(isset($_GET['wrongPassword'])){
          echo "<div class='alert alert-danger'><strong>Error!</strong> Password is incorrect.</div>" ;
        }

      ?>
        <h1>Login to your account</h1>
      <form action="assets/php/__loginValidation.php" method="post">
       
        <div class="form-group">
          <label for="" class="form-label">Email</label>
          <input type="text" class="form-control" name="loginEmail" />
        </div>
        <div class="form-group">
          <label for="" class="form-label">Password</label>
          <input type="text" class="form-control" name="loginPassword" />
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" name="loginBtn">Login</button>
        </div>
        <div class="form-group">
            Don't have an account ? <a href="createAccount.php">Create a new account</a>
        </div>
      </form>
    </div>

    <script src="assets/js/hide.js"></script>
  </body>
</html>
