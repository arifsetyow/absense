<?php 
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
	    	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Saldo Walisantri.xls");
	}else{
	    
	}



	?>

	<br>
	<br>

	
	<center>
		<h1>Laporan Belanja Santri <?php echo $pok;?></h1>
	</center>

<table id="myTable">
  <tr> <th>
							No
						</th>
<th width="100%" >Tanggal</th>	
				<th width="20%">Santri</th>
					<th width="20%">Kelas</th>
				<th width="20%">Total Belanja</th>
				<th width="30%">Ongkir</th>
				
     
			</tr>
		<?php
		
		// koneksi database
		$no = 1;

		// menampilkan data pegawai

	$bulan=$_POST['bulan'];
	$a = $_POST["start_date"];
	$b = $_POST["end_date"];
	$awal = date('d-m-Y', strtotime($a));
	$akhir = date('d-m-Y', strtotime($b));
	$c = $_POST["bulan"];

	

				$data = mysqli_query($conn,"SELECT * FROM tb_order
 WHERE tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
  AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
 ORDER BY `tb_order`.`id_order` ASC;");
	while($d = mysqli_fetch_array($data)){
				?>
				<tr>
				<td><?php echo $no++; ?></td>
<td><?php echo $d['tgl_transaksi']; ?></td>
					<td><?php echo $d['santri_pesan']; ?></td>
					<td><?php echo $d['kelas_pesan']; ?>&nbsp;<?php echo $d['jenjang_pesan']; ?></td>
					<td>Rp.<?php echo format_rupiah ($d['total_belanja']);?></td>
					<td>Rp.<?php echo format_rupiah ($d['ongkir']); ?></td>
					
		</tr>
		<?php 
		}

$data1 = mysqli_query($conn,"select sum(ongkir) as jastipnya, sum(total_belanja) as belanjanya from tb_order WHERE tgl_transaksi >= '$awal' AND tgl_transaksi <= '$akhir' AND bulan = '$bulan' AND status = 'DITERIMA' AND tb_order.jkl = '$jkl' order by id_order DESC");
$dw = mysqli_fetch_array($data1);

		?>
			<tr>
				<td></td>
				<td></td>
				<td></td>
				
				<td>Total</td>
<td>Rp.<?php echo format_rupiah ($dw['belanjanya']); ?></td>
					<td>Rp.<?php echo format_rupiah ($dw['jastipnya']); ?></td>
					
		</tr>


	</table>
				

<br> <br>


<!-- ---------------- TABEL
	<center>
		<h1>Laporan Rekap Saldo Walisantri</h1>
	</center>

<table id="myTable">
  <tr> <th>
							No
						</th>
<th width="100%" >Tanggal Input</th>	
				<th width="20%">Walisantri</th>
			  <th width="20%">Santri</th>
			  <th width="20%">Nomor WA</th>
				<th width="20%">Saldo Diterima</th>
				<th width="20%">Belanja</th>
				<th width="30%">Total Jastip</th>
				<th width="30%">Sisa Saldo</th>
     
			</tr>
		<?php
		/* -------------------------------- PHP PERTAMA  
		// koneksi database
		$no = 1;

		// menampilkan data pegawai


				$data = mysqli_query($koneksi,"select tabungan.id_tabungan,
                                  tabungan.id_siswa,
                                  tabungan.setoran,
                                  tabungan.penarikan,
                                  tabungan.saldo,
                                  tabungan.jastip,
                                  tabungan.foto,
tabungan.tanggal,
                                  sum(tabungan.penarikan) as jumlah_penarikan,
                                  sum(tabungan.setoran) as jumlah_setoran,
                                  sum(tabungan.jastip) as jastipnya,
                                  sum(tabungan.saldo) AS jumlah_saldo,
                                
                                  
                                  siswa.id_siswa,
                                  siswa.nama,
                                  siswa.jenis_kelamin,
                                  siswa.alamat,
                                  siswa.telepon,
siswa.kelas
                                    
                                  from 
                                  siswa, tabungan
  WHERE tabungan.id_siswa = siswa.id_siswa AND tanggal >= '$awal' 
  AND tanggal <= '$akhir' 
  group by tabungan.id_siswa ORDER BY tabungan.tanggal DESC");
	while($d = mysqli_fetch_array($data)){
				?>
				<tr>
				<td><?php echo $no++; ?></td>
<td><?php echo $d['tanggal']; ?></td>
						<td><?php echo $d['nama']; ?></td>
					<td><?php echo $d['alamat']; ?></td>
					<td><?php echo "62"+$d['telepon']; ?></td>
					<td>Rp.<?php echo format_rupiah($d['jumlah_setoran']); ?></td>
					<td>Rp.<?php echo format_rupiah($d['jumlah_penarikan']); ?></td>
					<td>Rp.<?php echo format_rupiah($d['jastipnya']); ?></td>
					<td>Rp.<?php echo format_rupiah($d['jumlah_setoran'] - $d['jumlah_penarikan'] - $d['jastipnya'] ); ?></td>
		</tr>
		<?php 
		}
		?>


	</table>
				<?php 

$data2 = mysqli_query ($koneksi, "select 
																  
																  sum(tabungan.penarikan) as jumlah_penarikan,
																  sum(tabungan.setoran) as jumlah_setoran,
																  sum(tabungan.jastip) as jumlah_jastip,
																  sum(tabungan.saldo) AS jumlah_saldo
																
																  from 
																  tabungan WHERE tanggal >= '$awal' 
  AND tanggal <= '$akhir' ");
$row2 = mysqli_fetch_array ($data2);




				?>
<br>

				<table class="table">
				<tr>
					<td style="width:10%;">
						Jumlah Transfer Walisantri
					</td>
					<td>
						: <td>Rp.<?php echo format_rupiah($row2['jumlah_setoran']); ?></td>
					</td>
				</tr>
				<tr>					
					<td>
						Jumlah Belanja Walisantri
					</td>
					<td>
						: <td>Rp.<?php echo format_rupiah($row2['jumlah_penarikan']); ?></td>
					</td>
				</tr>
				<tr>		
					<td>
						Total Jasa Titip
					</td>
					<td>
						: <td>Rp.<?php echo format_rupiah($row2['jumlah_jastip']); ?></td>
					</td>
				</tr>
					<tr>		
					<td>
						Sisa Saldo Walisantri
					</td>
					<td>
						: <td>Rp.<?php echo format_rupiah($row2['jumlah_setoran'] - $row2['jumlah_penarikan'] - $row2['jumlah_jastip']); ?></td>
					</td>
				</tr>

			</table>

<br> <br>
*/
?>
-->
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

<center>
		<h4>LAPORAN BAGI HASIL KOPERASI ONLINE</h4> 
		<h4>JARDAH MAKMUR</h4>
	</center>
	<br>
	<div class="w3-container w3-border w3-large">
    <div class="w3-left-align">Laporan Dibuat Oleh&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; Periode :  <?php echo strftime("%B %Y"); ?>     <br> 
    Nama : Safira Pramitha Sahara &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; Tanggal : <?php echo tgl_indo($awal);?><br>  
    Divisi&nbsp; : Jardah Makmur&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo tgl_indo ($akhir);?>&nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
   
  </div>
</div>

<table id="myTable">
	 <thead>
  <tr> 
<th>No</th>
				<th>Keterangan</th>
<th>Tarif Ongkir</th>
			  <th>Quantity</th>
		     <th>Jumlah</th>

			</tr>
			</thead>

<?php

function penyebut($nilai) {
	$nilai = abs($nilai);
	$huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
	$temp = "";
	if ($nilai < 12) {
		$temp = " ". $huruf[$nilai];
	} else if ($nilai <20) {
		$temp = penyebut($nilai - 10). " belas";
	} else if ($nilai < 100) {
		$temp = penyebut($nilai/10)." puluh". penyebut($nilai % 10);
	} else if ($nilai < 200) {
		$temp = " seratus" . penyebut($nilai - 100);
	} else if ($nilai < 1000) {
		$temp = penyebut($nilai/100) . " ratus" . penyebut($nilai % 100);
	} else if ($nilai < 2000) {
		$temp = " seribu" . penyebut($nilai - 1000);
	} else if ($nilai < 1000000) {
		$temp = penyebut($nilai/1000) . " ribu" . penyebut($nilai % 1000);
	} else if ($nilai < 1000000000) {
		$temp = penyebut($nilai/1000000) . " juta" . penyebut($nilai % 1000000);
	} else if ($nilai < 1000000000000) {
		$temp = penyebut($nilai/1000000000) . " milyar" . penyebut(fmod($nilai,1000000000));
	} else if ($nilai < 1000000000000000) {
		$temp = penyebut($nilai/1000000000000) . " trilyun" . penyebut(fmod($nilai,1000000000000));
	}     
	return $temp;
}

function terbilang($nilai) {
	if($nilai<0) {
		$hasil = "minus ". trim(penyebut($nilai));
	} else {
		$hasil = trim(penyebut($nilai));
	}     		
	return $hasil;
}


$data1 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 10000 AND tgl_transaksi >= '$awal' 
  AND tgl_transaksi <= '$akhir' 
  AND bulan = '$bulan'
   AND status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by id_order DESC
  ");
  $b = mysqli_fetch_array($data1);
?>
 <tbody>
<tr>
				
<td>1</td>
<td>Order Kurang Dari 100.000</td>
                                        <td>10.000</td>
                                       <td><?php echo format_rupiah($b['jangkrik']); ?></td>
                                       
<td><?php 
$aw = '10000';
$wa = $b['jangkrik'];
$abc = $aw * $wa;

$_SESSION['a'] = $abc; 
?>
	
	Rp.<?php echo format_rupiah($abc); ?>
</td>
</tr>

<tr>
<td>2</td>

<?php 
$data2 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 20000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
   AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b2 = mysqli_fetch_array($data2);

?>

					<td>Order 100.000 < 200.000</td>
					<td>20.000</td>
					<td><?php echo $b2['jangkrik']; ?></td>
                                       <td><?php 
$aw = '20000';
$wa = $b2['jangkrik'];
$abc = $aw * $wa;
$_SESSION['b'] = $abc;

?>
	Rp.<?php echo format_rupiah($abc); ?>
</td>

					
</tr>
<tr>
	<td>3</td>

	<?php 
$data3 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 25000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
   AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b3 = mysqli_fetch_array($data3);

?>
					<td>Order 200.000 < 300.000</td>
<td>25.000</td>
					<td><?php echo $b3['jangkrik']; ?></td>
<td><?php 
$aw = '25000';
$wa = $b3['jangkrik'];
$abc = $aw * $wa;
$_SESSION['c'] = $abc;

?>
	Rp.<?php echo format_rupiah($abc); ?>
</td>


</tr>
<tr>

<?php 
$data4 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 27000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
   AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b4 = mysqli_fetch_array($data4);

?>
	<td>4</td>
					<td>Order 300.000 < 400.000</td>
					<td>27.000</td>

					<td><?php echo $b4['jangkrik']; ?></td>
					<td><?php 
$aw = '27000';
$wa = $b4['jangkrik'];
$abc = $aw * $wa;
$_SESSION['d'] = $abc;

?>
	Rp.<?php echo format_rupiah($abc); ?>
</td>

</tr>
<tr>
	<td>5</td>

	<?php 
$data5 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 30000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
   AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b5 = mysqli_fetch_array($data5);

?>
					<td>Order 400.000 < 500.000</td>
					<td>30.000</td>
					<td><?php echo $b5['jangkrik']; ?></td>
							<td><?php 
$aw = '30000';
$wa = $b5['jangkrik'];
$abc = $aw * $wa;
$_SESSION['e'] = $abc;

?>
	Rp.<?php echo format_rupiah($abc); ?>
</td>
</tr>
<tr>
	<td>6</td>
	<?php 
$data6 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 32000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
   AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
   AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b6 = mysqli_fetch_array($data6);

?>
					<td>Order 500.000 < 600.000</td>
<td>32.000</td>
					<td><?php echo $b6['jangkrik']; ?></td>
					<td><?php 
$aw = '32000';
$wa = $b6['jangkrik'];
$abc = $aw * $wa;
$_SESSION['f'] = $abc;

?>
	
	Rp.<?php echo format_rupiah($abc); ?>
</td>
</tr>
<tr>
	<td>7</td>
	<?php 
$data7 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik from tb_order
  WHERE ongkir = 35000 AND tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
  AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
  AND tb_order.type = '1'
  order by tb_order.id_order DESC
  ");
  $b7 = mysqli_fetch_array($data7);

?>
					<td>Order 600.000 < 1.000.000</td>
<td>35.000</td>
					<td><?php echo $b7['jangkrik']; ?></td>
							<td><?php 
$aw = '35000';
$wa = $b7['jangkrik'];
$abc = $aw * $wa;
$_SESSION['g'] = $abc;

?>
Rp.<?php echo format_rupiah($abc); ?>
							</tr>
							
							<tr>
	<td>8</td>
	<?php 
$data8 = mysqli_query($conn,"SELECT COUNT(ongkir) as jangkrik, SUM(ongkir) as ongkirnya from tb_order
  WHERE tb_order.tgl_transaksi >= '$awal' 
  AND tb_order.tgl_transaksi <= '$akhir' 
  AND tb_order.bulan = '$bulan'
  AND tb_order.status = 'DITERIMA' AND tb_order.jkl = '$jkl'
  AND tb_order.type = '2'
  ");
  $b8 = mysqli_fetch_array($data8);

?>
					<td>Peraturan Ongkir Terbaru</td>
<td align="right">20% & 18%</td>
					<td><?php echo $b8['jangkrik']; ?></td>
							<td><?php 

$abc = $b8['ongkirnya'];
$_SESSION['z'] = $abc;

?>
Rp.<?php echo format_rupiah($abc); ?>
							</tr>

		<!--				
	
<tr>
	<td>8</td>
	<?php 	/*	
$data8 = mysqli_query($koneksi," SELECT COUNT(tabungan.jastip) as jangkrik, SUM(tabungan.jastip) as total from tabungan join siswa on tabungan.id_siswa=siswa.id_siswa 
WHERE
tabungan.jenis = '20'
AND tanggal >= '$awal' 
  AND tanggal <= '$akhir' 
  AND tabungan.jastip > 0 AND bulan = '$bulan'
  ");
  $b8 = mysqli_fetch_array($data8);

?>
					<td>Peraturan Ongkir Terbaru</td>
<td align="right">20% & 18%</td>
					<td><?php echo $b8['jangkrik']; ?></td>
							<td><?php 

$abc = $b8['total'];
$_SESSION['z'] = $abc;

?>
Rp.<?php echo format_rupiah($abc); */?>
							</tr>
)
-->

							<br>
							<br>

							<tr>
<td></td>
<td></td>
<td>Laba Sebelum Bagi Hasil</td>
		<td></td>
<td><?php
$a1 = $_SESSION['a'];
$a2 = $_SESSION['b'];
$a3 = $_SESSION['c'];
$a4 = $_SESSION['d'];
$a5 = $_SESSION['e'];
$a6 = $_SESSION['f'];
$a7 = $_SESSION['g'];
$a8 = $_SESSION['z'];

$nana = $a1 + $a2 + $a3 + $a4 + $a5 + $a6 + $a7 + $a8 ;
$c = '12';
$d = '100';
$laba = $c / $d * $nana;
?>
	
	Rp.<?php echo format_rupiah($nana); ?>
</td>
</tr>	
<tr>
	<td></td>
	<td></td>
	
	
	<td><b>Bagi Hasil</b></td>
	<td><b>12%</b></td>
<td>				
Rp.<?php echo format_rupiah($laba); ?>
</td>	</tr>

<tr>
	<td></td>
	<td></td>
	
	
	<td><b>Laba Setelah Bagi Hasil</b></td>
	<td></td>
<td>				
Rp.<?php 
$kk = $nana - $laba;

echo format_rupiah($kk); 

?>
</td>	</tr>
		</tbody>



	

	</table>
		<span id="hasil"> 

		</span>

<br>
		
		<div class="w3-left-align">Bagi Hasil Sebesar : Rp.<?php echo format_rupiah($laba); ?> <?php ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <br>
    Terbilang : <?php echo terbilang($laba); ?> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  <br>  <br> 
    
   &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;Bantul, <?php echo strftime("%A, %d %B %Y"); ?>  &nbsp; 
    
    <p>Menyetujui &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Diperiksa&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;  &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;Dibuat Oleh &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mengetahui</p>
    <br>
  
   <br>
   <br>
       <p>Nafis Sulastri S.Pd &nbsp; &nbsp;  Ummu Hawa Minarni&nbsp; &nbsp;Safira Pramitha Sahara &nbsp; &nbsp; Nanik Irmawati </p>
  </div>





</body>

</html>






