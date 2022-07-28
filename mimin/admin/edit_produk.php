<?php 
	session_start();
	include '../dbconnect.php';
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
		$kode_brg = $_GET['id'];
		$data2 = mysqli_query ($conn, "SELECT * FROM produk JOIN kategori ON produk.idkategori=kategori.idkategori WHERE produk.idproduk = '$kode_brg'");
		$row2 = mysqli_fetch_array ($data2);
		$id_kategori = $row2['idkategori'];





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
                                    <li class="active"><a href="kategori.php">Kategori</a></li>
                                    <li><a href="produk.php">Produk Harian</a></li>
                                     <li><a href="produkpo.php">Produk PO</a></li>
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
                                    <li class="active"><a href="produk.php">Produk Harian</a></li>
                                     <li><a href="produkpo.php">Produk PO</a></li>
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
							<h4 class="w3-center">Edit Produk</h4>
						
						
						<div class="modal-body">
						<form action="aksi_edit_produk.php" method="post" enctype="multipart/form-data" >
							<input type="hidden" name="kode_brg" value="<?php echo $row2['idproduk'];?>">
								<div class="form-group">
								    <a href="https://www.google.com/search?q=<?php echo $row2['namaproduk']?>&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjG37bX77X2AhWaT2wGHQzLAeMQ_AUoAXoECAIQAw&biw=1536&bih=792&dpr=1.25"target="_blank"><?php echo $row2['namaproduk']?></a>
									<label>Nama Produk</label>
									
									<input name="namaproduk" type="text" class="form-control"  autofocus value="<?php echo $row2['namaproduk'];?>">
								</div>
									
								<div class="form-group">
									<label>Nama Kategori</label>
									<select name="idkategori" class="form-control">
		<?php
        $data1 = mysqli_query ($conn, "SELECT * FROM kategori");
		while ($row3 = mysqli_fetch_array ($data1))
		{
			if ($id_kategori == $row3['idkategori']){
				$select = "selected";
			}else {
				$select = "";
			}

        echo "<option $select value=".$row3['idkategori'].">".$row3['namakategori']."</option>";
       }
      ?>            
									
									</select>
									
								</div>
								
									<div class="form-group">
									<label>Gambar</label>
									<img id="myImg" src="../produk/<?php echo $row2['gambar']; ?>" style="width:10%">
									<input name="uploadgambar" type="file" class="form-control" >
									<i style="float: center;font-size: 17px;color: red">Abaikan jika tidak merubah foto produk</i>
								</div>
									<div class="">
							    <!--
								<button onclick="goBack()" type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
								<input name="addproduct" type="submit" class="w3-btn w3-large" value="Ubah">
							</div>
										<div class="form-group">
								<label>Tanggal Expired</label>
					<input type="date" style="width: 30%;" class="form-control" name="tanggal" value="<?php 
					if($row2["tgl_expired"] == ""){
					    echo date('Y-m-d',strtotime("01-01-2022"));
					}else{
					echo date('Y-m-d',strtotime($row2["tgl_expired"])) ;
					}?>">
					</div>
								<!--
								<div class="form-group">
									
									<label>Deskripsi</label>
									<input name="deskripsi" type="text" class="form-control" value="<?php echo $row2['deskripsi'];?>" >
								</div>
								<div class="form-group">
									<label>Rating (1-5)</label>
									<input name="rate" type="number" class="form-control"  value="<?php echo $row2['rate'];?>" >
								</div>
								<div class="form-group">
									<label>Harga Sebelum Diskon</label>
									<input name="hargabefore" type="number" value="<?php echo $row2['hargabefore'];?>" class="form-control">
								</div>
										-->
								<div class="form-group">
									<label>Harga</label>
									<p class="form-control"><?php echo $row2['hargaafter'];?></p>
								</div>
									<div class="form-group">
									<label>Stok</label>
									<p class="form-control"><?php echo $row2['stok'];?></p>
								</div>
							
						
						
							

							</div>
							<div class="w3-left">
							    <!--
								<button onclick="goBack()" type="button" class="btn btn-default" data-dismiss="modal">Batal</button> -->
								<input name="addproduct" type="submit" class="w3-btn w3-large" value="Ubah">
							</div>

<script>
function goBack() {
  window.history.back();
}
</script>
						</form>
					</div>
            


              
                
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
