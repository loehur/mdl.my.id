<?php
        include_once '../../db_jeje.php';
		$tsql = "select * from data_investor order by Nama ASC";
		$result = mysqli_query($conn, $tsql);
	   	?>
		
		<table class="w-100">
		
		<?php

		$percen = 0;

		while($row = mysqli_fetch_array($result))
        {
			$id = "$row[ID]";
			$nama = "$row[Nama]";
			$no_hp = "$row[No_Hp]";

			$qmutasi = mysqli_query($conn, "select * from transaksi_investor WHERE IDC = '$id'"); 
			$itotal = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$mutasi = 0 + "$baris[Jumlah]";
				$itotal = $itotal + $mutasi;
				$percen = ($itotal/$total) * 100;
			}  
			echo
			"<tr><td align=center>$id</td><td><a href='transaksi_investor.php?id=$id&nama=$nama&total=$itotal&no_hp=$no_hp'><div class='nama'>$nama</div></a></td>
			<td align=right>".number_format($itotal)."</td></tr>";
		} ?>
		</table>