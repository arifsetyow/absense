


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
     <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
    @media print{
   .noprint{
       display:none;
   }
}
</style>
<style type="text/css">
    /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        background-color: #FAFAFA;
        font: 12pt "Tahoma";
    }

    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 3mm;
        margin: 10mm auto;
        border: 1px #D3D3D3 solid;
        border-radius: 5px;
        background: white;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
        padding: 1cm;
        border: 5px #FAFAFA solid;
        height: 257mm;
        outline: 2cm #eee solid;
    }

    @page {
        size: A4;
        margin: 0;
    }

    @media print {

        html,
        body {
            width: 210mm;
            height: 297mm;
        }

        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
</style>


<?php 
if (isset($_POST['excel'])) {

    header("Content-type: application/vnd-ms-excel"); 
    header("Content-Disposition: attachment; filename=RekapBelanja.xls"); 

   ?>
   
<body>
    <div class="book">
        <div class="page">

            <?php 

$tgl1 = $_POST['awal'];
$akhir2 = $_POST['akhir'];
$awal = date('d-m-Y', strtotime($tgl1));
$akhir = date('d-m-Y', strtotime($akhir2));
$bln = date('m');
$status = $_POST['status'];
$kat = $_POST['kategori'];

/*
echo $awal;
echo $akhir;
echo $kat;
echo $bln;
*/

include '../dbconnect.php';
$tgl_sekarang = date('Y-m-d');
$tgl = date('d-m-Y');
$tgl_format = date('d/n/Y', strtotime($tgl_sekarang));
$tgl_now = date('d-m-Y', strtotime($tgl1));
$data = mysqli_query($conn,"select * from tb_order where tb_order.status = '$status' AND tb_order.tgl_transaksi >='$awal' AND tb_order.tgl_transaksi <= '$akhir' AND tb_order.bulan = '$bln' AND tb_order.type = '$kat' group by tb_order.id_alamat");


?>
            <h3 style="text-align: center;">PESANAN KEBUTUHAN HARIAN TANGGAL <?= $tgl_now; ?> - <?= $akhir; ?> </h3>
            <!-- <table style="margin: 0 auto;width:20%;border:1px solid black"> -->
            <div style="display:flex;flex-wrap:wrap">
                <?php
                while ($d = mysqli_fetch_array($data)) {
                ?>
                    <div style="border:1px solid black;margin:5px auto;width:30%;padding:5px;justify-content:flex-start">
                        <div style="display:flex;">
                            

                            <div style="width:100%">
                                  <span><?= $d['id_order'] ?></span> 
                                <span><?= $d['santri_pesan'] ?></span> 
                                <span><?= $d['kelas_pesan'] ?></span>
                                <span><?= $d['jenjang_pesan'] ?></span>
                            </div>
                        </div>
<br>
                        <div style="display:flex">
                          
                            <div style="width: 84%;">
                                <span>
                                    <ol style="margin: 0;"><?php
                                                $pesanan = mysqli_query($conn, "select *,produk.namaproduk from tb_order join tb_detail_order ON tb_order.id_order=tb_detail_order.id_order join produk ON tb_detail_order.idproduk=produk.idproduk where id_alamat='$d[id_alamat]' and tb_detail_order.idproduk=produk.idproduk and tb_order.status = '$status' AND tb_order.tgl_transaksi >='$tgl_now' AND tb_order.tgl_transaksi <= '$akhir' AND tb_order.bulan = '$bln' AND tb_order.type = '$kat'");

                                                while ($p = mysqli_fetch_array($pesanan)) {
                                                ?>
                                            <li><?= $p['namaproduk'] ?> &nbsp; ( <?= $p['pembelian'] ?>Pcs ) </li>
                                        <?php
                                                            }

                                        ?>
                                    </ol>
                                </span>
                            </div>
                        </div>
                    </div>
                <?php
                }

                ?>

                <div style="margin:5px auto;width:30%;padding:5px;"></div>
                <div style="margin:5px auto;width:30%;padding:5px;"></div>
                
                 
  
</div>
 <br>
<br>
 
            </div>
        </div>
    </div>
</body>
<?php
}

?>