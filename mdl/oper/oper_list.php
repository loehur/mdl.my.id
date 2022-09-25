<?php
if (isset($_GET['id']))
{
	include("../../db_mdl.php");
    $id_penerima = $_GET['id'];
        
	$emparray = array();
	$result = mysqli_query($conn, "SELECT id_bon, customer, berat, sender, id_pegawai, id FROM oper WHERE target = '$id_penerima' ORDER BY sentTime DESC LIMIT 100");
	while($res = mysqli_fetch_assoc($result)) 
		{ 	
			$emparray[] = $res;
		}
	echo json_encode($emparray);
	
}else{
	echo 'Wrong Parameter';
}
?>
