<?php
if (isset($_GET['no_hp']) && isset($_GET['tahunBulan']) && isset($_GET['id']))
{
	include_once("../../db_mdl.php");
    $no_hp = $_GET['no_hp'];
	$tahunBulan = $_GET['tahunBulan'];
    $id = $_GET['id'];
        
	$emparray = array();
	$result = mysqli_query($conn, "SELECT id_pegawai, sum(berat) berat FROM oper WHERE no_hp = '$no_hp' AND updateTime LIKE '%$tahunBulan%' AND sender <> $id GROUP BY id_pegawai");
	while($res = mysqli_fetch_assoc($result)) 
		{ 	
			$emparray[] = $res;
		}
	echo json_encode($emparray);
}else{
	echo 'Wrong Parameter';
}
?>
