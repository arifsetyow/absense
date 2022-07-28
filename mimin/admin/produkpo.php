<?php 

	session_start();
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}

	include '../dbconnect.php';
			
	if(isset($_POST["addproduct"])) {
		$namaproduk=$_POST['namaproduk'];
	
		$stok='1000';
		$rate= '5';
		$hargabefore=$_POST['hargabefore'];
		$hargaafter=$_POST['hargaafter'];
		$hari=$_POST['hari'];
		$rand = rand();
		$waktu = time();
		$kode_saldo = "$id_santri$waktu";
		
		
		if(!empty($_FILES["uploadgambar"]["tmp_name"])){
		$fileinfo=PATHINFO($_FILES["uploadgambar"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["uploadgambar"]["tmp_name"],"../produk/" . $newFilename);
		$location= $newFilename;
	
			
			  $query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, hari, stok, kode_brg, status_po)
			  values('1020304050','$namaproduk','$location','
			  ','$rate','$hargabefore','$hargaafter', '$hari', '$stok', '$kode_saldo', 'ya')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			
			}else{
			     $query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, hari, stok, kode_brg, status_po)
			  values('1020304050','$namaproduk','','
			  ','$rate','$hargabefore','$hargaafter', '$hari', '$stok', '$kode_saldo', 'ya')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			}
		}

		if(isset($_POST["hapus"])) {
		$kode_brg=$_POST['kode_brg'];
		
			
			  $query = "UPDATE produk set idkategori = '0000', status_po = 'no' WHERE idproduk = '$kode_brg'";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
		
			
			}
		
			
	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Produk - Tokopekita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
	<!-- Start datatable css -->
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
	
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
  
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                       <?php
                        $abc = $_SESSION['tugas'];
                          if ($abc !== 'super'){
	?>
	 <ul class="metismenu" id="menu">
							<li><a href="index1.php"><span>Home</span></a></li>
							<li><a href="../"><span>Kembali ke Toko</span></a></li>
								<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                   <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk Harian</a></li>
                                     <li class="active"><a href="produkpo.php">Produk PO</a></li>
                                     <li><a href="promo.php">Kelola Promo</a></li>
								
                                </ul>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
	
	
	<?php
	
} else {
    
    ?>
    <ul class="metismenu" id="menu">
                            <li><a href=""><span>Home</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                            
                            <style>

.notification {
  background-color: #555;
  color: white;
  text-decoration: none;
  padding: 15px 26px;
  position: relative;
  display: inline-block;
  border-radius: 2px;
  width :90%;
}

.notification:hover {
  background: red;
}

.notification .badge {
  position: absolute;
  top: -10px;
  right: -10px;
  padding: 5px 10px;
  border-radius: 50%;
  background-color: red;
  color: white;
}
</style>


                           
                            <li>
                                <?php 
                             $ab1=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where saldo.verifikasi = '' group by saldo.id_saldo DESC");
                                 $ab2=mysqli_num_rows($ab1);
                                 
                                 $ab3=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid where metode = 'transfer' AND status !='batal' AND verifikasi = '' order by tb_order.id_order DESC");
                                 $ab4=mysqli_num_rows($ab3);
                                 
                                 $ab5=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid where verifikasi = 'SUDAH' AND status = 'Diproses' order by tb_order.id_order DESC");
                                 $ab6=mysqli_num_rows($ab5);
                                 
                                 $ab7=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid where metode = 'transfer' AND status !='batal' order by tb_order.id_order DESC");
                                 $ab8=mysqli_num_rows($ab7);
                                 
                                 
                                ?>
                                
                                <a href="adm_super.php"><i class="ti-dashboard"></i><span>Kelola Saldo</span><span class="badge" style="color:red;"><?php echo $ab2;?></span></a>
                            </li>
                            
                          <li>
                                <a href="adm_super2.php"><i class="ti-dashboard"></i><span>Pesanan Transfer</span><span class="badge" style="color:red;"><?php echo $ab4;?></span></a>
                            </li>
                               <li>
                                <a href="adm_super3.php"><i class="ti-dashboard"></i><span>Semua Pesanan</span><span class="badge" style="color:red;"><?php echo $ab6;?></a>
                            </li>
                            <li>
                                <a href="adm_super4.php"><i class="ti-dashboard"></i><span>Rekapan Belanja</span></a>
                            </li>
                            <!--
                             <li>
                                <a href="kelola_cod.php"><i class="ti-dashboard"></i><span>Kelola Pesanan COD</span></a>
                            </li>
                            -->
                            	<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                   <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk Harian</a></li>
                                     <li class="active"><a href="produkpo.php">Produk PO</a></li>
                                     <li><a href="promo.php">Kelola Promo</a></li>
								
                                </ul>
                            </li>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
                        </ul>
    
    <?php
	
}
?>
                       
						
                            
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li><h3><div class="date">
								<script type='text/javascript'>
								if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
						<!--
						var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
						var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
						var date = new Date();
						var day = date.getDate();
						var month = date.getMonth();
						var thisDay = date.getDay(),
							thisDay = myDays[thisDay];
						var yy = date.getYear();
						var year = (yy < 1000) ? yy + 1900 : yy;
						document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);		
						//-->
						</script></b></div></h3>

						</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                            <div class="w3-container">
                                    <form method="get">
            <div class="input-daterange">
            <label><strong>Filter Jadwal Hari PreOrder</strong></label>
            <br>
           <select name="jurusan" class="w3-select" style="width :30%;">

    <option <?php 
     $id_kat = $_GET['jurusan'];
    if ($id_kat == 'kamis') { echo 'selected'; }?> value="kamis">Kamis</option>
    <option <?php 
 
    if ($id_kat == 'jumat') { echo 'selected'; }?> value="jumat">Jum'at</option>

</select>
            <input type="submit" class="w3-btn w3-card w3-orange w3-text-white" value="FILTER">
        </form>
              <form method="get">
                  <input type="hidden" name="tampilkan">
            <div class="input-daterange">
                
                <br>
            <label><strong>Tampilkan Semua Produk</strong></label>
            <br>
            <input type="submit" class="w3-btn w3-card w3-green" value="TAMPILKAN">
        </form>
    </div><br>
    </div>
                                <div class="d-sm-flex justify-content-between align-items-center">
									<h2>Daftar Produk</h2>
									<button style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="btn btn-info col-md-2">Tambah Produk</button>
                                </div>
                                    <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
											    <th>Nama Produk</th>
											    <th>Status</th>
											   
											    <th>Harga</th>
											    	<th>Simpan Perubahan</th>
											    		<th>Edit</th>
												<th>Aktif/Nonaktifkan</th>
												<!--
												<th>Aktif/Nonaktifkan</th>
											-->
												
											
											</tr></thead><tbody>
											<?php 
											function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
  if(isset($_GET['jurusan'])){
  $id_kat = $_GET['jurusan'];

  $brgs=mysqli_query($conn,"SELECT * from produk join kategori on produk.idkategori=kategori.idkategori where produk.idkategori = '1020304050' AND hari = '$id_kat' order by idproduk DESC");
  }elseif(isset($_GET['tampilkan'])) {
    $brgs=mysqli_query($conn,"SELECT * from produk where idkategori = '1020304050' order by idproduk DESC");
  }else{
        $brgs=mysqli_query($conn,"SELECT * from produk where idkategori = '1020304050' order by idproduk DESC");
  }
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
												
													<td><a href="riwayat_update.php?id=<?php echo $p['idproduk']; ?>"target="_blank"><?php echo $p['namaproduk']?></a></td>
														<td>	<?php 
							$status = $p['status_po'];
							if ($status == 'no'){
							    echo "Tidak Aktif";
							} else {
							    echo "Aktif";
							}
							    
							    ?></td>
														<form action="simpan.php" method="post" target="_blank">
														   <input type="hidden" name="kode_brg" value="<?php echo $p['idproduk']; ?>">
													
														<td><input style="  width: 80%; text-align: center;" type="text" name="harga" value="<?php echo rupiah($p['hargaafter']) ?>"></td><td>
														<input type="submit" name="simpan" value="simpan" class="w3-card w3-button w3-green w3-text-white"></td>
														
														</form>
<td>
													   <a class="w3-card w3-button w3-orange w3-text-white" href="edit_produk.php?id=<?php echo $p['idproduk']; ?>"target="_blank">Edit</a>
													    <!-- <form action="edit_produk.php" method="post">
									<input type="hidden" name="kode_brg" value="<?php echo $p['idproduk']; ?>">
									
									<input type="submit" name="edit" value="EDIT" class="w3-card w3-button w3-orange w3-text-white">
								</fieldset>
							</form> 
							--> </td>
							
							<!--
								    	<td> <a class="w3-card w3-button w3-red w3-text-white" onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="hapus_produk.php?id=<?php echo $p['idproduk']; ?>">Hapus</a>
							-->
							</td>
							<?php 
							$status = $p['status_po'];
							if ($status == 'no'){
							    ?>
							 
							    	<td> <a class="w3-card w3-button w3-green w3-text-white" href="aktif_po.php?id=<?php echo $p['idproduk']; ?>&status=ya" >Aktif</a></td>
							  
							    <?php 
							}else {
							    ?>
							    		  
							    	<td> <a class="w3-card w3-button w3-red w3-text-white" href="aktif_po.php?id=<?php echo $p['idproduk']; ?>&status=no" >Non Aktifkan</a></td>
						
							    <?php
							}
							?>
						
													
							
													
												</tr>		
												
												<?php 
											}
											
												
											
		
											?>
										</tbody>
										</table>

                                    </div>
								 </div>
                            </div>
                        </div>
                    </div>
                </div>
              
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
        =
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	<!-- modal input -->
			<div id="myModal" class="modal fade">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title">Tambah Produk</h4>
						</div>
						
						<div class="modal-body">
						<form action="produkpo.php" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Produk</label>
									<input name="namaproduk" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Hari ( Khusus untuk menu pre order ) </label>
									<select name="hari" class="form-control">
									<option selected>Pilih Hari</option>
								
										<option value="kamis">Kamis</option>
										<option value="jumat">Jum'at</option>
										
									</select>
									
								</div>
							<div class="form-group">
									<label>Harga</label>
									<input name="hargaafter" type="number" class="form-control">
								</div>
								<div class="form-group">
									<label>Gambar</label>
									<input name="uploadgambar" type="file" class="form-control">
								</div>

							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
								<input name="addproduct" type="submit" class="btn btn-primary" value="Tambah">
							</div>
						</form>
					</div>
				</div>
			</div>




	
	<script>
	$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	</script>
	
	<!-- jquery latest version -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>
		<!-- Start datatable js -->
	 <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
</body>
</html>
