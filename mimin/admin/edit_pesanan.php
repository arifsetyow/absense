<?php 
	session_start();
	include '../dbconnect.php';
		if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}

	if(isset($_POST["edit"])) {
		$id_order = $_POST['id_order'];
		$id_detail = $_POST['id_detail'];
		$data2 = mysqli_query ($conn, "SELECT * FROM tb_order JOIN tb_detail_order on tb_order.id_order=tb_detail_order.id_order JOIN produk ON produk.idproduk=tb_detail_order.idproduk WHERE tb_detail_order.id_detail_order = '$id_detail'");
		$row2 = mysqli_fetch_array ($data2);
		$id_kategori = $row2['idkategori'];


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
            
            
            <!-- page title area end -->
            <div class="main-content-inner">
               <div class="w3-container">
               	<br> 
               	<div class="w3-card">
               		<br>
							<h4 class="w3-center">Edit Pesanan</h4>
						
						
						<div class="modal-body">

							<div class="form-group">
								
									<img id="myImg" src="../produk/<?php echo $row2['gambar']; ?>" style="width:10%">
								</div>
                               
						<form action="aksi_edit.php" method="post" enctype="multipart/form-data" >
						        <input type="hidden" name="type" value="<?php echo $row2['type'];?>">
                            <input type="hidden" name="id_order" value="<?php echo $row2['id_order'];?>">
							<input type="hidden" name="kode_brg" value="<?php echo $row2['idproduk'];?>">
							<input type="hidden" name="id_detail_order" value="<?php echo $row2['id_detail_order'];?>">
								<div class="form-group">
									<label>Nama Produk</label>
									<input disabled name="namaproduk" type="text" class="form-control" autofocus value="<?php echo $row2['namaproduk'];?>">
								</div>
								
								
								
								<div class="form-group">
									<label>Harga</label>
									<input name="harga" value="<?php echo $row2['harga_pesanan'];?>" type="number" class="form-control">
								</div>
								
								<div class="form-group">
									<label>Jumlah Pesanan</label>
									<input name="jumlah" value="<?php echo $row2['pembelian'];?>" type="number"  min="1" class="form-control">
								</div>

							</div>
							<div class="">
								
								<input name="edit_pesanan" type="submit" class="w3-button w3-blue w3-left w3-center" value="Ubah">
                               
							</div>

<script>
function goBack() {
  window.history.back();
}
</script>
						</form>
                       &nbsp; <button onclick="goBack()" class="w3-button w3-center w3-green">Kembali</button>
					
                    </div>
            


              <br>
                
                <!-- row area start-->
            </div>
        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            
        </footer>
        <!-- footer area end-->
    </div>
    <!-- page container area end -->
	
	

			


	
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
