<?php 

session_start();
  
  if (!isset($_SESSION["login_adm"])) {
    header("location: loginadmin.php");
    exit;
  }
  
	require 'function.php';

// Ambil id dari URL
	$id = $_GET["id"];

// query data data_mahasiswa berdasarkan id
	$karyawan = query("SELECT * FROM data_karyawan WHERE id = $id")[0];


//fungsi ubah
	if (isset($_POST["ubah"])) {
		
		if (tambah_kas($_POST) >0 ) {
		echo "
				<script>
					alert('data berhasil di ubah!');
					document.location.href= 'datakas_adm.php';
				</script>
			";
		}else{
			echo "
				<script>
					alert('data gagal di ubah!');
					document.location.href= 'datakas_adm.php';
				</script>
			";
		}
	}

//fungsi kalkulator uang

	$uang=0;

	if(isset($_POST['hitung'])){
		$uang_saatini = $_POST['uang_saatini'];
		$uang_masuk = $_POST['uang_masuk'];
		$uang = $uang_saatini+$uang_masuk;
	}
	
//fungsi menghitung uang
	if ($uang == 10000){
		$status="Lunas sampai dengan januari";
	}else if($uang <= 20000){
		$status="Lunas sampai dengan februari";
	}else if($uang <= 30000){
		$status="Lunas sampai dengan maret";
	}else if($uang <= 40000){
		$status="Lunas sampai dengan april";
	}else if($uang <= 50000){
		$status="Lunas sampai dengan mei";
	}else if($uang <= 60000){
		$status="Lunas sampai dengan juni";
	}else if($uang <= 70000){
		$status="Lunas sampai dengan juli";
	}else if($uang <= 80000){
		$status="Lunas sampai dengan agustus";
	}else if($uang <= 90000){
		$status="Lunas sampai dengan september";
	}else if($uang <= 100000){
		$status="Lunas sampai dengan oktober";
	}else if($uang <= 110000){
		$status="Lunas sampai dengan november";
	}else if($uang <= 120000){
		$status="Lunas sampai dengan desember";
	}else{
		$status="masukan angka dengan benar";

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
      <h1>Bayar Uang Kas</h1>
        <form action="" method="POST" enctype="multipart/form-data">
    
         	<input type="hidden" name="id" value="<?php echo $karyawan["id"]; ?>">
         	<input type="text" name="uang_saatini" id="uang_saatini" value="<?php echo $karyawan["uang"]; ?>">
         	<input type="text" name="uang_masuk" id="uang_masuk">
         	<button type="submit" name="hitung">hitung!</button>
         	<input type="text" name="uang" id="uang" required value="<?php echo $uang; ?>">
         	<input type="text" name="status" id="status" required placeholder="unden" value="<?php echo $status; ?>">
         	<button type="submit" name="ubah">UBAH!</button>
        </form>
    </div>
  </div>

</body>
</html>