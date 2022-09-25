<?php
include_once("../../db_jeje.php");

if(isset($_GET['id'])) 
{	
   	$id = $_GET["id"];

	$tgl = DATE('Y-m-d');
	$numBulan = date("m",$timeEnd)-date("m",$timeStart);
	$date = date('Y-m-d', strtotime('-10 days', strtotime($tgl)));
	$result = mysqli_query($conn, "UPDATE bill_tb SET tanggal_awal = '$date' WHERE id = '$id'");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
	exit();
}else {
	echo 'Salah Kamar Bos!';
}

?>
