<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

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

    ob_start();

    if(isset($_POST["tanggal"])) {
        $tgl_transaksi = $_POST['tanggal'];
      $brgs = mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where verifikasi = 'SUDAH' AND status = 'DIKIRIM' AND tgl_transaksi = '$tgl_transaksi' group by  tb_order.id_order DESC");
    }
    else {
        $brgs = mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where verifikasi = 'SUDAH' AND status = 'DIKIRIM' group by  tb_order.id_order DESC");
    }

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
          <br>
          <br>
          <br>

              <div style="overflow-x:auto;">
                                        <div>
                                             <table id="dataTable3" style="width:100%"><thead class="thead-dark">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Id Pesanan</th>
                                                    <th>Nama Walisantri</th>
                                                    <th>Nama Santri</th>
                                                    <th>Kelas</th>
                                                    <th>Status</th>
                                                    <th>Tanggal Pemesanan</th>
                                                    <th>Tandai Telah Diterima</th>
                                                  
                                                  
                                                    
                                                </tr></thead><tbody>
                                                <?php 
                                                if(isset($_POST['tanggal'])){
                   
    $new_date = $_POST['tanggal'];
    // Outputs: 31-03-2019
            
                    $brgs=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where tgl_transaksi = '$new_date' AND verifikasi = 'SUDAH' AND status = 'DIKIRIM' group by tb_order.id_order DESC");
                }else{

                                                $brgs=mysqli_query($conn,"SELECT * FROM tb_order JOIN login ON login.userid=tb_order.userid JOIN alamat ON alamat.id_alamat=tb_order.id_alamat where verifikasi = 'SUDAH' AND status = 'DIKIRIM' group by  tb_order.id_order DESC");
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
                                                 
                <td>
                      

                        
                      <?php 
    }
                      ?>  
                  
                    
                    </td>
                   

                        <div>
     
                    <!-- row area start-->
                </div>
            </div>

  

    <script>
            window.print();
        </script>
        

    <?php 

    }
    //D
    //I
    //F
    //S
    ?>


  </tr>

</tbody>
</table>

</div>

  <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                            <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                          <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>

        
 <div class="w3-right">
        <p class="w3-xlarge w3-serif"><i>" Pengirim "</i></p>
        <br>
         <br> <br>
        <p>...................</p>
     
      </div>
       <div class="w3-left">
        <p class="w3-xlarge w3-serif"><i>" Penerima "</i></p>
        <br>
         <br> <br>
        <p>...................</p>
     
      </div>


 