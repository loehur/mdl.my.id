<?php
        include '../koneksi.php';
				$qmutasi = mysqli_query($conn, "select * from transaksi_investor"); 
				$total = 0;
				while($baris = mysqli_fetch_array($qmutasi))
				{
					$mutasi = 0 + "$baris[Jumlah]";
					$total = $total + $mutasi;
				}
		?>