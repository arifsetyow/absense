<?php
session_start();
include "../koneksi.php";

$id = $_POST['id_admin'];
$query = "DELETE FROM admin 
							WHERE id_admin ='$id'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
$_SESSION['pesan'] = 'Hapus Data Berhasil...';
header('location:index.php');

?>

