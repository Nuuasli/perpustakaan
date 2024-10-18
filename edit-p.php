<?php
require_once 'php/config.php';
$register = new profil();
$user = new Connection();
$id = $_SESSION["id"];

$query = "SELECT * FROM user WHERE id = ?";
$stmt = mysqli_prepare($user->conn, $query);
mysqli_stmt_bind_param($stmt, "i", $id);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$data = mysqli_fetch_assoc($result);

if (isset($_POST["submit"])) {
    // Mendapatkan data dari form
    $user_id = $_POST["id"];
    $nama = $_POST["nama"];
    $username = $_POST["username"];
    $result = $register->editProfil($nama, $username, $user_id);
    if ($result == 1) {
        header("Refresh: 1; url=profile.php");
        echo "<script>alert('Edit Behasil');</script>";
    } else {
        echo "<script>alert('Gagal');</script>";
    }
};
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
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class=" col-lg-10">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">edit Profil</h1>
                                    </div>
                                    <form method="post" enctype="multipart/form-data" class="user">
                                        <div class="form-group">
                                            <input type="hidden" name="id" class="form-control" id="exampleInputEmail" placeholder="id" value="<?php echo $data["id"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">Nama User</label>
                                            <input type="text" name="nama" class="form-control" id="exampleInputEmail" placeholder="nama" value="<?php echo $data["nama"]; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlFile1">username</label>
                                            <input type="text" name="username" class="form-control" id="exampleInputEmail" placeholder="username" value="<?php echo $data["username"]; ?>">
                                        </div>


                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Save changes</button>
                                    </form>
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