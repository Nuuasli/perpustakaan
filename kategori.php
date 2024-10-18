<?php

require 'php/config.php';

include('template/header.php');
$obj = new Crudkategori;
?>





<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Kategori</h1>
  </div>
</div>
<div class="container-fluid">
  <div class="card shadow mb-5 p-4">

    <!-- End of Main Content -->
    <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
      <tr>
        <th>No</th>

        <th>nama kategori</th>
        <th>Aksi</th>
      </tr>

      <?php
      $no = 1;
      $data = $obj->tampilkategori();
      while ($row = $data->fetch_array()) {
      ?>
        <tr>
          <td><?php echo $no++; ?></td>

          <td><?php echo $row['nama_kategori']; ?></td>
          <td>

            <a style="color:red;" href="hapus-k.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin Hapus?')"><i class="fas fa-fw fa-trash"></i></a>
          </td>
        </tr>
      <?php
      }
      ?>

    </table>
  </div>
</div>




<?php include('template/footer.php'); ?>