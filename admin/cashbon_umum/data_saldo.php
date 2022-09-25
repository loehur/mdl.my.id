<?php
      			$qmutasi = mysqli_query($conn, "SELECT SUM(Jumlah) as Jumlah from transaksi_cashbon_umum"); 
				$total_cashbon_umum = 0;
				while($baris = mysqli_fetch_array($qmutasi))
				{
					$total_cashbon_umum = "$baris[Jumlah]";
				}     
?>