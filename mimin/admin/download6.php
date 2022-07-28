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
  include '../dbconnect.php';


if (isset($_POST['kirim'])) {
    $brg = '1';
    if (isset($_POST['excel'])) {
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Data Pegawai.xls"); 
    }
    $awala = $_POST['awal'];
$akhira = $_POST['akhir'];

$awal = date('d-m-Y', strtotime($awala));
$akhir = date('d-m-Y', strtotime($akhira));
$bulan = date('m', strtotime($akhira));
$kategori = '';


   ?>
<body>

<div class="w3-container">
  <h4>Produk Harian Yang Dikemas Pada : Tanggal <?php echo $awal; ?> - <?php echo $akhir?></h4>


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
  <br>
<br>
  <div class="noprint">
  <button onclick="window.print();" class="noPrint w3-btn w3-large w3-orange w3-text-white w3-center">Print</button>
  <br>
  <br>
   <form action="excel.php" method="post">
       <input type="hidden" name="kategori" value="<?php echo $awal; ?>">
       <input type="hidden" name="awal" value="<?php echo $awal; ?>">
       <input type="hidden" name="akhir" value="<?php echo $akhir; ?>">
        <input type="hidden" name="cek" value="<?php echo $brg; ?>">
        
        <input type="submit" name="excel" value="Download Excel" class = "w3-btn w3-large w3-green w3-text-white w3-center">
                </form>
                <br>
            
                <button onclick="history.back()" class="noPrint w3-btn w3-large w3-blue w3-text-white w3-center">Kembali</button>
                </div>
  
</div>



</div>
  <?php
  
} 
    else {
        $brg = '2';
        if (isset($_POST['excel'])) {
            
             ?>
        <style>
    
   .noprint{
       display:none;
   
}
</style>
        
        <?php
    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=Data Pegawai.xls"); 
    }
    
    $awala = $_POST['awal'];
$akhira = $_POST['akhir'];

$awal = date('d-m-Y', strtotime($awala));
$akhir = date('d-m-Y', strtotime($akhira));
$bulan = date('m', strtotime($akhira));


   ?>
   <body>

<div class="w3-container">
  <h4>Produk PO Yang Dikemas Pada : Tanggal <?php echo $awal; ?> - <?php echo $akhir?></h4>


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
  <div class="noprint">
  <button onclick="window.print();" class="noPrint w3-btn w3-large w3-orange w3-text-white w3-center">Print</button>
  <br>
  <br>
   <form action="excel.php" method="post">
       <input type="hidden" name="kategori" value="<?php echo $awal; ?>">
       <input type="hidden" name="awal" value="<?php echo $awal; ?>">
       <input type="hidden" name="akhir" value="<?php echo $akhir; ?>">
        <input type="hidden" name="cek" value="<?php echo $brg; ?>">
        
        <input type="submit" name="excel" value="Download Excel" class = "w3-btn w3-large w3-green w3-text-white w3-center">
                </form>
                <br>
                
                <button onclick="history.back()" class="noPrint w3-btn w3-large w3-blue w3-text-white w3-center">Kembali</button>
                </div>
</div>
   
   
   <?php
    
}
?>

</body>
</html>
