<?php
     	$qmutasi = mysqli_query($conn, "SELECT SUM(Jumlah) as Jumlah from transaksi_cashbon"); 
			$total_cashbon = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$total_cashbon = "$baris[Jumlah]";
			}
		 
?>