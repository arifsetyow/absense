<?php 
     	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Saldo Seluruh Walsan.xls");
include '../dbconnect.php';

if(isset($_POST['kelompok'])){
    $jkl = strtolower($_POST["kelompok"]);
    if($jkl == 'laki-laki'){
    	$pok = "Ikhwan";
    }else {
    	$pok = "Akhwat";
    }
}else{
    $jkl = '';
}

function format_rupiah($angka){
  $rupiah=number_format($angka,0,',','.');
  return $rupiah;
}

function reset_rupiah($rupiah){
$pecah = explode('.',$rupiah);
$return		= implode('',$pecah);
return  $return;
}

session_start();
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}


?>
<!DOCTYPE html>
<html>

<head>
	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<title><?php echo $jkl; ?></title>
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
	
	if (isset($_POST['export'])) {
	   
	}else{
	    
	}



	?>

	<br>
	<br>
	
	<?php
		$no = 1;


	
	?>

	
	<center>
		<h1>Data Saldo Walisantri</h1><br>
		
	</center>

<table id="myTable">
  <tr> <th>
							No
						</th>
				<th width="40%">Nama Walisantri</th>
					<th width="20%">Sisa Saldo</th>
	
				
     
			</tr>
		<?php
		
		// koneksi database
	

	

				$data = mysqli_query($conn,"SELECT * FROM login ORDER BY userid ASC;");
	while($d = mysqli_fetch_array($data)){
				?>
				<tr>
				<td><?php echo $no++; ?></td>
				<td><?php echo $d['namalengkap']; ?></td>
				<td>Rp.<?php echo format_rupiah ($d['saldo']);?></td>
					
		</tr>
		<?php 
		}

$data1 = mysqli_query($conn,"select sum(saldo) as totalnya from login");
$dw = mysqli_fetch_array($data1);

		?>
			<tr>
				<td></td>
			
			
				
				<td>Total</td>
<td>Rp.<?php echo format_rupiah ($dw['totalnya']); ?></td>
	
					
		</tr>


	</table>
				

<br> <br>

<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[0] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[2];
}
?>
<?php

setlocale(LC_ALL, 'id-ID', 'id_ID');
?>





</body>

</html>






