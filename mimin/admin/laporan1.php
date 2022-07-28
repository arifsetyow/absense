<?php

$start_date_error = '';
$end_date_error = '';


 ?>

<html>
 <head>
  <title></title>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
 </head>
 <body>
  <div class="container box">
   <h1 align="center">Rekap Laba Akhir Bulan Toko Online ICBB 2</h1>
   <br />
   
    <div class="row">
     <form method="post" action="nana.php">
      <div class="w3-container w3-card w3-center">
      <div class="input-daterange">
       <div class="w3-center">
        <br>
        <p> Tanggal Awal </p>
        <input type="text" name="start_date" class="form-control" readonly />
        <?php echo $start_date_error; ?>
       </div>
       <div class="w3-center">
        <br>
        <p> Tanggal Akhir </p>
        <input type="text" name="end_date" class="form-control" readonly />
        <?php echo $end_date_error; ?>
       </div>
       <br>
       <div class="w3-center">
<select class="form-control w3-center" name="bulan" id="bulan">
	<option value="">Pilih Bulan</option>
	<option value="01">Januari</option>
	<option value="02">Februari</option>
	<option value="03">Maret</option>
	<option value="04">April</option>
	<option value="05">Mei</option>
  <option value="06">Juni</option>
  <option value="07">Juli</option>
  <option value="08">Agustus</option>
  <option value="09">September</option>
  <option value="10">Oktober</option>
  <option value="11">November</option>
  <option value="12">Desember</option>
</select>


      </div>

      <br>
       <div class="w3-center">
<select class="form-control w3-center" name="kelompok" id="kelompok">
  <option>Pilih Kelompok</option>
  <option value="Laki-laki">Ikhwan</option>
  <option value="Perempuan">Akhwat</option>
  
</select>


      </div>
</div>
      <div class="w3-center">
        <br> <a href="index.php" class="w3-btn w3-orange">Kembali</a>
       <input type="submit" name="export" value="Export" class="w3-btn w3-teal" />
       <br>
      </div>
      <br>
     </form>
    </div>
    <br />
   
    <br />
    <br />
   </div>
 </div>
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "dd-mm-yyyy",
  autoclose: true
 });
});

</script>