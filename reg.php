<?php 

require 'function.php';

if (isset($_POST["register"])) {

  if (registrasi($_POST) > 0) {

    echo "<script>
        alert('registrasi berhasil');
        
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
      <form action="" method="post">
        <input type="text" placeholder="name" name="username" id="username" />
        <input type="password" placeholder="password" name="password" id="password" />
        <input type="password" placeholder="konfirmasi" name="password2" id="password2" />
        <button type="submit" name="register">create</button>
        <p class="message">Sudah punya akun? <a href="log.php">Login</a></p>
      </form>
    </div>
  </div>
      <script type="js/jquery.min.js"></script>

</body>
</html>