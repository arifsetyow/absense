<?php
include '../dbconnect.php';
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Pegawai.xls");
?>

<!DOCTYPE html>
<html>
<body>
<?php 
											$brgs=mysqli_query($conn,"select * from tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid join produk on tb_detail_order.idproduk=produk.idproduk group by produk.idproduk DESC");
											$no=1;
											while($p=mysqli_fetch_array($brgs)){
												?>
	<table border="1">
		<tr>
												<th>No</th>
												<th>Produk</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Total</th>
												
											</tr>
		<tr>
													<td><?php echo $p['id_order'] ?></td>
													<td><?php echo $p['namaproduk'] ?></td>
													<td><?php echo $p['total_item'] ?></td>
													<td>Rp<?php echo number_format($p['hargaafter']) ?></td>
													<td>Rp<?php
													$acb = $p['total_item'] * $p['hargaafter'];

													 echo number_format($acb) ?></td>
													
												</tr>
	</table>
	<?php 
}

	?>

</body>


</html>
