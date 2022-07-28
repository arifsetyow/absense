<?php 
include '../../koneksi.php';


if(isset($_POST["kirim"])) {
    session_start();
    $id_absen = $_POST['id_absen'];
	$query = "UPDATE `absen` SET `status` = 'checkin', `terlambat` = '1' WHERE `absen`.`id_absen` = '$id_absen';";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
	echo '<script language="javascript">
              alert ("Toleransi Berhasil DiACC");
			  history.back();
              </script>';

}elseif(isset($_POST["tolak"])){

	$id_absen = $_POST['id_absen'];
	$query = "UPDATE `absen` SET `status` = 'ditolak' WHERE `absen`.`id_absen` = '$id_absen';";
	$sql = mysqli_query($koneksi, $query); // Eksekusi/ Jalankan query dari variabel $query
	echo '<script language="javascript">
              alert ("Toleransi Ditolak");
			  history.back();
              </script>';
}

/*
		$saldo_awal = $p['saldo'];
		$id_saldo = $_POST['id_saldo'];
		$saldo_akhir =$_POST['saldo'];
		$saldo_final = rupiah($saldo_akhir);
		$saldo= $saldo_awal + $saldo_akhir;
       
		$query = "UPDATE `login` SET `saldo` = '$saldo' WHERE `login`.`userid` = '$id';";
		$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query

$query1 = "UPDATE `saldo` SET `verifikasi` = 'SUDAH' WHERE `saldo`.`id_saldo` = '$id_saldo'";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
			$pesan = "Saldo sejumlah";
		$pesan2 = rupiah($saldo_akhir);
		$pesan3 = "telah berhasil ditambahkan..";
		
$pesan4= $pesan . ' ' . $pesan2. ' ' .$pesan3;

		$tgl = date("d.m.Y");
		
		$query1 = "INSERT INTO `notif` (`id_notif`, `pesan`, `tanggal`, `userid`, `status`) VALUES (NULL, '$pesan4', '$tgl', '$id', 'belum')";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		
	
		

echo '<script language="javascript">
              alert ("Saldo Telah Ditambahkan");
              window.location="https://api.whatsapp.com/send?phone=62'.$no.'&text=Assalamu%27alaikum%20warahmatullah%20%5E_%5E%0D%0A%0D%0ASaldo%20sebesar%20'.$saldo_final.'%20telah%20berhasil%20ditambahkan%20ke%20akun%20toko%20online%20bapak/ibu.%0D%0A%0D%0ASelamat%20Berbelanja.%0D%0ASyukron%2C%20Jazzakumullahu%20Khairan.%0D%0A%0D%0ATerimakasih%20telah%20menunggu%20verifikasi%20saldo%20dari%20kami.%0D%0A%0D%0AMohon%20maaf%20apabila%20membuat%20bapak%2Fibu%20menunggu.";
              </script>';

}


}elseif(isset($_POST["ditolak"])) {
   $id = $_POST['userid'];

 $brgs=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);

		$saldo_awal = $p['saldo'];
		$id_saldo = $_POST['id_saldo'];
		$saldo_akhir =$_POST['saldo'];
		$saldo= $saldo_awal + $saldo_akhir;
		
    $query1 = "UPDATE `saldo` SET `verifikasi` = 'DITOLAK' WHERE `saldo`.`id_saldo` = '$id_saldo'";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		$pesan = "Saldo yang anda masukan sejumlah";
		$pesan2 = $p['jumlah'];
		$pesan3 = "Tidak sah";
		
$pesan4= $pesan . ' ' . $pesan2. ' ' .$pesan3;

		$tgl = date("d.m.Y");
		
		$query1 = "INSERT INTO `notif` (`id_notif`, `pesan`, `tanggal`, `userid`, `status`) VALUES (NULL, '$pesan4', '$tgl', '$id', 'belum')";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		
	
		
		echo "berhasil";
			  
echo '<script language="javascript">
              alert ("Transaksi Saldo Telah Ditolak");
              window.location="adm_super.php";
              </script>';
              
}elseif(isset($_POST["duplikat"])) {
   $id = $_POST['userid'];

 $brgs=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);

		$saldo_awal = $p['saldo'];
		$id_saldo = $_POST['id_saldo'];
		$saldo_akhir =$_POST['saldo'];
		$saldo= $saldo_awal + $saldo_akhir;
		
    $query1 = "UPDATE `saldo` SET `verifikasi` = 'DUPLIKAT' WHERE `saldo`.`id_saldo` = '$id_saldo'";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		$pesan = "Saldo yang anda masukan sejumlah";
		$pesan2 = $p['jumlah'];
		$pesan3 = "telah anda tambahkan sebelumnya";
		
$pesan4= $pesan . ' ' . $pesan2. ' ' .$pesan3;

		$tgl = date("d.m.Y");
		
		$query1 = "INSERT INTO `notif` (`id_notif`, `pesan`, `tanggal`, `userid`, `status`) VALUES (NULL, '$pesan4', '$tgl', '$id', 'belum')";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		
	
		
		echo "berhasil";
			  
echo '<script language="javascript">
              alert ("Transaksi Saldo Telah Ditolak");
              window.location="adm_super.php";
              </script>';
}elseif(isset($_POST["ulang"])) {
    
 $id = $_POST['userid'];
 $brgs=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);
 $nohp = $p['notelp'];
 $no = substr($nohp,1);
 
  function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
 
 	$saldo_awal = $p['saldo'];
		$id_saldo = $_POST['id_saldo'];
		$saldo_akhir =$_POST['saldo'];
		$saldo_final = rupiah($saldo_akhir);
		$saldo= $saldo_awal + $saldo_akhir;

echo '<script language="javascript">
             
              window.location="https://api.whatsapp.com/send?phone=62'.$no.'&text=Assalamu%27alaikum%20warahmatullah%20%5E_%5E%0D%0A%0D%0ASaldo%20sebesar%20'.$saldo_final.'%20telah%20berhasil%20ditambahkan%20ke%20akun%20toko%20online%20bapak/ibu.%0D%0A%0D%0ASelamat%20Berbelanja.%0D%0ASyukron%2C%20Jazzakumullahu%20Khairan.%0D%0A%0D%0ATerimakasih%20telah%20menunggu%20verifikasi%20saldo%20dari%20kami.%0D%0A%0D%0AMohon%20maaf%20apabila%20membuat%20bapak%2Fibu%20menunggu.";
              </script>';
}

*/
?>