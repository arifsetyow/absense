<?php
	include '../dbconnect.php';

if(isset($_POST["addproduct"])) {
		$nama=$_POST['nama'];
			$alamat=$_POST['alamat'];
				$email=$_POST['email'];
					$no_telp=$_POST['no_telp'];
						$pass=$_POST['password'];
					
			  $query = "INSERT INTO `login` (`userid`, `namalengkap`, `email`, `password`, `notelp`, `alamat`, `tgljoin`, `role`, `lastlogin`, `saldo`) VALUES (NULL, '$nama', '$email', '$pass', '$no_telp', '$alamat', CURRENT_TIMESTAMP, 'Member', NULL, '')";

			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			
			
		}
		
		?>