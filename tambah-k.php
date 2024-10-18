
<?php

require 'php/config.php';
$register=new Tambah();
if(isset($_POST["submit"])){
  header("location:kategori.php");
$result = $register->addcategory($_POST["id"], $_POST["nama"]);
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
                     <h1 class="h4 text-gray-900 mb-4">tambah kategori</h1>
                   </div>
                   <form class="user" method="post">
                     <div class="form-group">
                       <input type="hidden" name="id" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="id" />
                     </div>
                     <div class="form-group">
                       <input type="text" name="nama" class="form-control form-control-user" id="exampleInputPassword" placeholder="kategori" />
                     </div>
                     
                     <button class=" w-25 btn btn-primary btn-user btn-block submit " type="submit" name="submit" value="submit"> tambah kategori </button>
                     <hr />
                     
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
