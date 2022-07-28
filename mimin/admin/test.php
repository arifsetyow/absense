<?php
include '../dbconnect.php';


$brgs=mysqli_query($conn,"select * from tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid join produk on tb_detail_order.idproduk=produk.idproduk order by produk.idproduk ASC");


$first  = true;

$html = '<ul class="main-category">';
while($row = mysqli_fetch_array($brgs)) 
{
  $id_order = $row['id_order'];
  $html .= '<li>' . $row['namalengkap'] . '<ul>';
  

  $query_subkat   = mysqli_query($conn,"SELECT * from tb_detail_order join tb_order on tb_detail_order.id_order=tb_order.id_order join login on tb_order.userid=login.userid join produk on tb_detail_order.idproduk=produk.idproduk WHERE tb_order.id_order = '$id_order' order by produk.idproduk ASC");

  while($row_subkat = mysqli_fetch_array($query_subkat)) {
    $html .= '<li>' . $row_subkat['namaproduk'] . ' | Quantity : ' . $row_subkat['total_item'] . ' | Rp. ' . $row_subkat['hargaafter'] . '</li>';


  }

  $html .= '</ul></li>';
    $html .= '<br>';
}
$html .= '</ul>';
echo $html;




?>