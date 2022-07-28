	<script type='text/javascript'>
								
								if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}
</script>
<?php 
    session_start();
    include '../dbconnect.php';
    
    	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}

if(isset($_GET['id_order'])) {
    $id_order = $_GET['id_order'];
} else {
    $id_order = $_POST['id_order'];
}

$start_date_error = '';
$end_date_error = '';
    ?>

<head>
    <meta charset="utf-8">
    <link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Kelola Pelanggan - Tokopekita</title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script
src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.3/moment.min.js">
</script>
<script>

    $(".tm").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-MM-DD")
        .format( this.getAttribute("data-date-format") )
    )
    }).trigger("change")

</script>
</head>

<body>
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
                                 <div class="w3-container w3-left">
                                   
            <br>
    </div>
    <!--
        <div class="w3-container w3-right">
            <form action="topdf.php" method="POST">
                
                 <label><strong>PRINT DATA</strong></label><br>
         <input type="date" name="tanggal">
        <input type="submit" name="kirim" id="topdf" value="Ambil Laporan!" />
        </form>
    </div>
-->
    <br><br>

                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <br>
                                    <h2>Daftar Pesanan Walsan</h2>
                                    <br>
                                </div>
                                <!--
                                  <div> <a href="tambah_pesanan.php" class="w3-button w3-blue w3-right">+ Tambah Pesanan</a>
                                    <br></div>
-->
                                <br>
                                <br>

                                    <div class="data-tables datatable-dark">
                                         <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pesanan</th>
                                                <th>Nama Produk</th>
                                                <th>Harga </th>
                                                <th>Jumlah</th>
                                               <th>Edit Item</th>
                                              
                                                
                                                <th>Hapus Item</th>
                                              
                                                
                                            </tr></thead><tbody>
                                            <?php 
                                            if(isset($_GET['tanggal'])){
                $original_date = $_GET['tanggal'];
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
// Outputs: 31-03-2019
        
                $brgs=mysqli_query($conn,"SELECT * FROM tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order where tb_detail_order.id_order = 146  group by tb_order.id_order DESC");
            }else{

                                            $brgs=mysqli_query($conn,"SELECT * FROM tb_order JOIN tb_detail_order on tb_order.id_order=tb_detail_order.id_order JOIN produk on tb_detail_order.idproduk=produk.idproduk where tb_detail_order.id_order = '$id_order'  order by tb_order.id_order DESC");
                                        }
                                         $row = mysqli_num_rows($brgs);
          
           if ($row == 0)
              {
                 ?>
<h4>Pesanan Walisantri Kosong</h4> <br>
                 <?php
              }
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
 <td><a href="order.php?id_order=<?php echo $p['id_order'] ?>">#<?php echo $p['idproduk'] ?></a></td>
                                                    <td><?php echo $p['namaproduk'] ?></td>
                                                    <td><?php echo $p['harga_pesanan'] ?></td>
                                                    <td><?php echo $p['pembelian'] ?> Pcs</td>
                                                    
                                                   
             <td>
           <form action="edit_pesanan.php" method="POST">
               <input type="hidden" name="id_order" value="<?php echo $p['id_order']?>">
               <input type="hidden" name="id_detail" value="<?php echo $p['id_detail_order']?>">
               <input type="submit" name="edit" class="w3-button w3-green" value="EDIT">
           </form>

       </td>                                         
            
       <td>
           <form action="hapus_pesanan.php" method="POST">
               <input type="hidden" name="id_order" value="<?php echo $p['id_order']?>">
               <input type="hidden" name="id_detail" value="<?php echo $p['id_detail_order']?>">
               <input type="submit" name="hapus" class="w3-button w3-red" value="HAPUS">
           </form>

       </td>


                                                    
                                                    
                                                </tr>   
                                                
                                                <?php 
                                            }
                                        
                                            
                                            ?>

                                        </tbody>
                                        </table>
                                        <h4 class="w3-center">  <?php
                                                $abc=mysqli_query($conn,"SELECT * FROM tb_order JOIN tb_detail_order on tb_order.id_order=tb_detail_order.id_order JOIN produk on tb_detail_order.idproduk=produk.idproduk JOIN login on tb_order.userid=login.userid where tb_detail_order.id_order = '$id_order'  order by tb_order.id_order DESC");
                                                 $no=1;
                                                 $w=mysqli_fetch_array($abc);


                                                 ?>
                                                
                                                 <?php 
                                                 $data2 = mysqli_query($conn, "SELECT * FROM tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid WHERE tb_detail_order.id_order = '$id_order'");
   $totalprice=0; 
    $belanja1=0; 
   $no=0;
                    while($row=mysqli_fetch_array($data2)){ 
                        $no++;
    $ab= $row['pembelian'] * $row['harga_pesanan']; //Menghitung A + B
    $belanja1 += $ab;
    }
    //Menghitung Total dari A+B
  
if ($belanja1 <= "100000") {
    $jastip = 10000;
    
  } elseif ($belanja1 <= "200000") {
      $jastip = 20000;
   } elseif ($belanja1 <= "300000") {
      $jastip = 25000;
   } elseif ($belanja1 <= "400000") {
      $jastip = 27000;
   } elseif ($belanja1 <= "500000") {
      $jastip = 30000;
   } elseif ($belanja1 <= "600000") {
      $jastip = 32000;
   } elseif ($belanja1 <= "1000000") {
      $jastip = 35000;
   } 
  
  else{
      $jastip = 35000;
  }
  
  $belanja = $belanja1 + $jastip;
  


                                                 ?>
                                                 <div id="address" class="w3-card">
 <p>Total Belanja &nbsp; Rp.<?php echo $belanja1;?></p> 
                                                
                                                 <p>Ongkir &nbsp; Rp.<?php 
                                                 if (isset($w['ongkir'])) {
  $ja = $w['ongkir'];
} else  {
    $ja = 0;
}
echo $ja;

                                            ?></p>

                                                 <p>Total Pembayaran &nbsp; Rp.<?php 
if ($belanja1 == 0){
    echo '0';
} else {
    echo $belanja;
}
                                                 


                                             ?></p> 
                                                 
                                                                                                  
                                                 <p>Total Sudah Dibayar &nbsp; Rp.<?php 
 if (isset($w['total_bayar'])) {
  $ja = $w['total_bayar'];
} else  {
    $ja = 0;
}
echo $ja;


                                                 ?></p> 
                                                 <p>Kelebihan &nbsp; Rp.<?php 
                                             if (isset($w['kelebihan'])) {
  $ja = $w['kelebihan'];
} else  {
    $ja = 0;
}
echo $ja;

                                             ?></p>
                                                   <p>Kekurangan &nbsp; Rp.<?php 
                                                    if (isset($w['kurang'])) {
  $ja = $w['kurang'];
} else  {
    $ja = 0;
}
echo $ja;
                                               ?></p>
                                                   <p>Dibayar Saldo &nbsp; Rp.<?php 

                                                 if (isset($w['bayar_saldo'])) {
  $ja = $w['bayar_saldo'];
} else  {
    $ja = 0;
}
echo $ja;

                                               ?></p>
                                                   <p>Sisa Saldo &nbsp; Rp.<?php 
                                                    if (isset($w['saldo'])) {
  $ja = $w['saldo'];
} else  {
    $ja = 0;
}
echo $ja;
                                               ?></p>
</div>
</h4>
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
               
            </div>
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
    
    <script>

$(document).ready(function(){
 $('.input-daterange').datepicker({
  todayBtn:'linked',
  format: "dd-mm-yyyy",
  autoclose: true
 });
});

</script>


    
</body>

</html>
