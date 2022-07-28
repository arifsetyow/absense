<?php 
session_start();
include '../dbconnect.php';
$orderids = $_GET['id_order'];
date_default_timezone_set("Asia/Bangkok");

	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}


if(isset($_POST['kirim']))
	{
		$updatestatus = mysqli_query($conn,"update cart set status='Pengiriman' where orderid='$orderids'");
		$del =  mysqli_query($conn,"delete from konfirmasi where orderid='$orderids'");
		
		if($updatestatus&&$del){
			echo " <div class='alert alert-success'>
			<center>Pesanan dikirim.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
		}
		
	};

if(isset($_POST['selesai']))
	{
		$updatestatus = mysqli_query($conn,"update cart set status='Selesai' where orderid='$orderids'");
		
		if($updatestatus){
			echo " <div class='alert alert-success'>
			<center>Transaksi diselesaikan.</center>
		  </div>
		<meta http-equiv='refresh' content='1; url= manageorder.php'/>  ";
		} else {
			echo "<div class='alert alert-warning'>
			Gagal Submit, silakan coba lagi
		  </div>
		 <meta http-equiv='refresh' content='1; url= manageorder.php'/> ";
		}
		
	};

?>
 
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
	<link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Tokopekita - Pesanan <?php echo $p['namalengkap']; ?></title>
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
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	
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
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                            <ul class="metismenu" id="menu">
                            <li><a href=""><span>Home</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                              <li>
                                <?php 
                                 $ab1=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid join alamat on alamat.userid=login.userid where saldo.verifikasi = '' group by saldo.id_saldo DESC");
                                 $ab2=mysqli_num_rows($ab1);
                                 
                                 $ab3=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where metode = 'transfer' AND status !='batal' AND verifikasi = '' order by tb_order.id_order DESC");
                                 $ab4=mysqli_num_rows($ab3);
                                 
                                 $ab5=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where verifikasi = 'SUDAH' AND status = 'Diproses' order by tb_order.id_order DESC");
                                 $ab6=mysqli_num_rows($ab5);
                                 
                                 $ab7=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where metode = 'transfer' AND status !='batal' order by tb_order.id_order DESC");
                                 $ab8=mysqli_num_rows($ab7);
                                 
                                 
                                ?>
                                
                                <a href="adm_super.php"><i class="ti-dashboard"></i><span>Kelola Saldo</span><span class="badge" style="color:red;"><?php echo $ab2;?></span></a>
                            </li>
                          <li >
                                <a href="adm_super2.php"><i class="ti-dashboard"></i><span>Pesanan Transfer</span><span class="badge" style="color:red;"><?php echo $ab4;?></span></a>
                            </li>
                               <li class="active">
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
                            	<li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk Harian</a></li>
					            	<li><a href="produkpo.php">Produk PO</a></li>
					            	<li><a href="promo.php">Kelola Promo</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="../logout.php"><span>Logout</span></a>
                                
                            </li>
                            
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
            <!-- header area end -->
			
			
            <!-- page title area end -->
            <div class="main-content-inner">
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
								
									<br>
								</div>

								<div class="w3-center">
									     <?php 
 	$w = $_SESSION['tugas'];
if ($w != '4') {
    echo "";
   }
   else {?>
  <button <?php 
  $brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join alamat on alamat.userid=login.userid where tb_order.id_order = '$orderids'");
	$fa=mysqli_fetch_array($brgs);
   $status = $fa['status'];
   if ($status == 'DITERIMA') {
    echo "disabled";
   }  elseif ($status == 'batal')  {
        echo "disabled";
    }?> style="margin-bottom:20px" data-toggle="modal" data-target="#myModal" class="w3-button w3-xlarge w3-green">Pesanan Diterima</button>

   <?php 
     
 }
 	
   

   ?>
    <div id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Penerima</h4>
                        </div>
                        
                        <?php 
                        $tgl_diterima = date("d-m-Y");
                        ?>
                        <div class="modal-body">
                        <form action="kirim.php" method="post" enctype="multipart/form-data" >
                            <input type="hidden" name="tgl_diterima" value="<?php echo $tgl_diterima;?>">
                            <input type="hidden" name="id_order" value="<?php echo $orderids; ?>">
                                <div class="form-group">
                                    <label>Nama Penerima <?php echo $tgl_diterima;?></label>
                                    <input name="nama_penerima" type="text" class="form-control" required autofocus>
                                </div>
                                
                                <div class="form-group">
                                    <label>Tanggal Diterima</label>
                                    <input name="deskripsi" type="text" class="form-control" value="<?php echo date("d-m-Y"); ?>" disabled>
                                </div>
                              

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <input name="diterima" type="submit" class="btn btn-primary" value="Kirim">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <a  class="w3-button w3-xlarge w3-green w3-text-white w3-left" href="javascript:history.back()">Kembali</a>
 <form action="download1.php" method="POST" enctype="multipart/form-data">
 	<input type="hidden" name="id_order" value="<?php echo $orderids; ?>">
 	<input type="submit" name="kirim" value="Print Data" class="w3-button w3-xlarge w3-orange w3-text-white" />
 	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 
	<?php 
$brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join tb_detail_order on tb_order.id_order=tb_detail_order.id_order join alamat on alamat.userid=login.userid where tb_order.id_order = '$orderids'");
$n=mysqli_num_rows($brgs);
if($n == 0){
	$brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join alamat on alamat.userid=login.userid where tb_order.id_order = '$orderids'");
	$c=mysqli_fetch_array($brgs);
}else {
	$brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join tb_detail_order on tb_order.id_order=tb_detail_order.id_order join alamat on alamat.userid=login.userid where tb_order.id_order = '$orderids'");
	$c=mysqli_fetch_array($brgs);
}


								?>

 	<?php 
 
 	$w = $_SESSION['tugas'];
if ($w != '2') {
    echo "";
   }
   else {

  
 	?>
<input type="submit" <?php 

    $d = $c['verifikasi'];
    

   if($d == 'SUDAH'){
    echo "disabled";
   }
    else {
   	echo "";
   }

     ?> name="verif" value="konfirmasi" class="w3-button w3-xlarge w3-green" />
        </form>
        <?php 
}

        ?>

    
									
								</div>


								<br>

								 <div class="d-sm-flex justify-content-between align-items-center">
									
									
								</div>


							
								
                                   <p>Nama Santri : <?php echo $c['santri_pesan']; ?> </p>
                                   <p>Nama Walisantri : <?php echo $c['namalengkap']; ?></p>
                                   <p>Kelas : <?php echo $c['kelas_pesan']; ?><?php echo $c['jenjang_pesan'];?></p>
                                   <p>Nomor HP : <?php echo $c['notelp']; ?> </p>
                                   
								   <p>Daerah Asal : <?php echo $c['alamat']; ?></p> <br>
								   <p>Metode Pembayaran: <?php echo $c['metode']; ?></p>
								   <p>Sisa Saldo: Rp. <?php echo number_format($c['saldo']); ?></p><br>
								   <?php 
									$k = $c['status'];
									if ($k != 'DITERIMA'){
						echo "";				
									}

									else {

									?>
<p>Diterima Oleh : <?php echo $c['penerima'];?> </p>
<p>Tanggal Diterima : <?php echo $c['tgl_diterima']; ?>
<br>
									<?php
}

									?>


									<?php 
									$k = $c['metode'];
									if ($k != 'transfer'){
						echo "";				
									}

									else {

									?>


<br>
									<p>Bukti Transfer</p>
									<img src="../transaksi/<?php echo $c['foto'] ;?>" alt="Paris" style="width:30%;">
									<?php
									?>

									<?php 
}
									?>
								   <div class="data-tables datatable-dark">
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No</th>
												<th>Produk</th>
												<th>Jumlah</th>
												<th>Harga</th>
												<th>Total</th>
												
											</tr></thead><tbody>
											<?php 
											$brgs=mysqli_query($conn,"select * from tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid join produk on tb_detail_order.idproduk=produk.idproduk where tb_order.id_order = '$orderids' order by produk.idproduk ASC");
											$no=1;
											$totalnya=0;
											while($p=mysqli_fetch_array($brgs)){
												
												
			
												
												?>
												
												<tr>
													<td><?php echo $no++ ?></td>
													<td><?php echo $p['namaproduk'] ?>&nbsp; <?php echo $p['keterangan'];?>&nbsp; <?php echo $p['warna'];?></td>
													<td><?php echo $p['pembelian'] ?></td>
													<td>Rp<?php echo number_format($p['harga_pesanan']) ?></td>
													<td>Rp<?php
													$acb = $p['pembelian'] * $p['harga_pesanan'];

													 echo number_format($acb) ?></td>
													
												</tr>
												
												
												<?php 
												$totalnya += $acb;
											}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="4" style="text-align:right">Total Pembelanjaan:</th>
												<th>Rp<?php echo number_format($totalnya);?></th>
											</tr>
											<tr>
												<th colspan="4" style="text-align:right">Ongkir:</th>
												<th>Rp<?php echo number_format($c['ongkir'])?></th>
											</tr>
											
											<tr>
												<th colspan="4" style="text-align:right">Total Yang Harus diBayar:</th>
												<th>Rp<?php echo number_format($totalnya + $c['ongkir'])?></th>
											</tr>
											<tr>
												<th colspan="4" style="text-align:right">Sudah diBayar:</th>
												<th>Rp<?php echo number_format($c['total_bayar'])?></th>
											</tr>
											<tr>
												<th colspan="4" style="text-align:right">Kelebihan:</th>
												<th>Rp.<?php echo number_format($c['kelebihan'])?></th>
											</tr>
											<tr>
												<th colspan="4" style="text-align:right">Kekurangan:</th>
												<th>Rp.<?php echo number_format($c['kurang'])?></th>
											</tr>
											<tr>
												<th colspan="4" style="text-align:right"></th>
												<th></th>
											</tr>
										</tfoot>
										</table>
										
                                    </div>
									<br>
									
									<br>
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
        
            </div>
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	
	
	<script type="text/javascript">
		$(document).ready(function() {
    $('#dataTable3').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'print'
        ]
    } );
	} );
	$(document).ready(function() {
    $('#dataTable2').DataTable( {
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
	 <script src="https://cdn.datatables.net/buttons/1.6.0/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
	<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
	
	
</body>

</html>
