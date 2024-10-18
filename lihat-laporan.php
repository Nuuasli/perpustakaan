<?php
ob_start(); // start output buffering

require 'php/config.php';
require_once('php/tcpdf/tcpdf.php');
$obj=new Crudbuku();

// buat objek TCPDF baru
$pdf = new TCPDF('p', 'mm', 'A3', true, 'UTF-8', false);

// atur judul laporan
$pdf->SetTitle('Laporan Buku');

// atur margin halaman
$pdf->SetMargins(5, 15, 15);

// tambahkan halaman baru
$pdf->AddPage();

// tampilkan data buku dalam format tabel
$html = '<table border="1" width="100%" style="padding: 3px;">';

$html .= '<tr><th width="25px">No</th><th width="25px" style="text-align:center;">Id</th><th >Judul</th><th width="250px">Deskripsi</th><th >Penerbit</th><th >Pengarang</th><th width="60px" style="text-align:center;">Tahun</th><th>Kategori Id</th><th >Harga</th></tr>';
$no = 1;
$data = $obj->tampilBuku();
while ($row = $data->fetch_array()) {
    $html .= '<tr>';
$html .= '<td width="25px" style="text-align:center;">' . $no++ . '</td>';
$html .= '<td width="25px" style="text-align:center;">' . $row['id'] . '</td>';
$html .= '<td >' . $row['judul'] . '</td>';
$html .= '<td width="250px">' . $row['deskripsi'] . '</td>';
$html .= '<td >' . $row['penerbit'] . '</td>';
$html .= '<td>' . $row['pengarang'] . '</td>';
$html .= '<td width="60px" style="text-align:center;">' . $row['tahun'] . '</td>';
$html .= '<td style="text-align:center;">' . $row['nama_kategori'] . '</td>';
$html .= '<td>' . $row['harga'] . '</td>';

$html .= '</tr>';
}
$html .= '</table>';

// tampilkan data tabel di dalam file PDF
$pdf->writeHTML($html, true, false, true, false, '');

ob_end_clean(); 

// simpan file PDF di server
$pdf->Output('laporan-buku.pdf', 'D');

// clear output buffer
?>