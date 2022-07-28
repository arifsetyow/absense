<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
session_start();
include '../dbconnect.php';
$orderids = $_POST['id_order'];

if(isset($_POST["verif"])) {
        $id_order=$_POST['id_order'];
       
     $query1 = "UPDATE `tb_order` SET `verifikasi` = 'SUDAH' WHERE `tb_order`.`id_order` = '$id_order'";
     $sql = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
        echo "berhasil";
              
echo "
        <meta http-equiv='refresh' content='1; url= kelola_cod.php'/>  ";

} else {




require('../vendor/autoload.php');
include '../dbconnect.php';



$brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join tb_detail_order on tb_order.id_order=tb_detail_order.id_order join alamat on alamat.userid=login.userid where tb_order.id_order = '$orderids'");
$c=mysqli_fetch_array($brgs);

?>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
h4 {
  text-align: center;
}
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
      <!-- market value area start -->
                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center w3-center">
                                    <h3>Nomor RESI : #<?php echo $orderids ?></h3>
                                    
                                </div>

                              
                                <br>
                                

                                 <div class="d-sm-flex justify-content-between align-items-center w3-center">
                                    <a class="w3-btn w3-large w3-green w3-center" href="javascript:history.back()">Kembali</a>
                                    
                                </div>
                                <br>
                            
                                
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
                                                    <td><p style=" font-size: 15px;"><?php echo $no++ ?></p></td>
                                                    <td><p style=" font-size: 15px;"><?php echo $p['namaproduk'] ?></p></td>
                                                    <td><p style=" font-size: 15px;"><?php echo $p['pembelian'] ?></p></td>
                                                    <td><p style=" font-size: 15px;">Rp<?php echo number_format($p['harga_pesanan']) ?></p></td>
                                                    <td>Rp<?php
                                                    $acb = $p['pembelian'] * $p['harga_pesanan'];

                                                     echo number_format($acb) ?></td>
                                                    
                                                </tr>
                                                
                                                
                                                <?php 
                                                  $acb = $p['pembelian'] * $p['harga_pesanan'];
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
                                    <div class="w3-center">
                        <p style=" font-size: 15px;">Nama Santri : <?php echo $c['nama_santri']; ?> </p>
                    <p style=" font-size: 15px;">Nama Walisantri : <?php echo $c['namalengkap']; ?></p>
                                   <p style=" font-size: 15px;">Kelas : <?php echo $c['kelas']; ?> </p>
                        <p style=" font-size: 15px;">Daerah Asal : <?php echo $c['alamat']; ?></p> 
                                   <p>Metode Pembayaran: <?php echo $c['metode']; ?></p>

                                   <?php 
                                   $cek = $c['saldo'];
                                   if ($cek > 0 ){
                                    ?>
 <p>Sisa Saldo : Rp. <?php echo number_format($c['saldo']); ?></p><br>
                                    <?php 
                                   } elseif ($cek == 0) {
?>
 <p>Sisa Saldo : Rp. <?php echo number_format($c['saldo']); ?></p><br>
<?php
                                   }
                                    else {
                                    ?>
 <p style="color:red">Sisa Saldo: Rp. <?php echo number_format($c['saldo']); ?> ( MINUS )</p><br>
                                    <?php 

                                   }

                                   ?>
                                  
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
                                    ?>
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
<?php 

}
//D
//I
//F
//S
?>