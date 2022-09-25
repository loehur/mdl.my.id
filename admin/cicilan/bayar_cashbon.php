<?php
		include '../../db_jeje.php';
		date_default_timezone_set('Asia/Jakarta');
			$tanggal = date('d-m-Y');
			$jumlah = $_POST['jumlah'];
			$nama = $_POST['nama'];
			$keterangan = $_POST['keterangan'];
			$id = $_POST['id'];

			$pmutasi = mysqli_query($conn, "SELECT * FROM pengajuan_cicilan WHERE IDC = '$id' AND StatusCil = '2'"); 
			while($pbaris = mysqli_fetch_array($pmutasi))
				{
					$idp = $pbaris['ID'];
					$sql = "INSERT INTO transaksi_cicilan(IDC, IDP, Jumlah, Tanggal, Keterangan) VALUES('$id','$idp','$jumlah','$tanggal','$keterangan')";
					$query = mysqli_query($conn, $sql);
					exit();
				}
?>