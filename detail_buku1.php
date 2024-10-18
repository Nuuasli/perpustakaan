<?php
require_once 'php/config.php';
$obj = new Crudbuku;
if(isset($_POST["submit"])){
$result = $obj->updatebuku ($_POST["id"] , $_POST["judul"], $_POST["penerbit"], $_POST["pengarang"], $_POST["tahun"], $_POST["kategori_id"], $_POST["harga"]);
if($result==1){
echo "<script>alert('Data berhasil diperbaharui');</script>";
header("location:buku.php");
}
}
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $obj->tampilBuku();
    $data = null;

    while ($row = $result->fetch_assoc()) {
        if ($row['id'] == $id) {
            $data = $row;
            break;
        }
    }

    if ($data == null) {
        die("Eror: id buku not found");
    }
} else {
    die("Eror: id buku not specified");
}
include('template/header.php');

?>

 <!-- Begin Page Content -->
 <div class="container-fluid">

<div class="container">

    <!-- Outer Row -->
    <div class="row">

        <div class="w-100">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Detail Buku</h1>
                                </div>
                               
                                <table class="d-flex">
                                        <tr >
                                            <td >ID</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td><?php echo $data["id"];?></td>
                                        </tr>
                                        <tr>
                                            <td>JUDUL</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td><?php echo $data["judul"];?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>DESKRIPSI</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["deskripsi"]);?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>PENERBIT</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["penerbit"]);?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>PENGARANG</td>
                                            <td>&nbsp;&nbsp;&nbsp;:</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["pengarang"]);?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>TAHUN</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["tahun"]);?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>KATEGORI</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["nama_kategori"]);?></td>
                                        </tr>
                                        <tr class="d-flex">
                                            <td>HARGA</td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</td>
                                            <td class="align-items-start ml-2"><?php echo nl2br($data["harga"]);?></td>
                                        </tr>
                                </table>
                                    <br>
                                    <div>
                                        <a name="submit" value="submit" type="submit" class="btn btn-primary btn-user btn-block" href="buku-u.php">Kembali</a>
                                    </div>
                                <!-- <button name="submit" type="submit"  class="w-25 btn btn-primary btn-user btn-blocks">
                                    Kembali
                                </button> -->
                                
                            </div> 
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>


    <?php include('template/footer.php');?>