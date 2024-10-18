<?php

require 'php/config.php';
$register=new Tambahbuku();
if(isset($_POST["submit"])){
header("location:buku.php");
$result = $register->addbuku($_POST["id"], $_POST["judul"], $_POST["deskripsi"], $_POST["penerbit"], $_POST["pengarang"], $_POST["tahun"], $_POST["kategori_id"], $_POST["harga"]);
if($result==1){
echo "<script>alert('be nyak tenang?');</script>";
}
elseif($result==10){
echo "<script>alert('ube ade kategori to');</script>";
}
elseif($result==100){
echo "<script>alert('Password does not match');</script>";
}
}
include('template/header.php');
?>

        <!-- End of Main Content -->
        <div class="container-fluid">
        <div class="card shadow mb-5 p-4">
        <div class="row">
               
               <div class="w-100">
                 <div class="p-5">
                   <div class="text-center">
                     <h1 class="h4 text-gray-900 mb-4">tambah Buku</h1>
                   </div>
                   <form class="user" method="post">
                     <div class="form-group">
                       <input type="hidden" name="id" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="id" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="judul" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="judul" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="deskripsi" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="deskripsi" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="penerbit" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="penerbit" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="pengarang" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="pengarang" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="tahun" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="tahun" />
                     </div>
                     <div class="form-group">
                     <select class="form-control" name="kategori_id" placeholder="kategori_id">
                                <?php
                                $crudKategori = new CrudKategori();
                                $result = $crudKategori->tampilKategori();
                                while($row = mysqli_fetch_assoc($result)) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['nama_kategori'] . "</option>";
                                }
                                ?>
                            </select>
                     </div>
                     <div class="form-group">
                       <input type="text" name="harga" class="form-control form-control-user" id="exampleInputPassword" placeholder="harga" />
                     </div>
                     
                     <button class=" w-25 btn btn-primary btn-user btn-block submit " type="submit" name="submit" value="submit"> tambah buku </button>
                     <hr/>
                     
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
   </div>

   <?php include('template/footer.php'); ?>