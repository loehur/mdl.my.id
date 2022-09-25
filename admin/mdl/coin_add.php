<?php
include_once("../../db_mdl.php");

if(isset($_POST['Submit'])) 
{	
	$id = $_POST['id'];
	$coin = $_POST['coin'];

	$result = mysqli_query($conn, "INSERT INTO coin(id_mdl,coin) VALUES('$id','$coin')");
	echo '<META HTTP-EQUIV="Refresh" Content="0; URL=v_coin_add.php">';
}
?>
