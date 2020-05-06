<?php 
session_start();

  if (isset($_SESSION["login_adm"])) {
    header("location: admin.php");
    exit;   
  }

require 'function.php';
  
  if (isset($_POST["login_adm"])) {
    
    $adminname = $_POST["adminname"];
    $password = $_POST["password"];

    $result = mysqli_query($konek, "SELECT * FROM admin WHERE adminname = '$adminname'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
      
      //cek passord
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {

        //seting session
        $_SESSION["login_adm"] = true;
        header("location: admin.php");
      }
    }
  }


 ?>

<!DOCTYPE html>
<html>
<head>
  <title>login Admin</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>


  <div class="login-page">
    <div class="form">
      <h1>Login Admin</h1>
        <form action="" method="post">
          <input type="text" placeholder="adminname" name="adminname" id="adminname" />
          <input type="password" placeholder="password" name="password" id="password" />
          <button type="submit" name="login_adm">login admin</button>
          <p class="message">Belum registrasi admin?<a href="regadmin.php">Buat akun admin anda</a></p>
        </form>
    </div>
  </div>
      <script type="js/jquery.min.js"></script>

</body>
</html>