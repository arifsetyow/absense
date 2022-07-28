<?php
$koneksi=mysqli_connect("localhost","jardahst_adm","jardah3080","jardahst_oke");
require 'vendor/autoload.php';
 
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Csv;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
 
$file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

if(isset($_FILES['berkas_excel']['name']) && in_array($_FILES['berkas_excel']['type'], $file_mimes)) {
 
    $arr_file = explode('.', $_FILES['berkas_excel']['name']);
    $extension = end($arr_file);
 
    if('csv' == $extension) {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
    } else {
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
    }
 
    $spreadsheet = $reader->load($_FILES['berkas_excel']['tmp_name']);
     
    $sheetData = $spreadsheet->getActiveSheet()->toArray();
	for($i = 1;$i < count($sheetData);$i++)
	{
        $kode = $sheetData[$i]['0'];
        $nama = $sheetData[$i]['4'];
        $stok = $sheetData[$i]['14'];
        $harga = $sheetData[$i]['17'];
        
        mysqli_query($koneksi,"INSERT INTO produk (idkategori, namaproduk, hargaafter, stok, kode_brg) SELECT '77', '$nama', '$harga', '$stok', '$kode' WHERE NOT EXISTS (SELECT kode_brg FROM produk WHERE kode_brg = '$kode');");
        mysqli_query($koneksi,"update produk set stok = '$stok', hargaafter = '$harga' where kode_brg = '$kode'");
        mysqli_query($koneksi,"delete from produk where kode_brg =''");
    }
     echo "<script>alert('Produk Berhasil Diupload'); window.history.back();</script>";
}

?>
				