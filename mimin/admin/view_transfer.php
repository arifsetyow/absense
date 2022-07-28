<?php
include '../dbconnect.php';
$id = $_POST['id_order'];
	
	$data = mysqli_query ($conn, " select *
									  from 
									  tb_order where id_order = $id;");
	$row = mysqli_fetch_array ($data);
	
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
img {
  display: block;
  margin-left: auto;
  margin-right: auto;
}
</style>
</head>
<body>
<br>
<div class="w3-container w3-center">
  <button class="w3-button w3-teal w3-center" onclick="goBack()">Kembali</button>
</div>
<script>
function goBack() {
  window.history.back();
}
</script>
<br>
<img src="../transaksi/<?php echo $row['foto'] ;?>" alt="Paris" style="width:80%;">

</body>
</html>

