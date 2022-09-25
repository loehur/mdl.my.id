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
				$sql = "select * from cashbon_staf WHERE ID = '$id' AND Nama = '$nama_hapus'";
				$result = mysqli_query($conn, $sql);
				
				while($row = mysqli_fetch_array($result))
				{
					if ($total > 0 ){
						$msg = "<h3 align=center>ERROR!</h3><p align=center>Akun ini Masih memiliki cashbon<br><br></p>";
					}else{
						$tsql = "delete from cashbon_staf where ID = '$id' AND Nama = '$nama_hapus'";
						$query = mysqli_query($conn, $tsql);
						$psql = "delete from transaksi_cashbon where IDC = '$id'";
						$pquery = mysqli_query($conn, $psql);
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
	</body>
	</htmL>