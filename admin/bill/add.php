<?php
if(isset($_POST['tambah'])) 
{	
	include_once("../../db_jeje.php");
	mysqli_query($conn, "INSERT INTO bill_tb(bill,tanggal_awal,bulanan) VALUES('$_POST[nama]','$_POST[tgl]','$_POST[jumlah]')");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=index.php">';
}
?>
