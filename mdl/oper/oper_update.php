<?php
if (isset($_GET['id']) && isset($_GET['id_pegawai']) && isset($_GET['id_penerima']))
{
	include("../../db_mdl.php");

	$id = $_GET['id'];
	$id_pegawai = $_GET['id_pegawai'];
	$query = mysqli_query($conn, "UPDATE oper SET id_pegawai = '$id_pegawai' WHERE id = '$id'");
	if ($query){
		$id_penerima = $_GET['id_penerima'];
	
		$emparray = array();
		$result = mysqli_query($conn, "SELECT id_bon, customer, berat, sender, id_pegawai, id FROM oper WHERE target = '$id_penerima' ORDER BY sentTime DESC LIMIT 100");
		while($res = mysqli_fetch_assoc($result)) 
			{ 	
				$emparray[] = $res;
			}
		echo json_encode($emparray);
	}else{
		echo mysqli_error($conn);
	}
}else{
	echo 'Wrong Parameter';
}
?>
