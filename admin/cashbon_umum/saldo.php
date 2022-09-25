<?php
        include '../koneksi.php';
				$qmutasi = sqlsrv_query($conn, "select Cast(Jumlah as float) as Jumlah from [transaksi_cashbon_umum]"); 
				$total = 0;
				while($baris = sqlsrv_fetch_array($qmutasi))
				{
					$mutasi = "$baris[Jumlah]";
					$total = $total + $mutasi;
				}
				echo "Rp".number_format($total);
				sqlsrv_close( $conn);       
		?>