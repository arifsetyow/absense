<?php
date_default_timezone_set('Asia/Jakarta');
include ("../koneksi.php");
session_start();


    ?>

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

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
   
  </div>
  <div class="w3-display-middle w3-center">

  <br><br><br>
<h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Mau apa nih min ?</b></h1>

<a href="admin/index.php" class="w3-green w3-btn w3-card w3-xxlarge w3-center">Lihat Data Absensi</a> <br><br>
<a href="admin/karyawan_data.php"class="w3-blue w3-btn w3-card w3-xxlarge w3-center">Lihat Data Pegawai</a> <br><br>
<a href="admin/jadwal.php" class="w3-orange w3-btn w3-card w3-xxlarge w3-center">Lihat Data Jadwal</a> <br><br>
 <br>
 <br>
 <br>

  

    <br>
    <a href="logout.php" class="w3-red w3-btn w3-card w3-large w3-center">Logout</a>
 

  </div>
   
</div>


</body>

</html>
