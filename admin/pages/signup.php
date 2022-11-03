<?php
  //basic element functions
    include_once('../database/DBcontroller.php');
  include_once('../php/element.php');

  //php functions
  include_once('../php/functions.php');

  $con = DBconnection();
    // create database 
    $sql = "CREATE TABLE IF NOT EXISTS user(
        id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY UNIQUE,
        name VARCHAR(100) NOT NULL UNIQUE,
        username VARCHAR(100) NOT NULL UNIQUE,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(256) NOT NULL,
        status INT(3) DEFAULT 1
        );
    ";

  mysqli_query($GLOBALS['con'], $sql);

  if(isset($_POST['submit'])){
    createData();
  }

  function createData(){
    $name = textBoxValue($GLOBALS['con'], 'name');
    $username = textBoxValue($GLOBALS['con'], 'username');
    $email = textBoxValue($GLOBALS['con'], 'email');
    $password = textBoxValue($GLOBALS['con'], 'password');
    $repassword = textBoxValue($GLOBALS['con'], 'repassword');
    if ($password != $repassword) {
      notification("bg-danger p-3 mb-0 text-center", "Password and Confirm Password does not same.");
    }
    elseif ($name && $username && $email && $password) {
      $sql = "INSERT INTO user(name, username, email, password, status)
      VALUES('$name', '$username', '$email', '$password', 1)";
      if (mysqli_query($GLOBALS['con'], $sql)) {
        notification("bg-success p-3 mb-0 text-center", "Data Inserted Successfully.");
        header('location:home.php');
      } else {
        notification("bg-danger p-3 mb-0 text-center", "Data Inserted Failled.");
      }
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Signup</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
  <style>
    .gradient-custom-3 {
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
      }
      .gradient-custom-4 {
      /* fallback for old browsers */
      background: #84fab0;

      /* Chrome 10-25, Safari 5.1-6 */
      background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

      /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
      background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
    }
  </style>
    
</head>
<body>
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100 my-5">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>
              <form action="" method="post">

                <div class="form-outline my-2">
                  <?php inputElementText("Full Name", "text", "name", "name", "Enter Full Name", "", "required"); ?>
                </div>

                <div class="form-outline my-2">
                  <?php inputElementText("Username", "text", "username", "username", "Enter Username", "", "required"); ?>
                </div>

                <div class="form-outline my-2">
                  <?php inputElementText("Email", "email", "email", "email", "Enter Email", "", "required"); ?>
                </div>

                <div class="form-outline my-2">
                  <?php inputElementText("New Password", "password", "password", "password", "Enter New Password", "", "required"); ?>
                </div>

                <div class="form-outline my-2">
                  <?php inputElementText("Conferm Password", "password", "repassword", "repassword", "Enter Conferm Password", "", "required"); ?>
                </div>

                <div class="form-check d-flex justify-content-between mb-5">
                  <input class="form-check-input me-2" name="check" type="checkbox" value="" id="form2Example3cg" required/>
                  <label class="form-check-label" for="form2Example3g">
                    I agree all statements in <a href="pages/terms" class="text-body"><u>Terms of service</u></a>
                  </label>
                </div>

                <div class="d-flex justify-content-center">
                  <?php btnElement("signup", "btn btn-success btn-block btn-lg gradient-custom-4 text-body", "submit", "Submit", ""); ?>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="#!"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
</body>
</html>