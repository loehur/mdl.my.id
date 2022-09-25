<?php
        include '../koneksi.php';
				$qmutasi = sqlsrv_query($conn, "select * from [transaksi_cashbon]"); 
				$total = 0;
				while($baris = sqlsrv_fetch_array($qmutasi))
				{
					$mutasi = 0 + "$baris[Jumlah]";
					$total = $total + $mutasi;
				}
				echo "Rp".number_format($total);
				sqlsrv_close( $conn);       
		?>