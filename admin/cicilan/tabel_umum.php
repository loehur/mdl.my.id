<?php
        include '../../db_jeje.php';
		$tsql = "select * from cashbon_umum order by Nama ASC";
		$result = mysqli_query($conn, $tsql);
	   	?>
		
		<table id="transaksi">
	   	<tr>
		<th>Name (Remain)</th><th>JT</th><th>Monthly</th><th>Remain</th>
		   </tr>
		<?php
		while($row = mysqli_fetch_array($result))
        {
			$id = "$row[ID]";
			$nama = "$row[Nama]";
			$no_hp = "$row[No_Hp]";
			$jatuh_tempo = "$row[Jatuh_Tempo]";

			$qmutasi = mysqli_query($conn, "select * from pengajuan_cicilan WHERE IDC = '$id' AND StatusCil = '2'"); 
			$total = 0;
			$bulanan = 0;
			$cil_bayar = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$idp = "$baris[ID]";
				$tenor = "$baris[Tenor]";
				$bulanan = 0 + "$baris[P_Bulanan]" + "$baris[M_Bulanan]";
				$total = 0 + ("$baris[P_Bulanan]" + "$baris[M_Bulanan]") * $tenor;
				
				$qtmutasi = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cicilan WHERE IDP = '$idp'"); 
				while($barist = mysqli_fetch_array($qtmutasi))
				{
					$cil_bayar = "$barist[Jumlah]";
				}
				if ($cil_bayar){
					$total = $total - $cil_bayar;
				}

				if ($total < $bulanan){
					$bulanan = $total;
				}

				if ($total <= 0){
					$sisa_tenor = 0;
				}else{
					$sisa_tenor = $total/$bulanan;
				}

			echo
			"<tr>
			<td valign=top><a href='transaksi_cashbon.php?id=$id&nama=$nama&total=$total'><div style='padding-top:0;' class='nama'>$nama</a> (".number_format($sisa_tenor, 0).")</div></td>
			<td align=center valign=top>$jatuh_tempo</td>
			<td align=right valign=top>".number_format($bulanan)."</td><td align=right valign=top>".number_format($total)."</td></tr>";
			}
		} ?>
		</table>
		
		<?php
				mysqli_close( $conn);       
		?>