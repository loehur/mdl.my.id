<?php
		include '../koneksi.php';
		date_default_timezone_set('Asia/Jakarta');
		$tanggal = date('d-m-Y');
		if(isset($_POST['arsip'])){
			$idp = $_POST['idp'];
			$status_arsip = $_POST['status_arsip'];
				$asql = "update pengajuan_cicilan set StatusCil = '$status_arsip' WHERE ID = '$idp'";
				$aquery = mysqli_query($conn, $asql);
				if($aquery) {
					$msg = "<h3 align=center>SUKSES!<br></h3><p align=center>Cicilan Lunas, Cicilan di Arsipkan!</b>";
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