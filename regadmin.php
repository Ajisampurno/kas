<?php 

require 'function.php';

if (isset($_POST["register"])) {

  if (registrasi_adm($_POST) > 0) {

    echo "<script>
        alert('registrasi berhasil');
        document.location.href='logadmin.php';
      </script>";
  }else{
    echo mysqli_error($konek);
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
      <h1>Registrasi</h1>
        <form action="" method="post">
          <input type="text" placeholder="name" name="adminname" id="adminname" />
          <input type="password" placeholder="password" name="password" id="password" />
          <input type="password" placeholder="konfirmasi" name="password2" id="password2" />
          <input type="text" placeholder="verifikasi" name="verifikasi" id="verifikasi" />
          <button type="submit" name="register">create</button>
          <p class="message">Sudah punya akun? <a href="logadmin.php">Login admin</a></p>
        </form>
    </div>
  </div>
      <script type="js/jquery.min.js"></script>

</body>
</html>