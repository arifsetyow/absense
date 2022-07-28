<?php 
include '../dbconnect.php';


if(isset($_POST["kirim"])) {
$id = $_POST['userid'];
$id_order = $_POST['id_order'];

 $brgs=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);

$query1 = "UPDATE `tb_order` SET `verifikasi` = 'SUDAH' WHERE `tb_order`.`id_order` = '$id_order'";
$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		
		echo "berhasil";
			  
echo '<script language="javascript">
              alert ("Pesanan Telah Diverifikasi");
              window.location="adm_super2.php";
              </script>';

}else if(isset($_POST["tolak"])) {
$id = $_POST['userid'];
$id_order = $_POST['id_order'];

 $brgs=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);

$query1 = "UPDATE `tb_order` SET `verifikasi` = 'DITOLAK', `status` = 'DITOLAK' WHERE `tb_order`.`id_order` = '$id_order'";
$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query

	$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		$pesan = "Transaksi Transfer sejumlah";
		$pesan2 = $p['jumlah'];
		$pesan3 = "Tidak sah";
		
$pesan4= $pesan . ' ' . $pesan2. ' ' .$pesan3;

		$tgl = date("d.m.Y");
		
		$query1 = "INSERT INTO `notif` (`id_notif`, `pesan`, `tanggal`, `userid`, `status`) VALUES (NULL, '$pesan4', '$tgl', '$id', 'belum')";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
		
		echo "berhasil";
			  
echo '<script language="javascript">
              alert ("Pesanan Telah Ditolak");
              window.location="adm_super2.php";
              </script>';
    
    
}

elseif(isset($_POST["cod"])) {
$id = $_POST['userid'];
$id_order = $_POST['id_order'];

 $brgs=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);

$query1 = "UPDATE `tb_order` SET `verifikasi` = 'SUDAH' WHERE `tb_order`.`id_order` = '$id_order'";
$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
        
        echo "berhasil";
              
echo '<script language="javascript">
              alert ("Pesanan Telah Diverifikasi");
              window.location="kelola_cod.php";
              </script>';

}elseif(isset($_POST["chat"])) {
    
 $id = $_POST['userid'];
 $brgs=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where login.userid = '$id'");
 $p=mysqli_fetch_array($brgs);
 $nohp = $p['notelp'];
 $no = substr($nohp,1);

echo '<script language="javascript">
              window.location="https://api.whatsapp.com/send?phone=62'.$no.'&text=Assalamu%27alaikum%20warahmatullah%20%5E_%5E%0D%0A%0D%0A";
              </script>';
}

?>