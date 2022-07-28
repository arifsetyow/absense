<?php
date_default_timezone_set('Asia/Jakarta');
include ("../koneksi.php");
session_start();

if(isset($_POST['username'],$_POST['password'])){
  $username = $_POST['username'];
  $password = $_POST['password'];

$cek = mysqli_query($koneksi, "select * from admin where username='$username' AND password='$password'");
$row = mysqli_fetch_array ($cek);

if (mysqli_num_rows($cek) == 1) {

  $_SESSION['login'] = 'admin';
  echo "<script>alert('Bismillah.. ^_^ Semoga Allah mudahkan pekerjaan kita semua.. Aamiin...');window.location.assign('index2.php');</script>";
  
}else{
  echo "<script>alert('Maaf password anda salah min.. coba lagi yuuk');history.back();</script>";
  
}
}
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
  <form action="" method="POST">
    <input name="username" class="w3-input w3-border w3-animate-input w3-center w3-card" type="text" placeholder="Tulis Username Disini" style="width:100%; height:70px; font-size: 25px;"> <br>
    <input name="password" class="w3-input w3-border w3-animate-input w3-center w3-card" type="password" placeholder="Tulis Password Disini" style="width:100%; height:70px; font-size: 25px;">
    
    <br>
    <button type="submit" class="w3-green w3-btn w3-card w3-xxlarge w3-center">Masuk</button>

    <br>

    </form>
 <br>
 <br>
 <br>

  

    <br>

 

  </div>
   
</div>


</body>

</html>
