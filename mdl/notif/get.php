<?php
if (isset($_GET['hp']))
{
	include("../../db_mdl.php");
    $hp = $_GET['hp'];
        
	$emparray = array();
	$result = mysqli_query($conn, "SELECT * FROM notif WHERE no_hp = '$hp' AND status = 1 ORDER BY id ASC");
	while($res = mysqli_fetch_assoc($result)) 
		{ 	
			$emparray[] = $res;
		}
	echo json_encode($emparray);
	
}else{
	echo 'Wrong Parameter';
}
?>
