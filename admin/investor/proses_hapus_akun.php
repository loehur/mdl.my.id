<link rel="stylesheet" href="style.css?v=2.23" media="screen">
<link rel="stylesheet" href="../pendaftaran.css?v=1.3" media="screen">

<?php
        include '../koneksi.php';
		if(isset($_POST['hapus_akun'])){
			$id = $_POST['id'];
			$nama_hapus = $_POST['nama_hapus'];
			$nama = $_POST['nama'];
			$total = $_POST['total'];
				$msg = "<h3 align=center>ERROR!</h3><p align=center>ID dan Nama Tidak Sesuai!<br><br></p>";
				$sql = "select * from [data_investor] WHERE ID = '$id' AND Nama = '$nama_hapus'";
				$result = sqlsrv_query($conn, $sql);
				
				while($row = sqlsrv_fetch_array($result))
				{
					if ($total > 0 ){
						$msg = "<h3 align=center>ERROR!</h3><p align=center>Akun ini Masih memiliki investasi<br><br></p>";
					}else{
						$tsql = "delete from data_investor where ID = '$id' AND Nama = '$nama_hapus'";
						$query = sqlsrv_query($conn, $tsql);
						$psql = "delete from transaksi_investor where IDC = '$id'";
						$pquery = sqlsrv_query($conn, $psql);
						$msg = "<h3 align=center>SUKSES!</h3><p align=center>Hapus ID : ".$id." dengan Nama : <b>".$nama."</b> Berhasil!<br><br></p>";
					}
				}
			echo "<br><br>".$msg;
		} else {
			die("<h3 align=center>DILARANG!</h3><p align=center>Salah Kamar Bos!<br><br></p>");
		} 
		?>	
		<form action="index.php" method="GET">
		<input type="submit" class="info" value="OK">
		<input type="hidden" name="id" value="<?php echo $id;?>">
		<input type="hidden" name="nama" value="<?php echo $nama;?>">		
	</body>
	</htmL>