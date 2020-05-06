<?php 

//session
  session_start();
    
    if (!isset($_SESSION["login_adm"])) {
      header("location: logadmin.php");
      exit;
    }

	require 'function.php';

//fungsi menghapus data berdasarkan id
	$id = $_GET["id"];

	if ( hapus($id) > 0) {
		echo "
			<script>
				alert('data berhasil di apus!');
				document.location.href='biodata_adm.php';
			</script>
		";
	}else{
		echo "
			<script>
				alert('data gagal di hapus!');
				document.location.href='biodata_adm.php';
			</script>
		";
	}



 ?>