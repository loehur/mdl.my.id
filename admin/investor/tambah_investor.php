<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="style.css?v=1.11" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=1.3" media="screen">
<body>
<div>
<?php
        include '../koneksi.php';
		if(isset($_POST['tambah'])){
			$nama = $_POST['nama'];
			$no_hp = $_POST['no_hp'];
			$pass = 123;
				$sql = "insert into data_investor([Nama],[No_Hp],[Pass]) values('$nama','$no_hp','$pass')";
				$query = sqlsrv_query($conn, $sql);
				if( $query ) {
					$msg = "<h3 align=center>SUKSES!<br></h3><p align=center>Penambahan Investor : <b>".$nama."</b> Berhasil!";
					} else {
						$msg = "<h3 align=center>ERROR!</h3><p align=center>Database Belum Terhubung!<br><br></p>";
					}
			echo "<br><br>".$msg;			
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} ?>

		<form action="index.php">
		<input type="submit" class="info" value="OK">
		</form>
</div>
	</body>
	</htmL>