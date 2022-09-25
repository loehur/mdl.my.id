<?php
       include '../../db_jeje.php';
		if(isset($_POST['tambah'])){
			$nama = $_POST['nama'];
			$tempat_kerja = $_POST['tempat_kerja'];
			date_default_timezone_set('Asia/Jakarta');
				$sql = "insert into cashbon_staf(Nama, Tempat_Kerja) values('$nama','$tempat_kerja')";
				$query = mysqli_query($conn, $sql);
				if( $query ) {
					$msg = "<h3 align=center>SUKSES!<br></h3><p align=center>Penambahan Staf : <b>".$nama."</b> Berhasil!";
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