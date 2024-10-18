<?php
require_once 'php/config.php';

// Make sure the user is logged in and the session variable is set
if (!isset($_SESSION["id"])) {
  header("Location: login.php");
  exit();
}

$user = new Connection();
$id = $_SESSION["id"];

$query = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($user->conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

// Set the values of the level, phone, and address field
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>aplikasi perpustakaan</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
    img{
        width: 200px;
        height: 200px;
    }
    .right{
        margin-top: auto 10px;
    }
    .btn{
        top: 30px;
        left: 30px;
    } 
    .edt-btn{
        top: 100px;
    }
    
    

</style>

<body >

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <a href="index.php" class="btn btn-secondary position-absolute  m-3">
                <i class="fas fa-arrow-left"></i>
        </a>
        <a href="edit-p.php" class=" edt-btn btn btn-secondary position-absolute m-3">
                                        <i class="fas fa-fill-gear"></i> edit profile
                                    </a>
            <div class=" col-lg-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                         <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Profil</h1>
                                    </div>
                                    <form method="post" class="user">
                                        <div class="text-center">
                                            <img src="img/profile.png" class="img-thumbnail rounded-circle mb-3"alt="admin">
                                          </div>
                                        <div class="form-group text-center">
                                            <label for="exampleFormControlInput1" class="form-label ">Nama :</label>
                                            <label for="exampleFormControlInput1" class="form-control"><?php echo $data['nama']; ?></label>
                                            
                                        </div>
                                        <div class="form-group text-center">
                                            <label for="exampleFormControlInput1" class="form-label">Nama Pengguna :</label>
                                            <label for="exampleFormControlInput1" class="form-control"><?php echo $data['username']; ?></label>
                                            
                                        </div>
                                    </form>
                                    
                                </div>
                            </div>
                            <div class="col-lg">
                                <div class="p-5">
                                    <form method="post" class="user">
                                    <div class="form-group row right">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleFormControlInput1" class="form-label">Alamat :</label>
                                            <label for="exampleFormControlInput1" class="form-control">Mas</label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="exampleFormControlInput1" class="form-label">No Telpon :</label>
                                            <label for="exampleFormControlInput1" class="form-control">086987875643</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleFormControlInput1" class="form-label">Tanggal lahir :</label>
                                        <input type="date" name="tgl_lahir" class="form-control " id="exampleInputPassword"  />
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="exampleFormControlInput1" class="form-label">E-mail :</label>
                                            <label for="exampleFormControlInput1" class="form-control">nuu09@gmail.com</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleFormControlInput1" class="form-label">Jenis Kelamin :</label>
                                            <label for="exampleFormControlInput1" class="form-control">-</label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="exampleFormControlInput1" class="form-label">Kelurahan :</label>
                                            <label for="exampleFormControlInput1" class="form-control">Mas</label>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="exampleFormControlInput1" class="form-label">Kec. :</label>
                                            <label for="exampleFormControlInput1" class="form-control">Ubud</label>
                                        </div>
                                        <div class="col-sm-6">
                                        <label for="exampleFormControlInput1" class="form-label">Kab. :</label>
                                            <label for="exampleFormControlInput1" class="form-control">Gianyar</label>
                                        </div>
                                    </div>

                                    </form>
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