<?php 
	session_start();
	include '../dbconnect.php';
	
	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
			
	if(isset($_POST["addproduct"])) {
		
		if(!empty($_FILES["uploadgambar"]["tmp_name"])){
		    	$namaproduk=str_replace("'","",$_POST['namaproduk']);
		$idkategori=$_POST['idkategori'];
		$stok=$_POST['stok'];
		$rate= '5';
		$hargabefore=$_POST['hargabefore'];
		$hargaafter=$_POST['hargaafter'];
		$hari='';
		$waktu = time();
		$fileinfo=PATHINFO($_FILES["uploadgambar"]["name"]);
		$newFilename=$fileinfo['filename'] ."_". time() . "." . $fileinfo['extension'];
		move_uploaded_file($_FILES["uploadgambar"]["tmp_name"],"../produk/" . $newFilename);
		$location= $newFilename;
	
			
			  $query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, hari, stok, kode_brg)
			  values('$idkategori','$namaproduk','$location','
			  ','$rate','$hargabefore','$hargaafter', '$hari', '$stok', '$waktu')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
			
			}else {
			    		$namaproduk=str_replace("'","",$_POST['namaproduk']);
		$idkategori=$_POST['idkategori'];
		$stok=$_POST['stok'];
		$rate= '5';
		$hargabefore=$_POST['hargabefore'];
		$hargaafter=$_POST['hargaafter'];
		$hari='';
		$waktu = time();
			    
			    
			      $query = "insert into produk (idkategori, namaproduk, gambar, deskripsi, rate, hargabefore, hargaafter, hari, stok, kode_brg)
			  values('$idkategori','$namaproduk','','
			  ','$rate','$hargabefore','$hargaafter', '$hari', '$stok', '$waktu')";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			}
		}

		if(isset($_POST["hapus"])) {
		$kode_brg=$_POST['kode_brg'];
		
			
			  $query = "DELETE FROM produk WHERE idproduk = '$kode_brg'";
			  $sql = mysqli_query($conn, $query); // Eksekusi/ Jalankan query dari variabel $query
			  
		
			
			}
		
			
	?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <script type="text/javascript">

    function do_this(){

        var checkboxes = document.getElementsByName('chkl[]');
        var button = document.getElementById('toggle');

        if(button.value == 'select'){
            for (var i in checkboxes){
                checkboxes[i].checked = 'FALSE';
            }
            button.value = 'deselect'
        }else{
            for (var i in checkboxes){
                checkboxes[i].checked = '';
            }
            button.value = 'select';
        }
    }
</script>
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
				
								<li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-layout"></i><span>Kelola Toko
                                    </span></a>
                                   <ul class="collapse">
                                    <li><a href="kategori.php">Kategori</a></li>
                                    <li class="active"><a href="produk.php">Produk Harian</a></li>
                                     
								
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

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 4px;
}

#myBtn:hover {
  background-color: #555;
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
               
                <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                            <div class="w3-container w3-left">
                                    <form method="get">
            <div class="input-daterange">
            <label><strong>Filter Berdasarkan Kategori</strong></label>
            <br>
           <select name="jurusan" class="w3-select" style="width :30%;">
  <?php
   //Membuat koneksi ke database akademik
    
   $hasil=mysqli_query($conn,"SELECT * from kategori order by namakategori ASC");
     
    $no=0;
    while ($data = mysqli_fetch_array($hasil)) {
    $no++;
   ?>
    <option <?php 
     $id_kat = $_GET['jurusan'];
    if ($data['idkategori']== $id_kat) { echo 'selected'; }?>
     value="<?php echo $data['idkategori'];?>"><?php echo $data['namakategori'];?></option>
  <?php 
	}
  ?>
</select>
            <input type="submit" class="w3-btn w3-card w3-orange w3-text-white" value="FILTER">
        </form>
        <div class="w3-row">
            <div class="w3-col s6 w3-left">
              <form method="get">
                  <input type="hidden" name="tampilkan">
           
                
                <br>
            <label><strong>Tampilkan Semua Produk</strong></label>
            <br>
            <input type="submit" class="w3-btn w3-card w3-orange w3-text-white" value="TAMPILKAN">
        </form>
        </div>
        <div class="w3-col s6 w3-left">
                
                <br>
            <label><strong>Upload Data Stok Terbaru</strong></label>
            
            <form method="post" enctype="multipart/form-data" action="upload_aksi.php">
	<input type="file" name="berkas_excel"/> <br><br>
	<input class="w3-button w3-red" type="submit" name="submit"/>
</form>
            

        
  
           
                </div>
                
                 
                </div>
                <!--
                <br>
            <label><strong>Export Data Yang Mau Habis</strong></label>
            <br>
            <a class="w3-button w3-small w3-ripple w3-green"style="margin-bottom:2%;" href="export.php" >Ekspor Data Ke Excel</a>

        -->
    </div>
    <br>
    </div>
                                <div class="d-sm-flex justify-content-between align-items-right">
									<h2>Daftar Produk</h2>
										
									<button style="margin-bottom:20px; margin right:20px;" data-toggle="modal" data-target="#myModal" class="btn btn-info">(+) Tambah Produk</button>
									
                                </div>
                                     <form action="checkbox.php" method="post">
                                    <div class="data-tables datatable-dark">
                                   
										 <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
											<tr>
												<th>No.</th>
											    <th>Nama Produk</th>
											    <th>Kategori</th>
											    <th>Tambah Stok</th>
											    <th>Jumlah Stok</th>
											    <th>Perbarui Harga</th>
											    	<th>Harga</th>
											    	
											    		<th>Edit</th>
												<th>Hapus</th>
												<th>Chek 	<input type="button" id="toggle" value="select" onClick="do_this()" /></th>
												<th>Tanggal Update</th>
												<th>Tanggal Expired</th>
												
											
											</tr></thead><tbody>
											    
											<?php 
											function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
 
}
  if(isset($_GET['jurusan'])){
  $id_kat = $_GET['jurusan'];

  $brgs=mysqli_query($conn,"SELECT * from produk join kategori on produk.idkategori=kategori.idkategori where produk.idkategori='$id_kat' order by idproduk DESC");
  }elseif(isset($_GET['tampilkan'])) {
    $brgs=mysqli_query($conn,"SELECT * from produk order by idproduk DESC");
  }else{
       $brgs="";
  }
											$no=1;
											while($p=mysqli_fetch_array($brgs)){

												?>
											
												<tr>
													<td><?php echo $no++ ?></td>
											
													<td><?php 
												$cek_dl = $p['gambar'];
												if($cek_dl !== ''){
												    echo "*";
												}
												else {
												    
												}
												?><a href="https://www.google.com/search?q=<?php echo $p['namaproduk']?>&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjG37bX77X2AhWaT2wGHQzLAeMQ_AUoAXoECAIQAw&biw=1536&bih=792&dpr=1.25"target="_blank"><?php echo $p['namaproduk']?></a></td>
														
													    <td>	<div class="form-group">
									<label>Nama Kategori</label>
									<select name="idkategori[]" class="form-control">
		<?php
		$id_kategori = $p['idkategori'];
        $data1 = mysqli_query ($conn, "SELECT * FROM kategori order by namakategori ASC");
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
									
								</div></td>
													    <!--
														<td><?php echo $p['namakategori'] ?></td>
													-->
														   <input type="hidden" name="kode_brg" value="<?php echo $p['idproduk']; ?>">
														   <input type="hidden" name="hrg[]" value="<?php echo $p['hargaafter']; ?>">
														<td><center><input style="  width: 30%; text-align: center;"type="text" name="stok[]" value="0"></center></td>
														<td><?php echo $p['stok'] ?></td>
														<td><input style=" width: 50%; text-align: center;" type="text" value="0" name="harga[]"></td>
														<td><?php echo rupiah($p['hargaafter']) ?></td>
														<td>
													   <a class="w3-card w3-button w3-orange w3-text-white" href="edit_produk.php?id=<?php echo $p['idproduk']; ?>"target="_blank">Edit</a>
													    </td>
												

							
							
								    	<td> <a class="w3-card w3-button w3-red w3-text-white" onclick="return confirm('Anda yakin mau menghapus item ini ?')" href="hapus_produk.php?id=<?php echo $p['idproduk']; ?>"target="_blank" >Hapus</a>
							
							</td>
								 				
						
																	<td>
													    
<input class="w3-check" type="checkbox" name="chkl[]" value="<?php echo $p['idproduk']?>" onClick="do_this()">

               
								

</td>
														
												
													
													<td><?php echo $p['tgldibuat'] ?></td>
													<td><?php echo $p['tgl_expired'] ?></td>
									
													
							
													
												</tr>		
												
												<?php 
											}
											
												
											
		
											?>
								
										</tbody>
										<br>
										<br>
						<input type="submit" name="Submit" style="
  left: 50px;
  right: 0px;
  width: 200px;
  border: 3px solid #73AD21;
" class="w3-btn" value="Simpan Perubahan">  
</form> 
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
						<form action="produk.php" method="post" enctype="multipart/form-data" >
								<div class="form-group">
									<label>Nama Produk</label>
									<input name="namaproduk" type="text" class="form-control" required autofocus>
								</div>
								<div class="form-group">
									<label>Nama Kategori</label>
									<select name="idkategori" class="form-control">
									<option selected>Pilih Kategori</option>
									<?php
									$det=mysqli_query($conn,"select * from kategori order by namakategori ASC")or die(mysqli_error());
									while($d=mysqli_fetch_array($det)){
									?>
										<option value="<?php echo $d['idkategori'] ?>"><?php echo $d['namakategori'] ?></option>
										<?php
								}
								?>		
									</select>
									
								</div>
									
								<div class="form-group">
									<label>Stok</label>
									<input name="stok" type="text" class="form-control">
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
function pilihsemua()
{
    var daftarku = document.getElementsByName(“chkl[]”);
    var jml=daftarku.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        daftarku[b].checked=true;
        
    }
}

function bersihkan()
{
    var daftarku = document.getElementsByName(“chkl[]”);
    var jml=daftarku.length;
    var b=0;
    for (b=0;b<jml;b++)
    {
        daftarku[b].checked=false;
        
    }
}
</script>

	
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
    
    
<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>

<script>
//Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>
	
</body>
</html>
