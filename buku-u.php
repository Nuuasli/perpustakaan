<?php
require_once 'php/config.php';
include('template/header.php');
$buku = new CrudBuku();
if (isset($_GET['cari'])) {
  $keyword = isset($_GET['cari']) ? $_GET['cari'] : '';
  $result = $buku->searchBuku($keyword);
} else {
  $result = $buku->tampilbuku();
}


$obj = new Crudbuku;
?>


<!-- Begin Page Content -->
<div class="container-fluid">
  <?php
  if (isset($_GET['cari'])) {
    $cari = $_GET['cari'];
    echo "<b class='p-3'>Hasil pencarian : " . $cari . "</b>";
  }
  ?>
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Buku</h1>
    <a href="lihat-laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>unduh laporan</a>

  </div>

  <div class="container-fluid">
    <div class="card shadow mb-5 p-4">
      <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No</th>

          <th>judul</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Tahun</th>
          <th>kategori</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>

        <?php
        $no = 1;
        $data = $obj->tampilbuku();
        while ($row = $data->fetch_array()) {
        ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row['judul']; ?></td>
            <td><?php echo $row['penerbit']; ?></td>
            <td><?php echo $row['pengarang']; ?></td>
            <td><?php echo $row['tahun']; ?></td>
            <td><?php echo $row['nama_kategori']; ?></td>
            <td><?php echo $row['harga']; ?></td>
            <td>
              <a style="color:blue;" href="detail_buku1.php?id=<?php echo $row['id']; ?>">Lihat | </a>
              <a style="color:blue;" href="https://wa.me/085954502188" <?php echo $row['id']; ?>"onclick="return confirm('Order melalui whatsapp')">Order</a>
            </td>
          </tr>
        <?php
        }
        ?>

      </table>
    </div>
  </div>

  <!-- End of Page Wrapper -->

  <?php include('template/footer.php'); ?>