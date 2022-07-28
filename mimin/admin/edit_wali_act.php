<?php
include '../dbconnect.php';


if(isset($_POST["addproduct2"])) {
        $id = $_POST['userid'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$email = $_POST['email'];
		$no_telp = $_POST['no_telp'];
		$pass = $_POST['pass'];
		
	

			  $query = "UPDATE `login` SET `namalengkap` = '$nama', `email` = '$email', `password` = '$pass', `notelp` = '$no_telp', `alamat` = '$alamat', `lastlogin` = NULL WHERE `login`.`userid` = '$id'";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			  echo "<meta http-equiv='refresh' content='1; url= customer.php'/>  ";
			  
		}

		?>