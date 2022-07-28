<?php
session_start();
include '../dbconnect.php';

	if(!isset($_SESSION['login_admin'])){
    header('location:../admin/login.php');
}
$orderids = $_POST['id_order'];

if(isset($_POST["verif"])) {
        $id_order=$_POST['id_order'];
       
     $query1 = "UPDATE `tb_order` SET `verifikasi` = 'SUDAH' WHERE `tb_order`.`id_order` = '$id_order'";
     $sql = mysqli_query($conn, $query1); // Eksekusi/ Jalankan query dari variabel $query
        echo "berhasil";
              
echo "
        <meta http-equiv='refresh' content='1; url= kelola_transfer.php'/>  ";

} else {




require('../vendor/autoload.php');
include '../dbconnect.php';

ob_start();

$brgs = mysqli_query($conn,"SELECT * from tb_order join login on tb_order.userid=login.userid join tb_detail_order on tb_order.id_order=tb_detail_order.id_order where tb_order.id_order = '$orderids'");
$c=mysqli_fetch_array($brgs);

?>

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
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h3>Order id : #<?php echo $orderids ?></h3>
                                    
                                </div>

                              
                                <br>

                                 <div class="d-sm-flex justify-content-between align-items-center">
                                    
                                    
                                </div>
                                
                                   <p>Nama Santri : <?php echo $c['santri']; ?> </p>
                                   <p>Nama Walisantri : <?php echo $c['namalengkap']; ?></p>
                                   <p>Kelas : <?php echo $c['kelas']; ?> </p>
                                   <p>Nama Santri : <?php echo $c['santri']; ?> </p>
                                   <p>Daerah Asal : <?php echo $c['alamat']; ?></p> <br>
                                    
                                    <?php
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
                                            while($p=mysqli_fetch_array($brgs)){
                                                
                                                
            
                                                
                                                ?>
                                                
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $p['namaproduk'] ?></td>
                                                    <td><?php echo $p['total_item'] ?></td>
                                                    <td>Rp<?php echo number_format($p['hargaafter']) ?></td>
                                                    <td>Rp<?php
                                                    $acb = $p['total_item'] * $p['hargaafter'];

                                                     echo number_format($acb) ?></td>
                                                    
                                                </tr>
                                                
                                                
                                                <?php 
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4" style="text-align:right">Ongkir:</th>
                                                <th>Rp<?php echo $c['ongkir']?></th>
                                            </tr>
                                            <tr>
                                                <th colspan="4" style="text-align:right">Total:</th>
                                                <th>Rp<?php echo $c['total_bayar']?></th>
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


    

<?php 
$html = ob_get_contents();
ob_end_clean();
$mpdf=new \Mpdf\Mpdf();
$mpdf->WriteHTML($html);
$file='Pesanan/'.time().'.pdf';
$mpdf->output($file,'I');
}
//D
//I
//F
//S
?>