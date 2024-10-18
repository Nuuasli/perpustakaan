<?php
require_once 'php/config.php';

$obj = new Crudbuku;
if (isset($_POST["submit"])) {
  $result = $obj->updatebuku($_POST["id"], $_POST["judul"], $_POST["deskripsi"], $_POST["penerbit"], $_POST["pengarang"], $_POST["tahun"], $_POST["kategori_id"], $_POST["harga"]);
  if ($result == 1) {
    echo "<script>alert('Data berhasil diperbaharui');</script>";
    header("location:buku.php");
  }
}
if (!$obj->detailDatabuku($_GET['id'])) die("Eror: id petugas not found");
include('template/header.php');
?>



<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->

</div>


<!-- End of Main Content -->
<div class="container-fluid">
  <div class="card shadow mb-5 p-4">
    <div class="row">

      <div class="w-100">
        <div class="p-5">
          <div class="text-center">
            <h1 class="h4 text-gray-900 mb-4">tambah Buku</h1>
          </div>
          <form class="user" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
              <input type="hidden" name="id" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="id" value="<?php echo $obj->id; ?>" />
            </div>
            <div class="form-group">
              <input type="text" name="judul" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="judul" value="<?php echo $obj->judul; ?>" />
            </div>
            <div class="form-group">
              <input type="text" name="deskripsi" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="deskripsi" value="<?php echo $obj->deskripsi; ?>" />
            </div>
            <div class="form-group">
              <input type="text" name="penerbit" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="penerbit" value="<?php echo $obj->penerbit; ?>" />
            </div>
            <div class="form-group">
              <input type="text" name="pengarang" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="pengarang" value="<?php echo $obj->pengarang; ?>" />
            </div>
            <div class="form-group">
              <input type="text" name="tahun" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="tahun" value="<?php echo $obj->tahun; ?>" />
            </div>
            <div class="form-group">
              <select class="form-control" name="kategori_id" placeholder="tahun" value="<?php echo $obj->kategori_id; ?>">
                <?php
                $crudKategori = new CrudKategori();
                $result = $crudKategori->tampilKategori();
                while ($row = mysqli_fetch_assoc($result)) {
                  $selected = ($obj->nama_kategori == $data['id']) ? 'selected' : '';
                  echo "<option value='" . $row['id'] . "' $selected>" . $row['nama_kategori'] . "</option>";
                }
                ?>
              </select>
            </div>
            <div class="form-group">
              <input type="text" name="harga" class="form-control form-control-user" id="exampleInputPassword" placeholder="harga" value="<?php echo $obj->harga; ?>" />
            </div>

            <button class=" w-25 btn btn-primary btn-user btn-block submit " type="submit" name="submit" value="edit"> edit </button>
            <hr />
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include('template/footer.php'); ?>