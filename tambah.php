<?php 

  session_start();
    
    if (!isset($_SESSION["login_adm"])) {
      header("location: logadmin.php");
      exit;
    }
    
  require 'function.php';

  if (isset($_POST["submit"])) {
    
    if (tambah($_POST) >0 ) {
    echo "
        <script>
          alert('data berhasil di tambahkan!');
          document.location.href= 'biodata_adm.php';
        </script>
      ";
    }else{
      echo "
        <script>
          alert('data gagal di tambahkan!');
          document.location.href= 'biodata_adm.php';
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
      <h1>Tambah member</h1>
        <form action="" method="POST" enctype="multipart/form-data">
    
          <input type="text" name="nama" id="nama" required placeholder="Username">
          <input type="text" name="telp" id="telp" required placeholder="telp">
          <input type="text" name="jabatan" id="jabatan" required placeholder="jabatan">
          <input type="text" name="status" id="status" required placeholder="Status"> 
          <input type="text" name="uang" id="uang" required placeholder="Kas awal">
          <input type="file" name="gambar" id="gambar" required >
          
          <button type="submit" name="submit">TAMBAH!</button>
        </form>
    </div>
  </div>

</body>
</html>