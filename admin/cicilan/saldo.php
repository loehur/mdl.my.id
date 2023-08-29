<?php
include '../../db_jeje.php';
$qmutasi = mysqli_query($conn, "select * from pengajuan_cicilan WHERE StatusCil = '2' or StatusCil = '3'");
$total = 0;
$total_bulanan = 0;
while ($baris = mysqli_fetch_array($qmutasi)) {
	$tenor = "$baris[Tenor]";
	$mutasi = 0 + (("$baris[P_Bulanan]" + "$baris[M_Bulanan]") * $tenor);
	$total = $total + $mutasi;
	$total_bulanan = $total_bulanan + ("$baris[P_Bulanan]" + "$baris[M_Bulanan]");
}

$qtmutasi = mysqli_query($conn, "select sum(Jumlah) as Jumlah from transaksi_cicilan");
while ($barist = mysqli_fetch_array($qtmutasi)) {
	$cil_bayar = "$barist[Jumlah]";
}
if ($cil_bayar) {
	$total = $total - $cil_bayar;
}

$total_all = "Rp" . number_format($total);
$bulanan_all = " | Rp" . number_format($total_bulanan);
mysqli_close($conn);
