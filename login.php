<?php
require 'php/config.php';
if (isset($_SESSION["id"])) {
}
if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $password = md5($_POST['password']);
  $level = $_POST['level'];

  $login = new Login();
  $result = $login->loginan($username, $password, $level);

  if ($result == 1) {
    session_start();
    // $_SESSION["login"]=true;
    $_SESSION['id'] = $login->idUser();
    $_SESSION['level'] = $level;
    if ($level == "user") {
      header("location: index.php");
      exit();
    } else if ($level == "admin") {
      header("location: index.php");
      exit();
    }
  } elseif ($result == 10) {
    echo "<script>alert('Wrong Password'); </script>";
  } elseif ($result == 100) {
    echo "<script> alert('User not register'); </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>aplikasi perpustakaan</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css" />
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet" />
</head>
<style>
  .image {
    background: url(img/buku.jpg);
    background-position: center;
    background-size: cover;
  }
</style>

<body class="bg-gradient-primary">
  <div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center">
      <div class="col-xl-10 col-lg-12 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                  </div>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" name="username" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="username" />
                    </div>
                    <div class="form-group">
                      <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" />
                    </div>
                    <div class="form-group">
                      <select name="level" type="level" id="" class="form-control">
                        <option value=""> select level</option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                      </select>
                    </div>

                    <button class="btn btn-primary btn-user btn-block submit" type="submit" name="submit"> Login </button>
                    <hr />

                  </form>
                  <hr />
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.php">Create an Account!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
</body>

</html>