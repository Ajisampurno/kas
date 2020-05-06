<?php 

  session_start();
    
    if (!isset($_SESSION["login_adm"])) {
      header("location: logadmin.php");
      exit;
    }
    
  require 'function.php';

   $result_masuk = query("SELECT SUM(uang) FROM `data_karyawan` ");

   $hasil= "";
   $uang_keluar="";
   if (isset($_POST["hitung"])) {
     $bil1 = $_POST["uang"];
     $bil2 = $_POST["uang_keluar"];
     $hasil = $bil1 - $bil2;
     $uang_keluar = $bil2;
   }

  if (isset($_POST["submit"])) {
    
    if (kurangi_uang($_POST) >0 ) {
    echo "
        <script>
          alert('data berhasil di tambahkan!');
          document.location.href= 'story_adm.php';
        </script>
      ";
    }else{
      echo "
        <script>
          alert('data gagal di tambahkan!');
          document.location.href= 'kurang.php';
        </script>
      ";
    }
  }

 ?>

<!DOCTYPE html>
<html>
<head>
  <title>login</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="login-page">
    <div class="form">
      <h1>jumlah uang yang di ambil</h1>
        <form action="" method="POST" enctype="multipart/form-data">
    
          <input type="date" name="tgl" id="tgl" >
          <input type="text" name="nama" id="nama" placeholder="masukan nama pengambil">
          <input type="text" name="uang_keluar" id="uang_keluar" placeholder="masukan uang yg di ambil" value="<?php echo $uang_keluar ?>">
          <input type="text" name="alasan" id="alasan" placeholder="alasan"> 
          <input type="file" name="gambar" id="gambar" >   
          
          <button type="submit" name="submit">ok!</button>
      
        </form>
    </div>
  </div>

</body>
</html>