<?php
		include '../../db_jeje.php';

		$tsql = "select * from [cashbon_umum] order by Nama ASC";
		$result = sqlsrv_query($conn, $tsql);
	   	?>
		
		<table id="transaksi">
	   	
		<?php
		while($row = sqlsrv_fetch_array($result))
        {
			$id = "$row[ID]";
			$nama = "$row[Nama]";
			$no_hp = "$row[No_Hp]";
			$jatuh_tempo = "$row[Jatuh_Tempo]";
			$id_in = "$row[ID_IN]";

			include 'ontime_rate.php';
			$qmutasi = sqlsrv_query($conn, "select * from [transaksi_cashbon_umum] WHERE IDC = '$id'"); 
			$total = 0;
			while($baris = sqlsrv_fetch_array($qmutasi))
			{
				$mutasi = 0 + "$baris[Jumlah]";
				$total = $total + $mutasi;
			}  
			if ($jumlah > 0 or $jumlahc > 0){
			$percentase = number_format((($hitungtepat + $hitungtepatc)/($jumlah+$jumlahc)) * 100, 2);
			}else{
				$percentase = 0;
			}
			if ($total <= 0){
				echo 
				"<tr>
				<td valign=top>$id|$id_in</td><td valign=top><a href='transaksi_cashbon.php?id=$id&nama=$nama&total=$total'><div style='padding-top:0;' class='nama'>$nama</div></a></td>
				<td align=right valign=top>".$percentase."%/".($jumlah+$jumlahc)."</td><td align=center valign=top>$jatuh_tempo</td>
				<td align=right valign=top>".number_format($total)."</td></tr>";
			}
		} ?>
		</table>
		
		<?php
				sqlsrv_close( $conn);       
		?>