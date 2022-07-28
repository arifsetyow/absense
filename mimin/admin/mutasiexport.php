<?php 
function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;

}
    session_start();
    include '../dbconnect.php';
    
         if(!isset($_SESSION['tugas'])=='super'){
	header('location:login.php');
} else {
	
};
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
   
    
    <!-- others css -->

    <!-- modernizr css -->

</head>

<body>
    <?php
    header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Saldo Walisantri.xls");
    
    ?>
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
<?php $tgl_sekarang = date('Y-m-d');?>
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  height: 300px; /* Should be removed. Only for demonstration */
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>


<br>

<div class="row">
  <div class="column" style="background-color:#aaa;">
      <h3 class="w3-text-white">Daftar Top Up Walsan</h3>
      <br>
     <table class="w3-table-all w3-card-4">
           <tr>
      <th>Transfer Atas Nama</th>
      <th>Tanggal</th>
      <th>Jumlah</th>
    </tr>
         <?php
          if(isset($_GET['userid'])){
              $uid = $_GET['userid'];
          $brgs=mysqli_query($conn,"SELECT * from saldo join login on saldo.userid=login.userid where saldo.userid='$uid' AND saldo.verifikasi = 'SUDAH'");
                                       
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
         
         ?>
  
      <tr>
      <td><?php echo $p['nama'];?></td>
      <td><?php echo $p['tanggal'];?></td>
      <td><?php echo rupiah($p['jumlah']);?></td>
    </tr>
   <?php 
}
 $kue1=mysqli_query($conn,"SELECT SUM(jumlah) as totalnya from saldo join login on saldo.userid=login.userid where saldo.userid='$uid' AND saldo.verifikasi = 'SUDAH'");
                                       
                                         
                                           $pa1=mysqli_fetch_array($kue1);
                                           $total1 = $pa1['totalnya'];
                                           
                                           
                                           ?>
                                           <tr>
                                               <td></td>
                                               <td>Total Top Up :</td>
                                               <td><?php echo rupiah($total1);?></td>
                                            
                                           </tr>
  </table>
  </div>
  <br>
  <div class="column" style="background-color:#bbb;">
      <h3 class="w3-text-white">Daftar Belanja Walsan Memakai Metode Saldo</h3>
      <br>
     <table class="w3-table-all w3-card-4">
         
    <tr>
      <th>Resi</th>
      <th>Tanggal</th>
      <th>Jumlah Belanja</th>
      <th>Metode</th>
    </tr>
    <?php
           $brgs=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where tb_order.userid='$uid' AND metode = 'saldo' AND status != 'batal'");
                                       
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
         
         ?>
    <tr>
      <td><a href="order.php?id_order=<?php echo $p['id_order'] ?>">#<?php echo $p['id_order'] ?></a></td>
      <td><?php echo $p['tgl_transaksi'];?></td>
      <td><?php echo rupiah($p['total_belanja']);?></td>
      <td><?php echo $p['metode'];?></td>
    </tr>
   <?php 
}
 $kue=mysqli_query($conn,"SELECT SUM(total_belanja) as totalnya from tb_order join login on tb_order.userid=login.userid where tb_order.userid='$uid' AND metode = 'saldo' AND status != 'batal'");
                                       
                                         
                                           $pa=mysqli_fetch_array($kue);
                                           $total = $pa['totalnya'];
                                           
                                           
                                           ?>
                                           <tr>
                                               <td></td>
                                               <td>Total Belanja :</td>
                                               <td><?php echo rupiah($total);?></td>
                                               <td></td>
                                           </tr>
                          
  </table>
  </div>
</div>
                 
                                           <?php
                                           
                                               
                                           

} ?>



        </div>
        <!-- main content area end -->
        <!-- footer area start-->
        <footer>
            <div class="footer-area">
               <h3>Total Top Up Saldo - Belanja Dengan Saldo = Sisa Saldo </h3>
               <?php $sisa = $total1-$total;?>
               <h3><b><?php echo rupiah($total1)?> - <?php echo rupiah($total)?> = <?php echo rupiah($sisa) ?></b> </h3>
               <br>
               <div class="w3-container">
                   <br>
  <h2>Transaksi Transfer Walsan </h2>

<br>
  <table class="w3-table-all w3-card-4" style="width : 60%">
      
    <tr>
        <th>Resi</th>
      <th>Tanggal</th>
      <th>Jumlah Belanja</th>
      <th>Metode</th>
    </tr>
     <?php
           $brgs=mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid where tb_order.userid='$uid' AND metode = 'transfer' AND status != 'batal' AND status != 'DITOLAK'");
                                       
                                            $no=1;
                                            while($p=mysqli_fetch_array($brgs)){
                                                ?>
                                                
     <tr>
      <td><a href="order.php?id_order=<?php echo $p['id_order'] ?>">#<?php echo $p['id_order'] ?></a></td>
      <td><?php echo $p['tgl_transaksi'];?></td>
      <td><?php echo rupiah($p['total_belanja']);?></td>
      <td><?php echo $p['metode'];?></td>
      
    </tr>
    <?php }?>
    <?php 

 $kue=mysqli_query($conn,"SELECT SUM(total_belanja) as totalnya from tb_order join login on tb_order.userid=login.userid where tb_order.userid='$uid' AND metode = 'transfer' AND status != 'batal' AND status != 'DITOLAK'");
                                       
                                         
                                           $pa=mysqli_fetch_array($kue);
                                           $total = $pa['totalnya'];
                                           
                                           
                                           ?>
                                           <tr>
                                               <td></td>
                                               <td>Total Belanja :</td>
                                               <td><?php echo rupiah($total);?></td>
                                               <td></td>
                                           </tr>
                          
  </table>
</div>
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
