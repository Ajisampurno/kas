<?php 

session_start();
  
  if (!isset($_SESSION["login_adm"])) {
    header("location: log.php");
    exit;
  }
  
  require 'function.php';

// Ambil id dari URL
  $id = $_GET["id"];

// query data data_mahasiswa berdasarkan id
  $karyawan = query("SELECT * FROM data_karyawan WHERE id = $id")[0];



  if (isset($_POST["ubah"])) {
    
    if (ubah($_POST) >0 ) {
    echo "
        <script>
          alert('data berhasil di ubah!');
          document.location.href= 'biodata_adm.php';
        </script>
      ";
    }else{
      echo "
        <script>
          alert('data gagal di ubah!');
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
      <h1>Ubah Member</h1>
        <form action="" method="POST" enctype="multipart/form-data">

          <input type="hidden" name="id" value="<?php echo $karyawan["id"]; ?>">
    
          <input type="text" name="nama" id="nama" required value="<?php echo $karyawan["nama"]; ?>">
          <input type="text" name="telp" id="telp" required value="<?php echo $karyawan["telp"]; ?>">
          <input type="text" name="jabatan" id="jabatan" value="<?php echo $karyawan["jabatan"]; ?>">
          <input type="text" name="status" id="status" value="<?php echo $karyawan["status"]; ?>""> 
          <input type="text" name="uang" id="uang" required value="<?php echo $karyawan["uang"]; ?>">
          <input type="file" name="gambar" id="gambar" value="<?php echo $karyawan["gambar"]; ?>" required >
          
          <button type="submit" name="ubah">Ubah!</button>
        </form>
    </div>
  </div>

</body>
</html>