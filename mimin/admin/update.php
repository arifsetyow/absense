<?php
session_start();
include "../koneksi.php";

$id = $_POST['id_admin'];
$nama = $_POST['nama_admin'];
$level = $_POST['level'];
$nomor_wa = $_POST['nomor_wa'];
$username = $_POST['username'];
$password = $_POST['password'];


$query = "UPDATE admin SET
								nama_admin = '$nama',
								level = '$level',
								nomor_wa = '$nomor_wa',
								username = '$username',
								password = '$password'

								WHERE id_admin = '$id'
								";

mysqli_query($koneksi, $query)
or die ("Gagal Perintah SQL".mysql_error());
$_SESSION['pesan'] = 'Update data berhasil...';
header('location:index.php');

?>

