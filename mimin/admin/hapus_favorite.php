<?php
session_start();
	include '../dbconnect.php';

		$kode_brg=$_GET['id'];
		
			
			  $query = "DELETE FROM favorite WHERE id_favorite = '$kode_brg'";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
		
			
echo $kode_brg;


			
			
			?>
			
			<?php

    echo '<script> history.back(); </script>';

?>