<?php 
include '../dbconnect.php';

if(isset($_POST["kirim"])) {
		$id_kategori=$_POST['id_order'];
       
		  $query = "DELETE FROM `pembayaran` WHERE `pembayaran`.`no` = '$id_kategori'";
		$sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
		echo "berhasil";
			  
echo "
		<meta http-equiv='refresh' content='1; url= pembayaran.php'/>  ";

}

?>