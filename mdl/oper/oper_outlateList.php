<?php
if (isset($_GET['no_hp']))
{
	include_once("../../db_mdl.php");
    $no_hp = $_GET['no_hp'];
        
	$emparray = array();
	$result = mysqli_query($conn, "SELECT id, nama FROM account WHERE no_hp = '$no_hp'");
	while($res = mysqli_fetch_assoc($result)) 
		{ 	
			$emparray[] = $res;
		}
	echo json_encode($emparray);
	
}else{
	echo 'Wrong Parameter';
}
?>
