<?php

require 'php/config.php';
include('template/header.php');

$obj=new Crudbuku;
?>



          <!-- Begin Page Content -->
          <div class="container-fluid">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <h1 class="h3 mb-0 text-gray-800">Laporan buku</h1>
              <a href="lihat-laporan.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Unduh laporan</a>
            </div>
        </div>


        <!-- End of Main Content -->
      <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
        <tr>
          <th>No</th>
          <th>id</th>
          <th>judul</th>
          <th>Penerbit</th>
          <th>Pengarang</th>
          <th>Tahun</th>
          <th>kategori_id</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr> 
      
<?php 
 $no=1;
 $data=$obj->tampilbuku();
 while ($row=$data->fetch_array()){ 
?>
 <tr>
  <td><?php echo $no++; ?></td>
  <td><?php echo $row['id']; ?></td>
  <td><?php echo $row['judul']; ?></td>
  <td><?php echo $row['penerbit']; ?></td>
  <td><?php echo $row['pengarang']; ?></td>
  <td><?php echo $row['tahun']; ?></td>
  <td><?php echo $row['nama_kategori']; ?></td>
  <td><?php echo $row['harga']; ?></td>
 <td>
  <a style="color:blue;" href="edit-b.php?id=<?php echo
$row['id']; ?>">Edit | </a>
  <a style="color:blue;" href="hapus-b.php?id=<?php echo
$row['id']; ?>"onclick="return confirm('Yakin Hapus?')">Hapus</a> 
 </td>
 </tr> 
<?php
 } 
?>

</table>


<?php include('template/footer.php'); ?>   
