<?php
		include '../../db_jeje.php';

		$tsql = "select * from cashbon_umum order by Nama ASC";
		$result = mysqli_query($conn, $tsql);
	   	?>
		
		<table id="transaksi">
	   	
		<?php
		while($row = mysqli_fetch_array($result))
        {
			$id = "$row[ID]";
			$nama = "$row[Nama]";
			$no_hp = "$row[No_Hp]";
			$jatuh_tempo = "$row[Jatuh_Tempo]";
			$id_in = "$row[ID_IN]";

			$qmutasi = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cashbon_umum WHERE IDC = '$id'"); 
			$total = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$total = "$baris[Jumlah]";
			}  
			if ($total > 0){
				echo
				"<tr>
				<td valign=top>$id|$id_in</td><td valign=top><a href='transaksi_cashbon.php?id=$id&nama=$nama&total=$total'><div style='padding-top:0;' class='nama'>$nama</div></a></td>
				<td align=center valign=top>$jatuh_tempo</td>
				<td align=right valign=top>".number_format($total)."</td></tr>";
			}
		} ?>
		</table>
		
		<?php
				mysqli_close( $conn);       
		?>