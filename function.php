<?php 

	$konek = mysqli_connect("localhost","root","","karyawan");

// tabel.php
	function query($query){
		global $konek;

		$hasil = mysqli_query($konek,$query);

		$row = [];
		while ($row = mysqli_fetch_assoc($hasil)) {
			$rows[] = $row;
		}
		return $rows;
	}


//* tambah.php
	function tambah($data){
		global $konek;

		$nama 	 = htmlspecialchars ($data["nama"]); //htmlspecialchars => berguna u/ menonaktihakan script di inputan
		$telp     = htmlspecialchars ($data["telp"]);
		$jabatan   = htmlspecialchars ($data["jabatan"]);
		$uang   = htmlspecialchars ($data["uang"]);
		$status = htmlspecialchars ($data["status"]);
		
		// upload gambar
		$gambar  = upload();
			if (!$gambar){
				return false;
			}

		$query = "INSERT INTO data_karyawan VALUES
				(null,'$nama','$telp','$jabatan','$status','$gambar','$uang')";

	mysqli_query($konek,$query);
	return mysqli_affected_rows($konek);

	}

	
// fungsi hapus
	function hapus($id){
		global $konek;

		mysqli_query($konek,"DELETE FROM data_karyawan WHERE id = $id");

		return mysqli_affected_rows($konek);
	}


// fungsi ubah
	function ubah($data){
		global $konek;

		$id		 = $data["id"];
		$nama 	 = htmlspecialchars ($data["nama"]); //htmlspecialchars => berguna u/ menonaktihakan script di inputan
		$telp     = htmlspecialchars ($data["telp"]);
		$jabatan   = htmlspecialchars ($data["jabatan"]);
		$status = htmlspecialchars ($data["status"]);

		// upload gambar
		$gambar  = upload();
			if (!$gambar){
				return false;
			}

		$query = "UPDATE data_karyawan SET
					nama    = '$nama',
					telp     = '$telp',
					jabatan   = '$jabatan',
					status = '$status',
					gambar  = '$gambar'
				  WHERE 
				    id      = $id";
		

	mysqli_query($konek,$query);
	return mysqli_affected_rows($konek);

	}

// fungsi cari / searching
	function cari($keyword){
		$query = ("SELECT * FROM data_karyawan
							WHERE
							nama LIKE '%$keyword%' OR
							telp LIKE '%$keyword%' OR
							jabatan LIKE '%$keyword%' OR
							status LIKE '%$keyword%' 
				");
		return query($query);    //memanggil query (yang sudah pernah di buat), ke function query baru   
	}


// fungsi cari / searching
	function cari_story($keyword){
		$query = ("SELECT * FROM reason
							WHERE
							tgl LIKE '%$keyword%' OR
							nama LIKE '%$keyword%' OR
							uang_keluar LIKE '%$keyword%' OR
							alasan LIKE '%$keyword%' 
				");
		return query($query);    //memanggil query (yang sudah pernah di buat), ke function query baru   
	}


//fungsi upload gambar
	function upload(){
		$namafile	=	$_FILES["gambar"]["name"];
		$ukuranfile	=	$_FILES["gambar"]["size"];
		$error		=	$_FILES["gambar"]["error"];
		$tmpnama	=	$_FILES["gambar"]["tmp_name"];

		//cek apakah tidak ada gambar yang di upload?
		if($error === 4){
			echo "<script>
					alert('lebokno gambare sek!')
				  </script>";
			return false;
		}

		//cek apakah yang di upload adalah gambar?
		$ekstensi_gambar_valid = ['jpg','jpeg','png'];
		$ekstensi_gambar 	   = explode('.', $namafile);
		$ekstensi_gambar       = strtolower(end($ekstensi_gambar));
		if(!in_array($ekstensi_gambar,$ekstensi_gambar_valid)){
			echo "<script>
					alert('seng mbok lebokne uduk gambar')
				  </script>";
			return false;	
		}

		//cek jika ukuran gambar terlalu besar
		if ($ukuranfile > 1000000000000) {
			echo "<script>
					alert('ukurane terlalu gede, gambar isok di lebokno yen ukurane kurang 1mb');
				  </script>";
			return false;
		}

		// lolios pengecekan, gambar siap di upload
		move_uploaded_file($tmpnama, 'gambar/'.$namafile);

		return $namafile;
	}	



	//fungsi registrasi
	function registrasi($data){
		global $konek;

		$username = strtolower(stripcslashes($data["username"]));
		$password = mysqli_real_escape_string($konek,$data["password"]);
		$password2 = mysqli_real_escape_string($konek,$data["password2"]);

		// cek apakah username sudah terdaftar?
		$result = mysqli_query($konek, "SELECT username FROM users WHERE username = '$username'");
		
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('user sudah ada yang pakai!');
				</script>";
				return false;
		}

		// cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
				alert('konfirmasi password berbeda!');
				</script>";
				return false;
		}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//masukan data reg ke database
		mysqli_query($konek,"INSERT INTO users VALUES (null,'$username','$password')");
		return mysqli_affected_rows($konek);

	}

	//fungsi registrasi admin
	function registrasi_adm($data){
		global $konek;

		$adminname = strtolower(stripcslashes($data["adminname"]));
		$password = mysqli_real_escape_string($konek,$data["password"]);
		$password2 = mysqli_real_escape_string($konek,$data["password2"]);
		$verifikasi = mysqli_real_escape_string($konek,$data["verifikasi"]);
		$verifikasi2 = 111097;

		// cek apakah adminname sudah terdaftar?
		$result = mysqli_query($konek, "SELECT adminname FROM admin WHERE adminname = '$adminname'");
		
		if (mysqli_fetch_assoc($result)) {
			echo "<script>
				alert('user sudah ada yang pakai!');
				</script>";
				return false;
		}

		// cek konfirmasi password
		if ($password !== $password2) {
			echo "<script>
				alert('konfirmasi password berbeda!');
				</script>";
				return false;
		}

		// cek konfirmasi password
				if ($verifikasi === $verifikasi2) {
					echo "<script>
						alert('verifikasi salah!');
						</script>";
						return false;
				}

		// enkripsi password
		$password = password_hash($password, PASSWORD_DEFAULT);

		//masukan data reg ke database
		mysqli_query($konek,"INSERT INTO admin VALUES (null,'$adminname','$password')");
		return mysqli_affected_rows($konek);
	}

// fungsi Tambah kas
	function tambah_kas($data){
		global $konek;

		$id		 = $data["id"];
		$uang  = htmlspecialchars ($data["uang"]);
		$status  = htmlspecialchars ($data["status"]);

		$query = "UPDATE data_karyawan SET
					uang  = '$uang',
					status= '$status'
				  WHERE 
				    id      = $id";

	mysqli_query($konek,$query);
	return mysqli_affected_rows($konek);

	}

// kurangi kas
	function kurangi_uang($data){
		global $konek;

		$uang_keluar 	 = htmlspecialchars ($data["uang_keluar"]); 
		$tgl 	 = htmlspecialchars ($data["tgl"]); 
		$nama     = htmlspecialchars ($data["nama"]);
		$alasan = htmlspecialchars ($data["alasan"]);
		
		// upload gambar
		$gambar  = upload();
			if (!$gambar){
				return false;
			}

		$query = "INSERT INTO reason VALUES
				(null,'$tgl','$nama','$uang_keluar','$gambar','$alasan')";

	mysqli_query($konek,$query);
	return mysqli_affected_rows($konek);

	}


 ?>


