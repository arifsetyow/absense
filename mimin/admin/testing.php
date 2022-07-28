<?php include '../koneksi.php'; 
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Saldo Walisantri</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
	<div class="container">
		<br>
		<h2 style="text-align: center;">Aplikasi Pengelolaan Saldo Walisantri</h2>		
		<br>
			
		<?php 
		if(isset($_GET['alert'])){
			if($_GET['alert']=='gagal_ekstensi'){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-warning"></i> Peringatan !</h4>
					Ekstensi Tidak Diperbolehkan
				</div>								
				<?php
			}elseif($_GET['alert']=="gagal_ukuran"){
				?>
				<div class="alert alert-warning alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Peringatan !</h4>
					Ukuran File terlalu Besar
				</div> 								
				<?php
			}elseif($_GET['alert']=="berhasil"){
				?>
				<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
					<h4><i class="icon fa fa-check"></i> Success</h4>
					Berhasil Disimpan
				</div> 								
				<?php
			}
		}
		?>
		<br>
		<a href="index.php" class="btn btn-primary btn-lg">Data Transaksi Walisantri</a>
		<a href="siswa.html" class="btn btn-success btn-lg">Data Walisantri</a>

	
		
		<br>		
		<br>		
		<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 10px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myTable {
  border-collapse: collapse;
  width: 100%;
  border: 1px solid #ddd;
  font-size: 18px;
}

#myTable th, #myTable td {
  text-align: left;
  padding: 12px;
}

#myTable tr {
  border-bottom: 1px solid #ddd;
}

#myTable tr.header, #myTable tr:hover {
  background-color: #f1f1f1;
}
</style>
</head>
<body>

<h2>Data Walisantri</h2>

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Cari Data Nama Walisantri.." title="Type in a name">
<br>
<br>
<a class="w3-button w3-ripple w3-blue" style="margin-bottom:2%;" href="setoran.html" >Tambah Saldo</a>

				<a class="w3-button w3-ripple w3-red"style="margin-bottom:2%;" href="penarikan.html" >Tambah Pengeluaran</a>
					<a class="w3-button w3-ripple w3-green"style="margin-bottom:2%;margin-right:2%;" href="export.php" >Ekspor Data Ke Excel</a>

		<br>		
<table id="myTable">
  <tr>
				<th width="20%">Walisantri</th>
			  	<th width="20%">Santri</th>
			  	<th width="20%">Nomor WA</th>
				<th width="20%">Angkatan</th>
				<th width="20%">Kelas</th>
				<th width="30%">Asrama</th>
				<th width="30%">Lokasi</th>
        		<th width="30%">Opsi</th>
			</tr>
			<?php 
			

			$data = mysqli_query($koneksi,"SELECT * FROM siswa JOIN angkatan ON siswa.id_angkatan=angkatan.id_angkatan JOIN kelas ON siswa.id_kelas=kelas.id_kelas JOIN asrama ON siswa.id_asrama=asrama.id_asrama JOIN lokasi ON siswa.id_lokasi=lokasi.id_lokasi ORDER BY siswa.id_siswa ASC");
			while($d = mysqli_fetch_array($data)){
				?>
				<tr>
					<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['alamat']; ?></td>
					<td><?php echo $d['']; ?></td>
					<td><?php echo $d['telepon']; ?></td>
					<td><?php echo $d['telepon']; ?></td>
					<td><?php echo $d['telepon']; ?></td>
					
				
					<td><a href="detail-<?php echo $d['id_siswa'] ; ?>.html">Detail</a></td>
					
				</tr>
				<?php
			}
 
			?>
</table>

<script>
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<br>


</body>
</html>

	</div>


</body>
</html>