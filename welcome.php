<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h1 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('https://img.freepik.com/free-vector/asian-rice-field-terraces-morning-mountains-landscape-paddy-plantation-cascades-farm-mount-water-channel-with-growing-plants-scenery-meadow-with-green-grass-cartoon-vector-illustration_107791-10452.jpg?w=1380&t=st=1656476636~exp=1656477236~hmac=53ffde0dae6c3395bdb511d3aaed84db9750e9788a3bab68c2b92165b4e74e18');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
</style>
</head>
<body>
    
    <?php
date_default_timezone_set('Asia/Jakarta');
include ("koneksi.php");
session_start();

$kode = $_SESSION['kode'];
$id_kar =  $_SESSION['id_karyawan'];
$id_jadwal =  $_SESSION['id_jadwal'];
$jadwal = mysqli_query($koneksi, "select * from jadwal where id_jadwal='$id_jadwal'");
$row_jadwal = mysqli_fetch_array($jadwal);
$jaker= $row_jadwal['jadwal_masuk'];
$jakur= $row_jadwal['jadwal_keluar'];
$nows = date("H:i");
$now = date("d-m-Y");
$bulan = date("m");

if($nows >= $jaker){
  $telat = "ya";
}else{
  $telat = "no";
}
if(isset($_POST['checkin'])){

 
  $cek = mysqli_query($koneksi, "INSERT INTO `absen` (`id_absen`, `id_jadwal`, `id_karyawan`, `masuk`, `keluar`, `detail_masuk`, `tanggal_absen`, `status`, `bulan`) VALUES (NULL, '$id_jadwal', '$id_kar', '$nows', '', current_timestamp(), '$now', 'checkin', '$bulan');");
 
}elseif(isset($_POST['toleransi'])){
  $cek = mysqli_query($koneksi, "select * from absen where id_karyawan='$id_kar' AND tanggal_absen='$now'");
  $row = mysqli_fetch_array($cek);
  if($row > 0){
 //telegram sini
 echo "ajuan anda kami proses";
  }else{
    $cek = mysqli_query($koneksi, "INSERT INTO `absen` (`id_absen`, `id_jadwal`, `id_karyawan`, `masuk`, `keluar`, `detail_masuk`, `tanggal_absen`, `status`, `bulan`) VALUES (NULL, '$id_jadwal', '$id_kar', '$nows', '', current_timestamp(), '$now', 'toleransi', '$bulan');");
 
  }
 
  
}elseif(isset($_POST['checkout'])){
    $id_absen = $_POST['id_absen'];
 
   


    $cek = mysqli_query($koneksi, "UPDATE `absen` SET `keluar` = '$nows', `status` = 'checkout' WHERE `absen`.`id_absen` = '$id_absen';");
    if(!$cek){
      echo "gagal";
    }
      
    }
  




$cek = mysqli_query($koneksi, "select * from absen where id_karyawan='$id_kar' AND tanggal_absen='$now'");
$row = mysqli_fetch_array($cek);
if (empty($row['status'])) {
  $status = "";
}else{
  $status = $row['status'];
  $mulai = $row['masuk'];
}




    ?>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
   
  </div>
  <div class="w3-display-middle w3-center">
  <form action="" method="POST">
<?php
  if($nows >= $jakur){
    ?>
   <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Selamat Istirahat :)</b></h1> <br>
   <?php 
   if($status == "checkin"){
    ?>
   <input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
  <input type="hidden" name="checkout" value="checkout">
  
        <button type="submit" class="w3-orange w3-btn w3-card w3-xxlarge w3-center">ABSEN PULANG</button>
       
        <br> <br>
        <?php }?>
  <?php
}else{
?>

 
  <?php 
  if($telat == "ya") {
    if($status == 'toleransi'){
  ?>
  <button type="submit" class="w3-blue w3-btn w3-card w3-xlarge w3-center" disabled>TOLERANSI TELAH DIKIRIM</button>
  <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Waktu mulai kerja sudah dicatat, yaitu mulai pada jam <?php echo $mulai;?> <?php ?></b></h1> 
 
  <?php

    }elseif($status == "checkin"){
?>
<h2 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>
Bismillah.. ^_^ Semoga Allah mudahkan pekerjaan kita semua.. Aamiin...</b></h2>
 <br>
<input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
  <input type="hidden" name="checkout" value="checkout">
        <button type="submit" class="w3-orange w3-btn w3-card w3-xxlarge w3-center">ABSEN PULANG</button>

<?php

    }elseif($status=="checkout"){
      ?>
<h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Alhamdulillah, Syukron..  </b></h1>
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Jazzakumullahu khairan.. </b></h1> 
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>^_^</b></h1> 
      <?php
    }else{
      ?>
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Tetaplah Semangat Walaupun Terlambat :)</b></h1>
<input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
<input type="hidden" name="toleransi" value="toleransi">
<button type="submit" class="w3-blue w3-btn w3-card w3-xxlarge w3-center">MINTA TOLERANSI</button>  
      <?php
    }
?>

 <br>
 <br>
 <br>



<?php
  } elseif($telat == "no"){

    
    ?>

<?php if ($status !='checkout') { ?>
  <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Bismillah, :) Semangaaatt </b></h1>
  <br>
  <?php } ?>
    

    <input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
       <br>
       <?PHP if ($status != 'checkin' && $status != 'checkout'){
     ?>
    <input type="hidden" name="checkin" value="checkin">
    <button type="submit" class="w3-green w3-btn w3-card w3-xxlarge w3-center">ABSEN MASUK</button>
    <br>
    <br>
    <?php } elseif ($status == 'checkin') {
        ?>
        <input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
        <input type="hidden" name="checkout" value="checkout">
        <button type="submit" class="w3-red w3-btn w3-card w3-xxlarge w3-center">ABSEN PULANG</button>
 <br>
 <br>
 <br>




<?php }elseif ($status == 'checkout') {
        ?>
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Alhamdulillah, Syukron..  </b></h1>
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Jazzakumullahu khairan.. </b></h1> 
 <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>^_^</b></h1> 
 <br>
 <br>
 <br>




<?php } elseif($telat == "ya") {
        ?>
        
<h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Tetaplah Semangat Walaupun Terlambat :)</b></h1>
<input type="hidden" name="id_absen" value="<?php echo $row['id_absen'];?>">
<input type="hidden" name="toleransi" value="toleransi">
<button type="submit" class="w3-blue w3-btn w3-card w3-xxlarge w3-center">MINTA TOLERANSI</button>
 
 <br>
 <br>
 <br>




<?php }?>

<?php
  }
}
  ?>
    <br>
    
    <a href="logout.php" class="w3-red w3-btn w3-card w3-large w3-center">Logout</a>
    </form>

  </div>
   
</div>


</body>

</html>
