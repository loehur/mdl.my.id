<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Jeje Pay</title>
<meta http-equiv="pragma" content="no-cache" />
<meta http-equiv="expires" content="-1" />	
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0" />
<link rel="stylesheet" href="../../css/style.css?v=3" media="screen">
<link rel="stylesheet" href="../../css/base_style.css?v=3" media="screen">
<body>
<div>
<?php
		include '../../db_jeje.php';
		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d-m-Y');
		if(isset($_POST['cashbon'])){
			$jumlah = $_POST['jumlah'];
			$nama = $_POST['nama'];
			$id = $_POST['id'];
			$keterangan = $_POST['keterangan'];
				$sql = "insert into transaksi_cashbon(IDC, Jumlah, Tanggal, Keterangan) values('$id','$jumlah','$tanggal','$keterangan')";
				$query = mysqli_query($conn, $sql);
				if($query) {
					$msg = "<h3 align=center>SUKSES!<br></h3><p align=center>Penambahan Cashbon : <b>".number_format($jumlah)."</b> Berhasil!";
					} else {
						$msg = "<h3 align=center>ERROR!</h3><p align=center>Database Belum Terhubung!<br><br></p>";
					}
			echo "<br><br>".$msg;			
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} ?>
		<form action="transaksi_cashbon.php" method="GET">
		<input type="submit" class="info" value="OK">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="nama" value="<?php echo $nama;?>">
		</form>
</div>
	</body>
	</htmL>