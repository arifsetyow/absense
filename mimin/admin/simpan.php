<?php
session_start();
include "../koneksi.php";


		$kode_brg=$_POST['kode_brg'];
		$test=$_POST['harga'];
        $hargaafter = preg_replace("/[^0-9]/", "", $test);
		$stok=$_POST['stok'];
		$tanggal=date('d-m-Y');
		
       
			 $query = "UPDATE produk SET hargaafter = '$hargaafter', stok = '$stok', tgldibuat='$tanggal' WHERE idproduk = '$kode_brg'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());

	 


?>

<script>
    window.close();
</script>
