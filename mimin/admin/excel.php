<?php
  include '../dbconnect.php';
?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    @media print{
   .noprint{
       display:none;
   }
}
</style>
<?php 



if (isset($_POST['excel'])) {
    $cek = $_POST['cek'];
    if ($cek == '1'){
          header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=RekapProdukHarian.xls"); 
    $awala = $_POST['awal'];
$akhira = $_POST['akhir'];

$awal = date('d-m-Y', strtotime($awala));
$akhir = date('d-m-Y', strtotime($akhira));
$bulan = date('m', strtotime($akhira));
$kategori = '';


   ?>
<body>

<div class="w3-container">
  <h4>( Dikemas ) Produk Harian Tanggal <?php echo $awal; ?> - <?php echo $akhir?></h4>


  <table class="w3-table w3-striped">
    <tr>
      <th>Nama Produk</th>
      <th>Jumlah Terjual</th>
    
    </tr>
     <?php
                    $data = mysqli_query($conn,"SELECT produk.namaproduk, SUM(pembelian) AS total FROM tb_detail_order join produk on tb_detail_order.idproduk=produk.idproduk JOIN tb_order ON tb_detail_order.id_order=tb_order.id_order WHERE produk.idkategori != '1020304050' AND tb_order.status = 'dikemas' AND tb_order.bulan = '$bulan' and tb_order.tgl_transaksi BETWEEN '$awal' AND '$akhir' GROUP BY produk.namaproduk");
                while ($d = mysqli_fetch_array($data)){
                ?>
    <tr>
      <td><?= $d['namaproduk'] ?></td>
      <td><?= $d['total'] ?></td>

    </tr>
          <?php
                }

                ?>
   
  </table>
</div>
  <?php
  
} else {
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=RekapPO.xls"); 
    
    
    
    $awala = $_POST['awal'];
$akhira = $_POST['akhir'];

$awal = date('d-m-Y', strtotime($awala));
$akhir = date('d-m-Y', strtotime($akhira));
$bulan = date('m', strtotime($akhira));


   ?>
   <body>

<div class="w3-container">
  <h4>( Dikemas ) Produk Pre Order Tanggal <?php echo $awal; ?> - <?php echo $akhir?></h4>


  <table class="w3-table w3-striped">
    <tr>
      <th>Nama Produk</th>
      <th>Jumlah Terjual</th>
    
    </tr>
     <?php
                    $data = mysqli_query($conn,"SELECT produk.namaproduk, SUM(pembelian) AS total FROM tb_detail_order join produk on tb_detail_order.idproduk=produk.idproduk JOIN tb_order ON tb_detail_order.id_order=tb_order.id_order WHERE produk.idkategori = '1020304050' AND tb_order.status = 'dikemas' AND tb_order.bulan = '$bulan' and tb_order.tgl_transaksi BETWEEN '$awal' AND '$akhir' GROUP BY produk.namaproduk");
                while ($d = mysqli_fetch_array($data)){
                ?>
    <tr>
      <td><?= $d['namaproduk'] ?></td>
      <td><?= $d['total'] ?></td>

    </tr>
    
          <?php
                }

                ?>
                
                <br>
               
   
  </table>
  <br>
  <br>
 
   
   
   <?php
}
}

?>


  
    
    

</body>
</html>
