<link rel="stylesheet" href="style.css?v=2.23" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=1.3" media="screen">

<?php
		include_once '../../db_jeje.php';
		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d-m-Y');
		if(isset($_POST['hapus_transaksi'])){
			$idt = $_POST['idt'];
			$jumlah = $_POST['jumlah'];	
				$sql = "delete from transaksi_investor where ID = '$idt' AND Jumlah = '$jumlah'";
				$query = mysqli_query($conn, $sql);
				
				if($query){
				    $msg = "<h3 align=center>SUKSES!</h3><p align=center>Hapus ID : $idt dengan Jumlah : <b>".$jumlah."</b> Berhasil!<br><br></p>";
				}else{
				    $msg = "<h3 align=center>GAGAL!</h3><p align=center>Hapus ID : $idt dengan Jumlah : <b>".$jumlah."</b> GAGAL!<br><br></p>";
				}
				
			
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} ?>

		<form action="transaksi_investor.php" method="GET">
		<input type="submit" class="info" value="OK">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="nama" value="<?php echo $nama;?>">
</div>
	</body>
	</htmL>