<?php
session_start();
	include '../dbconnect.php';

		$kode_brg=$_GET['id'];
		
			
			  $query = "DELETE FROM promo WHERE id_promo = '$kode_brg'";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
		
			
echo $kode_brg;


			
			
			?>
			
			<?php

    echo '<script> window.close(); </script>';

?>