<?php 
    session_start();
    include '../dbconnect.php';

 if(!isset($_SESSION['log'])){
    header('location:login.php');
} else {
    if($_SESSION['tugas'] == '1'){
header('location:index1.php');
    }elseif($_SESSION['tugas'] == '2'){
        header('location:index2.php');
}elseif($_SESSION['tugas'] == '3'){
        
}elseif($_SESSION['tugas'] == '4'){
        header('location:index5.php');
}
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
                            <li><a href="index.php"><span>Home</span></a></li>
                            <li><a href="../"><span>Kembali ke Toko</span></a></li>
                            <li  class="active">
                                <a href="manageorder.php"><i class="ti-dashboard"></i><span>Kelola Pesanan</span></a>
                            </li>
                             <li>
                                <a href="diterima.php"><i class="ti-dashboard"></i><span>Pesanan Diterima</span></a>
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
                                    <form method="get">
            <div class="input-daterange">
            <label><strong>PILIH TANGGAL</strong></label>
            <br>
            <input type="date" name="tanggal">
            <input type="submit" value="FILTER">
        </form>
    </div><br>
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
                                <br>

                                    <div class="data-tables datatable-dark">
                                         <table id="dataTable3" class="display" style="width:100%"><thead class="thead-dark">
                                            <tr>
                                                <th>No</th>
                                                <th>Id Pesanan</th>
                                                <th>Nama Walisantri</th>
                                                <th>Nama Santri</th>
                                                <th>Kelas</th>
                                                <th>Status</th>
                                                <th>Tanggal Pemesanan</th>
                                                <th>Edit Pesanan</th>
                                                <th>Print Data</th>
                                                <th>Tandai Dikemas</th>
                                                <th>Tandai Dikirim</th>
                                              
                                                
                                            </tr></thead><tbody>
                                            <?php 
                                            if(isset($_GET['tanggal'])){
                $original_date = $_GET['tanggal'];
 
// Creating timestamp from given date
$timestamp = strtotime($original_date);
 
// Creating new date format from that timestamp
$new_date = date("d-m-Y", $timestamp);
// Outputs: 31-03-2019
        
                $brgs=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where tgl_transaksi = '$new_date' AND verifikasi = 'SUDAH' group by tb_order.id_order DESC");
            }else{

                                            $brgs=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where verifikasi = 'SUDAH' group by  tb_order.id_order DESC");
                                        }
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
 <td><a href="order.php?id_order=<?php echo $p['id_order'] ?>">#<?php echo $p['id_order'] ?></a></td>
                                                    <td><?php echo $p['namalengkap'] ?></td>
                                                    <td><?php echo $p['nama_santri'] ?></td>
                                                    <td><?php echo $p['kelas'] ?></td>
                                                    <td><?php echo $p['status'] ?></td>
                                                     <td><?php echo $p['tgl_transaksi'] ?></td>
                                                     <td> <form action="edit_pesanan1.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_order" value="<?php echo $p['id_order'] ?>">
    <input type="submit"    <?php 
   $status = $p['status'];
  if ($status == 'DIKIRIM')  {
        echo "disabled";
    } elseif ($status == 'batal')  {
        echo "disabled";
    } elseif ($status == 'DITERIMA')  {
        echo "disabled";
    }
     elseif ($status == 'Diproses'){
        echo "disabled";
    }
   
   ?> name="kirim" value="Edit" class="w3-button w3-xlarge w3-teal" />

        </form></td>
                                                     <td> <form action="download1.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_order" value="<?php echo $p['id_order'] ?>">
    <input type="submit" name="kirim" value="Print Data" class="w3-button w3-xlarge w3-teal" />

        </form></td>
            <td> <form action="kirim.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_order" value="<?php echo $p['id_order'] ?>">
    <input type="submit" 
   <?php 
   $status = $p['status'];
   if ($status == 'DIKEMAS') {
    echo "disabled";
   } elseif ($status == 'DIKIRIM')  {
        echo "disabled";
    } elseif ($status == 'batal')  {
        echo "disabled";
    } elseif ($status == 'DITERIMA')  {
        echo "disabled";
    }
     else {

    }
   
   ?>

     name="dikemas" value="dikemas" class="w3-button w3-xlarge w3-ORANGE W3-text-white" />

        </form></td>
         <td> <form action="kirim.php" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id_order" value="<?php echo $p['id_order'] ?>">
    <input type="submit" 
   <?php 
   $status = $p['status'];
   if ($status == 'DIKIRIM') {
    echo "disabled";
   }elseif ($status == 'DITERIMA')  {
        echo "disabled";
    } elseif ($status == 'batal')  {
        echo "disabled";
    } else {
        echo "";
    }
   
   ?>

     name="kirim" value="KIRIM" class="w3-button w3-xlarge w3-GREEN" />

        </form></td>




                                                    
                                                    
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
