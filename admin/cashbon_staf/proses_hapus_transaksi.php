<link rel="stylesheet" href="style.css?v=2.23" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=1.3" media="screen">

<?php
		include '../koneksi.php';
		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d-m-Y');
		if(isset($_POST['hapus_transaksi'])){
			$idt = $_POST['idt'];
			$jumlah = $_POST['jumlah'];	
			$id = $_POST['id'];
			$nama = $_POST['nama'];			
			$tsql = "select * from [transaksi_cashbon] WHERE ID = '$idt' AND Jumlah = '$jumlah'";
			$result = sqlsrv_query($conn, $tsql);
			$msg = "<h3 align=center>ERROR!</h3><p align=center>ID dan Jumlah Tidak Sesuai!<br><br></p>";
			while($row = sqlsrv_fetch_array($result))
			{
				$sql = "delete from transaksi_cashbon where ID = '$idt' AND Jumlah = '$jumlah'";
				$query = sqlsrv_query($conn, $sql);
				$ssql = "insert into kas([Tanggal],[Kategori],[Jenis],[Jumlah],[Keterangan]) values('$tanggal','Cashbon','3','$jumlah','Penghapusan')";
				$squery = sqlsrv_query($conn, $ssql);
				$msg = "<h3 align=center>SUKSES!</h3><p align=center>Hapus ID : $idt dengan Jumlah : <b>".$jumlah."</b> Berhasil!<br><br></p>";
			}						
				echo "<br><br>".$msg;
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} ?>

		<form action="transaksi_cashbon.php" method="GET">
		<input type="submit" class="info" value="OK">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="nama" value="<?php echo $nama;?>">
</div>
	</body>
	</htmL>