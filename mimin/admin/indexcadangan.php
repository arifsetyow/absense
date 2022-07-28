<?php
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
?>
			
	
			<p>
				<Strong>Data Walisantri</strong>
					<br><br>
					<a class="btn btn-success pull-left" style="margin-bottom:2%;" href="index.php">Kembali</a>

				<a class="btn btn-primary pull-right" style="margin-bottom:2%;" href="form_siswa.html">Tambah</a>
			</p>
			<table class="table table-striped">
				<tr>
					<th>
						No 
					</th>
					<th>
						Nama Walisantri
					</th>
					<th>
						Nama Santri
					</th>
					
					<th>
						Angkatan
					</th>
					<th>
						Kelas
					</th>
					<th>
						Asrama
					</th>
					<th>
						Lokasi
					</th>

					<th>
						Nomor Telepon
					</th>
					<th>
						Opsi
					</th>
				</tr>
					<?php
						$no = 1;
						$data = mysqli_query ($koneksi, " select *
																
														  from 
														  siswa 
														  order by id_siswa DESC");
						while ($row = mysqli_fetch_array ($data))
						{
					?>
				<tr>
					<td>
						<?php echo $no++; ?>
					</td>
					<td>
						<?php echo $row['nama']; ?>
					</td>
					<td>
						<?php echo $row['alamat']; ?>
					</td>
					<td>
						<?php echo $row['angkatan']; ?>
					</td>
					<td>
						<?php echo $row['kelas']; ?>
					</td>
					<td>
						<?php echo $row['asrama']; ?>
					</td>
					<td>
						<?php echo $row['lokasi_santri']; ?>
					</td>
					<td>
						<?php echo $row['telepon']; ?>
					</td>
					
					<td>
						<a href="edit_siswa-<?php echo $row['id_siswa']; ?>.html">Edit</a> |
						<a href="hapus_siswa-<?php echo $row['id_siswa']; ?>.html">Hapus</a>
					</td>
				</tr>
				<?php
					}
				?>
			</table>