<?php
require_once('php/config.php');
require_once 'php/config.php';
$obj = new Crudkategori;
if(!$obj->detailDatakategori($_GET['id']))die("Eror: id not found");
$result = $obj->deletekategori($_GET['id']);
if($result==1){
echo "<script>alert('Data berhasil dihapus');</script>";
header("location:kategori.php");
}
?>
