<?php 
$id = $_POST['id_order'];
$id_de = $_POST['id_detail'];
include '../dbconnect.php';


$data3 = mysqli_query($conn, "SELECT * FROM tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid join produk ON tb_detail_order.idproduk = produk.idproduk WHERE tb_detail_order.id_detail_order = '$id_de'");

$row1 = mysqli_fetch_array($data3);
$uid = $row1['userid'];
$hapus = $row1['pembelian'] * $row1['harga_pesanan'];
$saldo = $row1['saldo'] + $hapus;
$produk = $row1['namaproduk'];


	$pesan = "Mohon maaf, produk ";
		$pesan2 = $produk;
		$pesan3 = "sedang kosong. Saldo anda kembali sejumlah :";
		$pesan5 = $hapus;
$pesan4= $pesan . ' ' . $pesan2. ' ' .$pesan3.' ' .$pesan5;

		$tgl = date("d.m.Y");
		
		$query1 = "INSERT INTO `notif` (`id_notif`, `pesan`, `tanggal`, `userid`, `status`) VALUES (NULL, '$pesan4', '$tgl', '$uid', 'belum')";
		$sql1 = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query


$result = mysqli_query($conn, "DELETE FROM `tb_detail_order` WHERE `tb_detail_order`.`id_detail_order` = '$id_de'");

		$sql4 = mysqli_query($conn, "UPDATE `login` SET `saldo` = '$saldo' WHERE `login`.`userid` = '$uid'");

$data4 = mysqli_query($conn, "SELECT * FROM tb_order join login on tb_order.userid=login.userid WHERE tb_order.id_order = '$id'");

$row2 = mysqli_fetch_array($data4);
$saldonow = $row2['saldo'];
$kekurangan = $row2['kurang'];

if ($saldonow > 0) {
	if ($kekurangan > 0) {
$minus = $row2['kurang'] - $hapus;
$total_bayar = $row2['total_bayar'] - $hapus;
if($minus < 0){
    $minus_now = str_replace("-","",$minus);
    $sql7 = mysqli_query($conn, "UPDATE `tb_order` SET `kelebihan` = '$minus_now' WHERE `tb_order`.`id_order` = '$id'");
}else{
    $minus_now = str_replace("-","",$minus);
    $sql7 = mysqli_query($conn, "UPDATE `tb_order` SET `kekurangan` = '$minus_now WHERE `tb_order`.`id_order` = '$id'");
}



} else {
$total_bayar = $row2['total_bayar'] - $hapus;
$plus = $row2['kelebihan'] + $hapus;
$sql7 = mysqli_query($conn, "UPDATE `tb_order` SET `kelebihan` = '$plus' WHERE `tb_order`.`id_order` = '$id'");

}

} else {
	$sql7 = mysqli_query($conn, "UPDATE `tb_order` SET `kekurangan` = '$hapus' WHERE `tb_order`.`id_order` = '$id'");
	$plus = $row2['kelebihan'] + $hapus;
    $sql7 = mysqli_query($conn, "UPDATE `tb_order` SET `kelebihan` = '$plus' WHERE `tb_order`.`id_order` = '$id'");
}
		


$cak=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where tb_order.id_order = '$id'");
 $p=mysqli_fetch_array($cak);
 $nohp = $p['notelp'];
 $no = substr($nohp,1);
 
 echo '<script language="javascript">
              alert ("Pesanan Terkirim");
              window.location="https://api.whatsapp.com/send?phone=62'.$no.'&text=Assalamu%27alaikum%20warahmatullah%20%5E_%5E%0D%0A%0D%0AAfwan%20Jiddan,Pesanan%20Dengan%20Id%20Order%20'.$id.'%20Produk%20'.$pesan2.'Sedang Kosong%20Saldo%20anda%20kembali%20sejumlah%20'.$pesan5.'%20Jazzakumullahu%20Khairan.%0D%0A%0D%0ATerimakasih%20telah%20menunggu%20verifikasi%20pesanan%20dari%20kami.%0D%0A%0D%0AMohon%20maaf%20apabila%20membuat%20bapak%2Fibu%20menunggu.";
              </script>';


$data1 = mysqli_query($conn, "SELECT * FROM tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid WHERE tb_detail_order.id_order = '$id'");

$roww = mysqli_num_rows($data1);
if ($roww == NULL) {
	$data6 = mysqli_query($conn, "SELECT * FROM tb_order join login on tb_order.userid=login.userid WHERE tb_order.id_order = '$id'");

$row7 = mysqli_fetch_array($data6);
$masukin_saldo = $row7['ongkir'] + $row7['saldo'];
	$sql4 = mysqli_query($conn, "UPDATE `login` SET `saldo` = '$masukin_saldo' WHERE `login`.`userid` = '$uid'");
	$result = mysqli_query($conn, "DELETE FROM `tb_order` WHERE `id_order`= '$id_de'");
}

		
	
		
?>
