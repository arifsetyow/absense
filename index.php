<!DOCTYPE html>
<html>
<head>
<title>Absensi Baru</title>
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
    
    include ("koneksi.php");
    
  if(isset($_POST['kode'])){
    $test = $_POST['kode'];

$cek = mysqli_query($koneksi, "select * from karyawan where kode='$test'");
$row = mysqli_fetch_array ($cek);

if (mysqli_num_rows($cek) == 1) {
    session_start();
    $_SESSION['login'] = 'login';
    $_SESSION['id_karyawan'] = $row['id_karyawan'];
    $_SESSION['nama_karyawan'] = $row['nama_karyawan'];
    $_SESSION['kode'] = $row['kode'];
    $_SESSION['id_jadwal'] = $row['id_jadwal'];
    header('Location: welcome.php');
    
}else{
    ?>
      <script>alert('Afwan, Kode yang anda masukkan salah/tidak terdaftar, silahkan coba lagi.'); history.back();</script>
    <?PHP 
}
	
    }
    
    ?>

<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">
  <div class="w3-display-topleft w3-padding-large w3-xlarge">
   
  </div>
  <div class="w3-display-middle w3-center">
  <h1 class="w3-animate-top" style="text-shadow:1px 1px 0 #444; text-align:center;"><b>Assalamu'alaikum.. Salam semangat. :)</b></h1>
    <hr class="w3-border-grey" style="margin:auto;width:40%">
    <form action="" method="POST">
    <input name="kode" class="w3-input w3-border w3-animate-input w3-center w3-card" type="text" placeholder="Tulis Kode Absen Disini" style="width:100%; height:100px; font-size: 37px;">
    <br>
    <button type="submit" class="w3-green w3-btn w3-card w3-xxlarge w3-center">Masuk</button>

    <br>

    </form>

  </div>
   
</div>


</body>

</html>
