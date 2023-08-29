<?php
$qmutasi = mysqli_query($conn, "select * from transaksi_investor");
$total_investasi = 0;
while ($baris = mysqli_fetch_array($qmutasi)) {
	$mutasi = 0 + "$baris[Jumlah]";
	$total_investasi = $total_investasi + $mutasi;
}
