<?php
if (isset($_GET['mdl_id']))
{
	try {
		include_once("../../db_mdl.php");
		$coin_used = 0;

		$id = $_GET['mdl_id'];
		$result = mysqli_query($conn, "SELECT coin_used FROM account WHERE id = '$id'");
		while($res = mysqli_fetch_array($result)) 
		{ 	
			$coin_used = $res['coin_used'];
		}
		
		if(isset($coin_used)){
			echo $coin_used;
		}else{
			$coin_used = 0;
			echo $coin_used;
		}	
	} 
	catch (Exception $e) 
	{
		echo 0;
		exit();
	}
}
else
{
	echo 0;
}
?>
