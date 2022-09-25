<?php
if (isset($_GET['mdl_id']))
{
	try {
		include_once("../../db_mdl.php");
		$coin = 0;

		$mdl_id = $_GET['mdl_id'];
		$result = mysqli_query($conn, "SELECT SUM(coin) AS coin_topup FROM coin WHERE id_mdl = '$mdl_id'");
		while($res = mysqli_fetch_array($result)) 
		{ 	
			$coin = $res['coin_topup'];
		}
		
		$coin_used = $_GET['coin_used'];

		$coin_used_lama = 1000000000000;
		$q = mysqli_query($conn, "SELECT coin_used FROM account WHERE id = '$mdl_id'");
		while($qr = mysqli_fetch_array($q)) 
		{ 	
			$coin_used_lama = $qr['coin_used'];
		}
		if ($coin_used > $coin_used_lama){
			mysqli_query($conn, "UPDATE account SET coin_used = '$coin_used' WHERE id = '$mdl_id'");
		}

		if(isset($coin)){
			echo $coin;

		}else{
			$coin = 0;
			echo $coin;
		}		
		exit();
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
