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
		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d-m-Y');
		if(isset($_POST['perbarui_jatuh_tempo'])){
			$jatuh_tempo = $_POST['jatuh_tempo'];
			$id = $_POST['id'];
				$sql = "update cashbon_umum set Jatuh_Tempo = '$jatuh_tempo' WHERE ID = '$id'";
				$query = sqlsrv_query($conn, $sql);
				if($query) {
					$msg = "<h3 align=center>SUKSES!<br></h3><p align=center>Perubahan Jatuh Tempo ke Tanggal <b>".$jatuh_tempo."</b> Berhasil!";
					} else {
						$msg = "<h3 align=center>ERROR!</h3><p align=center>Database Belum Terhubung!<br><br></p>";
					}
			echo "<br><br>".$msg;			
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} ?>
		<form action="index.php" method="GET">
		<input type="submit" class="info" value="OK">
		</form>
</div>
	</body>
	</htmL>