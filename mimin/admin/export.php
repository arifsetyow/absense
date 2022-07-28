<?php 
include '../dbconnect.php';
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Export Data Ke Excel Dengan PHP</title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;

	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=BarangMauHabis.xls");
	?>



<table id="myTable">

		<?php 
		// koneksi database
		$no = 1;

		// menampilkan data pegawai


				$data = mysqli_query($conn,"select * from produk where stok < 10 order by stok DESC");
	while($d = mysqli_fetch_array($data)){
				?>
				<tr>
		
<td><?php echo $d['idproduk']; ?></td>
						<td><?php echo $d['namaproduk']; ?></td>
					<td><?php echo $d['stok']; ?></td>
					
		</tr>
		<?php 
		}
		?>


	</table>
				



</body>
</html>