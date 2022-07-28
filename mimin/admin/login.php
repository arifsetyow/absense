<?php 
  session_start();

  include '../dbconnect.php';


  if(isset($_POST['login']))
  {
  $user = mysqli_real_escape_string($conn, $_POST['user']);
  $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
  $result = mysqli_query($conn,"SELECT * FROM admin WHERE username='$user' AND password='$pwd'");
  $cariuser = mysqli_fetch_array($result);
  $row_cnt = mysqli_num_rows($result);
    if ($row_cnt == 1) {
      

      if($cariuser['tugas']=="1"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="index1.php";
              </script>';

  }elseif ($cariuser['tugas']=="2"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="index2.php";
              </script>';
  }elseif ($cariuser['tugas']=="3"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="index3.php";
              </script>';
  }elseif ($cariuser['tugas']=="4"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="index5.php";
              </script>';
  }elseif ($cariuser['tugas']=="6"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="admin_2.php";
              </script>';
  }elseif ($cariuser['tugas']=="10"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="laporan.php";
              </script>';
  }elseif ($cariuser['tugas']=="11"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="../rek/karyawan.php";
              </script>';
  }elseif ($cariuser['tugas']=="saldo"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="adm_saldo.php";
              </script>';
  }elseif ($cariuser['tugas']=="super"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="adm_super.php";
              </script>';
  }elseif ($cariuser['tugas']=="stok"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="adm_stok.php";
              </script>';
  }elseif ($cariuser['tugas']=="antar_ma"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="index6.php";
              </script>';
  }elseif ($cariuser['tugas']=="antar"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="super_ngantar.php";
              </script>';
  }elseif ($cariuser['tugas']=="sw_ikhwan"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="swikhwan.php";
              </script>';
  }elseif ($cariuser['tugas']=="ma_ikhwan"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="maikhwan.php";
              </script>';
  }elseif ($cariuser['tugas']=="1ma"){
      $_SESSION['id'] = $cariuser['id_admin'];
      $_SESSION['tugas'] = $cariuser['tugas'];
      $_SESSION['nama_admin'] = $cariuser['nama_admin'];

      $_SESSION['login_admin'] = "Logged";
 
      echo '<script language="javascript">
              alert ("Login Berhasil, Selamat Bertugas..");
              window.location="1ma.php";
              </script>';
  }
  
  
  
  


    
    
    } else {
        echo '<script language="javascript">
              alert ("Afwan, Telepon / Password yang anda masukkan salah. Silahkan Coba Lagi");
              history.back();
              </script>';
    }   
  }


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login Admin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 <link href="https://fonts.googleapis.com/css?family=Nunito:600,700,900" rel="stylesheet">

</head>

<style type="text/css">
    
#body {
  font-family: 'Nunito';
background-color:  #5d8fc9;
}
#login-card{
    width:350px;
    border-radius: 25px;
    margin:150px auto;
  
}

#email{
    border-radius:30px;
    background-color: #ebf0fc;
    border-color: #ebf0fc;
    color: #9da3b0;
}

#button{
    border-radius:30px;

}

#btn{
   position: absolute; 
   bottom: -35px; 
   padding: 5px;
   margin: 0px 55px;
   align-items: center;
   border-radius: 5px"
}
#container{
    margin-top:25px;
}

.btn-circle.btn-sm { 
            width: 40px; 
            height: 40px; 
            padding: 2px 0px; 
            border-radius: 25px; 
            font-size: 14px; 
            text-align: center;
            
            margin: 8px;
        }

</style>
<body id="body">

<div id="login-card" class="card">
<div class="card-body">
  <h2 class="text-center">Login Admin</h2>
  <br>
  <form action="" method="POST">
    <div class="form-group">
      <input type="text" class="form-control" id="user" placeholder="Enter username" name="user">
    </div>
    <div class="form-group">
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
    <br>
    <button type="submit" name="login" id="button" class="btn btn-primary deep-purple btn-block ">Login</button>
<br>
    <br>
   
    <div id="btn" class="text-center">
   
   </div>

  </form>
</div>
<div>