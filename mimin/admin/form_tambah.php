<?php 
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}

?>

	<head>
		
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	</head>

<p>

</p>
<br>



 <div style=" margin: auto;
  width: 60%;
  border: 3px solid #73AD21;
  padding: 10px;">
  

<form role="form" method="post" action="input.php">


	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<p>
	<h3>Tambah Data Admin</h3>
	</p>
	<br>
		<div class="form-group">
			<label>Nama admin</label>
		<input type="hidden" name="id_admin">
		<input class="form-control" name="nama_admin">
			
		</div>

		<div class="form-group">
			<label>Posisi Admin</label>
			
		 <select name="level" id="propinsi" class="form-control">
  <option>Posisi Admin</option>
  <option 
   


  value="1">Super Admin</option>

<option 
   


  value="2">Admin Pemasukan</option>
  <option 




  value="3">Admin Pengeluaran</option>
  <option 


  value="4">Admin Cek Data</option>
 
</select> 
			
		<br>
	

		<div class="form-group">
			<label>Username</label>
			
		<input class="form-control" name="username">
			
		</div>

		<div class="form-group">
			<label>Password</label>
			
		<input class="form-control" name="password">
			
		</div>

			<div class="form-group">
			<label>Nomor WA</label>
			
		<input type="number" class="form-control" name="nomor_wa" value="62">
			
		</div>



		
		<button type="submit" class="btn btn-primary pull-left">Simpan</button> 
		<a href="index.php" class="btn btn-success pull-left" style="margin-left:1%;">Batal</a>
	</form>
</div>