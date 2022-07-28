<?php 
    session_start();
    /*
     if($_SESSION['tugas'] !=='super'){
         
   header('location:404.php');
}
else{
    
}
*/
    include '../../koneksi.php';
    
    

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}

    ?>
    
    

<head>
    <meta charset="utf-8">
    <link rel="icon" 
      type="image/png" 
      href="../favicon.png">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
     <meta http-equiv="refresh" content="300">
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
        <?php include "pagi.php";?>
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
<form method="get">
            <label><strong>PILIH TANGGAL</strong></label>
            <br>
            <input type="date" name="tanggal">
            <input type="submit" value="FILTER">
        </form><br>
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
                                    <h2>Pengajuan Toleransi Telat Absen</h2>
                                    <!--
                                    <br>
                                    <a class="w3-button w3-round w3-green" href="../setoran.html" >+ Tambah Saldo</a>
                                    -->
                                </div>
                                <br>

                                    <div class="data-tables datatable-dark">
                                         <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                            
                                                <th>Nama Karyawan</th>
                                                <th>Waktu Pengajuan Toleransi</th>
                                                <th>Tanggal Absen</th>
                                                <th>Verifikasi</th>
                                                <th>Tolak</th>
                                                
                                            </tr></thead><tbody>
                                            <?php 
                                            if(isset($_GET['tanggal'])){
                  $original_date = $_GET['tanggal'];
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
        
                $brgs=mysqli_query($koneksi,"SELECT * from absen join karyawan on absen.id_karyawan=karyawan.id_karyawan where tanggal_absen = '$new_date' AND status = 'toleransi' group by absen.id_absen DESC");
            }else{

                                            $brgs=mysqli_query($koneksi,"SELECT * from absen join karyawan on absen.id_karyawan=karyawan.id_karyawan where status = 'toleransi' group by absen.id_absen DESC");
                                        }
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>             
                                                   <td><?php echo $p['nama_karyawan'];?></td>
                                                    
                                                    
                                                     <td><?php echo $p['masuk'] ?></td>
                                                     
                                                     <td><?php echo $p['tanggal_absen'] ?></td>

                                                     <td><form id="my-form" action="verifikasi_saldo.php" method="POST" enctype="multipart/form-data">
                                                    <input type="hidden" name="id_absen" value="<?php echo $p['id_absen'];?>">                                                   
                                                    <input type="submit" name="kirim" value="ACC" class="w3-button w3-large w3-green" />
     <br>

                                                     </td>

<td>
<input type="submit" name="tolak" value="TOLAK" class="w3-button w3-large w3-red" />
 <br>

                                                 </td>

</td>
   
            </form>



                                                    
                                                    
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
    
  
    
    
</body>

</html>
