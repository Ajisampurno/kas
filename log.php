<?php 
session_start();

  if (isset($_SESSION["login"])) {
    header("location: index.php");
    exit;   
  }

require 'function.php';
  
  if (isset($_POST["login"])) {
    
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($konek, "SELECT * FROM users WHERE username = '$username'");

    //cek username
    if (mysqli_num_rows($result) === 1) {
      
      //cek passord
      $row = mysqli_fetch_assoc($result);
      if (password_verify($password, $row["password"])) {

        //seting session
        $_SESSION["login"] = true;
        header("location: index.php");
      }
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
      <h1>Login</h1>
        <form action="" method="post">
          <input type="text" placeholder="username" name="username" id="username" />
          <input type="password" placeholder="password" name="password" id="password" />
          <button type="submit" name="login">login</button>
          <p class="message">Belum registrasi?<a href="reg.php">Buat akun anda</a></p>
        </form>
    </div>
  </div>
      <script type="js/jquery.min.js"></script>

</body>
</html>