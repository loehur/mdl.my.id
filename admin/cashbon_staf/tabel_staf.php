<?php
        include '../../db_jeje.php';
		$tsql = "select * from cashbon_staf order by tempat_kerja ASC";
		$result = mysqli_query($conn, $tsql);
	   	?>
		
		<table class="w-100">
		
		<?php
		while($row = mysqli_fetch_array($result))
        {
			$id = "$row[ID]";
			$nama = "$row[Nama]";
			$tempat_kerja = "$row[Tempat_Kerja]";

			$qmutasi = mysqli_query($conn, "select * from transaksi_cashbon WHERE IDC = '$id'"); 
			$total = 0;
			while($baris = mysqli_fetch_array($qmutasi))
			{
				$mutasi = 0 + "$baris[Jumlah]";
				$total = $total + $mutasi;
			}  
			echo
			"<tr><td><a href='transaksi_cashbon.php?id=$id&nama=$nama&total=$total'><div class='nama'>$nama</div></a></td><td>$tempat_kerja</td><td align=right>".number_format($total)."</td></tr>";
		} ?>
		</table>
		
		<?php
				mysqli_close( $conn);       
		?>